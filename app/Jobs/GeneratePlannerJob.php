<?php

namespace App\Jobs;

use App\Models\Diagnosis;
use App\Services\AgentPlannerService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;

class GeneratePlannerJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public Diagnosis $diagnosis) {}

    /**
     * Execute the job.
     */
    public function handle(AgentPlannerService $agentPlannerService): void
    {
        Log::info("Iniciando plano de ação para diagnóstico {$this->diagnosis->id}");

        $agentPlannerService->generate($this->diagnosis);

        Log::info("Finalizado plano de ação para diagnóstico {$this->diagnosis->id}");
    }
}
