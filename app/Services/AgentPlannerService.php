<?php

namespace App\Services;

use App\Enums\DiagnosisPillarEnum;
use App\Models\Diagnosis;
use App\Models\TaskType;
use App\Traits\HasAgentTools;
use Prism\Prism\Enums\Provider;
use Prism\Prism\Facades\Prism;
use Prism\Prism\Schema\ArraySchema;
use Prism\Prism\Schema\ObjectSchema;
use Prism\Prism\Schema\StringSchema;

class AgentPlannerService
{

    use HasAgentTools;

    public function plannerOutputSchema(): ObjectSchema
    {
        return new ObjectSchema(
            name: 'plan',
            description: 'Lista de tarefas para o plano de ação',
            properties: [
                new ArraySchema(
                    name: 'tasks',
                    description: 'Lista de Tarefas para o plano de ação',
                    items: new ObjectSchema(
                        name: 'task',
                        description: 'Estrutura da tarefa para o plano de acao',
                        properties: [
                            new StringSchema(name: 'title', description: 'Titulo da tarefa para o plano de acao'),
                            new StringSchema(name: 'task_type_id', description: 'O ID numérico correspondente (Hábito ou Tarefa Única)'),
                            new StringSchema(name: 'week_prevision', description: 'Previsão de qual semana é melhor de aplicar a tarefa')
                        ],
                        requiredFields: ['title', 'task_type_id', 'week_prevision']
                    )
                )
            ],
            requiredFields: ['tasks']
        );
    }

    public function generate(Diagnosis $diagnosis)
    {

        $diagnosis->load('goal', 'diagnosisItems.diagnosisItemType', 'diagnosisItems.diagnosisPillar');

        $response = Prism::structured()
            ->using(Provider::OpenAI, 'gpt-5-mini')
            ->withSchema($this->plannerOutputSchema())
            ->withSystemPrompt(view('prompts.beer-and-code-mentor', ['task_type' => TaskType::all()]))
            ->withPrompt(view('prompts.execution-beer-and-code-mentor', [
                'meta' => $diagnosis->goal->name,
                'deadline' => $diagnosis->goal->deadline,
                'description' => $diagnosis->goal->description,
                'technical_focus' => $diagnosis->diagnosisItems
                    ->where('diagnosis_pillar_id', DiagnosisPillarEnum::Technical)
                    ->whereNotNull('user_selected_at')->first()->description,
                'strategic_focus' => $diagnosis->diagnosisItems
                    ->where('diagnosis_pillar_id', DiagnosisPillarEnum::Strategic)
                    ->whereNotNull('user_selected_at')->first()->description,
                'behavioral_focus' => $diagnosis->diagnosisItems
                    ->where('diagnosis_pillar_id', DiagnosisPillarEnum::Behavioral)
                    ->whereNotNull('user_selected_at')->first()->description,
                'situation' => $diagnosis->description
            ]))
            ->withMaxSteps(5)
            ->withTools([
                $this->technicalDeepDive(),
                $this->strategyAndPlaning(),
                $this->behavioralAndSoftSkills(),
                $this->storeTasks($diagnosis->goal_id)
            ])
            ->withClientOptions(['timeout' => 120])
            ->asStructured();

    }
    
}