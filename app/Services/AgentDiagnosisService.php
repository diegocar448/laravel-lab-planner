<?php

namespace App\Services;

use App\Models\Diagnosis;
use Prism\Prism\Enums\Provider;
use Prism\Prism\Facades\Prism;
use Prism\Prism\Schema\ArraySchema;
use Prism\Prism\Schema\ObjectSchema;
use Prism\Prism\Schema\StringSchema;

class AgentDiagnosisService
{
    public function diagnosisOutputSchema(): ObjectSchema
    {
        return new ObjectSchema(
            name: 'diagnosis',
            description: 'Diagnostico do momento atual em relação a meta do usuario',
            properties: [
                new StringSchema('diagnosis', 'O diagnostico completo em texto corrido em formato markdown'),
                new ArraySchema(
                    name: 'diagnosis_items_ids',
                    description: 'Ids de 3 items do diagnostico marcados para serem trabalhados',
                    items: new StringSchema(
                        name: 'diagnosis_item_id',
                        description: 'O id numerico do item que precisa ser melhorado'
                    )
                ),
            ],
            requiredFields: ['diagnosis', 'diagnosis_items_ids'],
        );
    }

    public function generate(Diagnosis $diagnosis)
    {
        $diagnosis->load('goal', 'diagnosisItems.diagnosisItemType', 'diagnosisItems.diagnosisPillar');
        $response = Prism::structured()
            ->using(Provider::Groq, 'llama-3.3-70b-versatile')
            ->withSchema($this->diagnosisOutputSchema())
            ->withSystemPrompt(view('prompts.diagnosis-system-prompt'))
            ->withPrompt($diagnosis->toJson())
            ->withClientOptions(['timeout' => 120])
            ->asStructured();

        return $response;
    }
}
