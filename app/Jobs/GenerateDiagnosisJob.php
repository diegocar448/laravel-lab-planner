<?php

namespace App\Jobs;

use App\Models\Diagnosis;
use App\Services\AgentDiagnosisService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;

class GenerateDiagnosisJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public Diagnosis $diagnosis) {}

    /**
     * Execute the job.
     */
    public function handle(AgentDiagnosisService $agentDiagnosisService): void
    {
        Log::info("Iniciando diagnóstico {$this->diagnosis->id}");

        $response = $agentDiagnosisService->generate($this->diagnosis);

        $this->diagnosis->description = $response->structured['diagnosis'];
        $this->diagnosis->save();

        $this->diagnosis->diagnosisItems()->update(['agent_selected_at' => null]);

        $this->diagnosis->diagnosisItems()
            ->whereIn('id', $response->structured['diagnosis_items_ids'])
            ->update(['agent_selected_at' => now()]);

        Log::info("Finalizado diagnóstico {$this->diagnosis->id}");
    }
}
