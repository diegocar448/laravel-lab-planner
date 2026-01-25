<?php

use App\Enums\DiagnosisItemTypeEnum;
use App\Enums\DiagnosisPillarEnum;
use App\Jobs\GenerateDiagnosisJob;
use App\Jobs\GeneratePlannerJob;
use App\Models\Diagnosis;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;

new class extends Component {

    public Diagnosis $diagnosis;
    public bool $isGeneratingDiagnosis = false;

    public function mount(Diagnosis $diagnosis)
    {
        $this->diagnosis = $diagnosis->load('goal', 'diagnosisItems.diagnosisItemType', 'diagnosisItems.diagnosisPillar');
        abort_if($this->diagnosis->goal->user_id !== auth()->id(), 403);

        if (!$this->diagnosis->description) {
            $this->isGeneratingDiagnosis = true;
            $this->dispatch('generateDiagnostic');
        }
    }

    public function selectItem($item_id)
    {
        $item = $this->diagnosis->diagnosisItems()->where('id', $item_id)->first();

        $this->diagnosis->diagnosisItems()->where('diagnosis_pillar_id', $item->diagnosis_pillar_id)
            ->where('diagnosis_item_type_id', DiagnosisItemTypeEnum::NeedToImprove)
            ->update(['user_selected_at' => null]);

        $item->update(['user_selected_at' => now()]);
        $this->diagnosis->refresh();
    }

    #[Computed]
    public function hasTechnicalSelected(): bool
    {
        return $this->diagnosis->diagnosisItems
            ->where('diagnosis_item_type_id', DiagnosisItemTypeEnum::NeedToImprove)
            ->where('diagnosis_pillar_id', DiagnosisPillarEnum::Technical)
            ->whereNotNull('user_selected_at')
            ->isNotEmpty();
    }

    #[Computed]
    public function hasStrategicSelected(): bool
    {
        return $this->diagnosis->diagnosisItems
            ->where('diagnosis_item_type_id', DiagnosisItemTypeEnum::NeedToImprove)
            ->where('diagnosis_pillar_id', DiagnosisPillarEnum::Strategic)
            ->whereNotNull('user_selected_at')
            ->isNotEmpty();
    }

    #[Computed]
    public function hasBehavioralSelected(): bool
    {
        return $this->diagnosis->diagnosisItems
            ->where('diagnosis_item_type_id', DiagnosisItemTypeEnum::NeedToImprove)
            ->where('diagnosis_pillar_id', DiagnosisPillarEnum::Behavioral)
            ->whereNotNull('user_selected_at')
            ->isNotEmpty();
    }

    #[Computed]
    public function hasAllPillarsSelected(): bool
    {
        return $this->hasTechnicalSelected && $this->hasStrategicSelected && $this->hasBehavioralSelected;
    }

    #[Computed]
    public function canCreateActionPlan(): bool
    {
        return is_null(auth()->user()->planner_created_at) && $this->hasAllPillarsSelected;
    }

    public function generateActionPlan()
    {
        if (!$this->canCreateActionPlan) {
            return;
        }

        auth()->user()->update(['planner_created_at' => now()]);

        dispatch(new GeneratePlannerJob($this->diagnosis));

        $this->redirect(route('kanban'), navigate: true);
    }

    #[On('generateDiagnostic')]
    public function generateDiagnostic()
    {
        auth()->user()->update(['diagnosis_created_at' => now()]);

        dispatch(new GenerateDiagnosisJob($this->diagnosis));
    }
};
?>

<div class="p-8 max-w-6xl mx-auto" wire:poll.5s="$refresh">
    {{-- Header --}}
    <div class="mb-8">
        <div class="flex items-start justify-between">
            <div>
                <h1 class="text-3xl font-bold text-neutral-900 dark:text-white">
                    {{ $diagnosis->goal->name }}
                </h1>
                <div class="flex items-center gap-4 mt-2 text-sm text-neutral-500 dark:text-neutral-400">
                    <span class="flex items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                        </svg>
                        Meta: {{ $diagnosis->goal->created_at->format('d/m/Y') }}
                    </span>
                    <span class="flex items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 3.104v5.714a2.25 2.25 0 0 1-.659 1.591L5 14.5M9.75 3.104c-.251.023-.501.05-.75.082m.75-.082a24.301 24.301 0 0 1 4.5 0m0 0v5.714c0 .597.237 1.17.659 1.591L19.8 15.3M14.25 3.104c.251.023.501.05.75.082M19.8 15.3l-1.57.393A9.065 9.065 0 0 1 12 15a9.065 9.065 0 0 0-6.23-.693L5 14.5m14.8.8 1.402 1.402c1.232 1.232.65 3.318-1.067 3.611A48.309 48.309 0 0 1 12 21c-2.773 0-5.491-.235-8.135-.687-1.718-.293-2.3-2.379-1.067-3.61L5 14.5" />
                        </svg>
                        Diagnóstico: {{ $diagnosis->created_at->format('d/m/Y') }}
                    </span>
                </div>
            </div>
            <x-theme-toggle />
        </div>
    </div>

    {{-- Loading State - Gerando Diagnóstico --}}
    @if(!$diagnosis->description)
        <div class="mb-8 p-6 bg-amber-50 dark:bg-amber-900/20 border border-amber-200 dark:border-amber-800 rounded-xl">
            <div class="flex items-center gap-4">
                <div class="flex-shrink-0">
                    <svg class="w-8 h-8 text-amber-600 dark:text-amber-400 animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-amber-800 dark:text-amber-300">
                        Gerando seu diagnóstico...
                    </h3>
                    <p class="text-sm text-amber-700 dark:text-amber-400 mt-1">
                        A IA está analisando suas informações. Isso pode levar alguns instantes.
                    </p>
                </div>
            </div>
        </div>
    @endif

    {{-- Diagnóstico Gerado --}}
    @if($diagnosis->description)
        {{-- Card do Diagnóstico --}}
        <div class="mb-8 p-6 bg-white dark:bg-neutral-900 border border-neutral-200 dark:border-neutral-800 rounded-xl shadow-sm">
            <h2 class="text-xl font-semibold text-neutral-900 dark:text-white mb-4 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-primary">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 3.104v5.714a2.25 2.25 0 0 1-.659 1.591L5 14.5M9.75 3.104c-.251.023-.501.05-.75.082m.75-.082a24.301 24.301 0 0 1 4.5 0m0 0v5.714c0 .597.237 1.17.659 1.591L19.8 15.3M14.25 3.104c.251.023.501.05.75.082M19.8 15.3l-1.57.393A9.065 9.065 0 0 1 12 15a9.065 9.065 0 0 0-6.23-.693L5 14.5m14.8.8 1.402 1.402c1.232 1.232.65 3.318-1.067 3.611A48.309 48.309 0 0 1 12 21c-2.773 0-5.491-.235-8.135-.687-1.718-.293-2.3-2.379-1.067-3.61L5 14.5" />
                </svg>
                Análise do Diagnóstico
            </h2>
            <div class="prose prose-neutral dark:prose-invert max-w-none">
                {!! \Illuminate\Support\Str::markdown($diagnosis->description) !!}
            </div>
        </div>

        {{-- Seção: Domino Bem --}}
        <div class="mb-8">
            <h2 class="text-xl font-semibold text-neutral-900 dark:text-white mb-4 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-green-500">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                Domino Bem
            </h2>
            <p class="text-neutral-600 dark:text-neutral-400 mb-4">Seus pontos fortes identificados</p>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                {{-- Técnico --}}
                <div class="p-4 bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 rounded-xl">
                    <h3 class="font-semibold text-green-800 dark:text-green-300 mb-3 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 6.75 22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3-4.5 16.5" />
                        </svg>
                        Técnico
                    </h3>
                    <ul class="space-y-2">
                        @foreach($diagnosis->diagnosisItems as $item)
                            @if ($item->diagnosis_item_type_id == DiagnosisItemTypeEnum::DoingWell && $item->diagnosis_pillar_id == DiagnosisPillarEnum::Technical)
                                <li class="text-sm text-green-700 dark:text-green-400 bg-white dark:bg-neutral-800 p-2 rounded-lg">
                                    {{ $item->description }}
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>

                {{-- Estratégico --}}
                <div class="p-4 bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 rounded-xl">
                    <h3 class="font-semibold text-green-800 dark:text-green-300 mb-3 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3v11.25A2.25 2.25 0 0 0 6 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0 1 18 16.5h-2.25m-7.5 0h7.5m-7.5 0-1 3m8.5-3 1 3m0 0 .5 1.5m-.5-1.5h-9.5m0 0-.5 1.5" />
                        </svg>
                        Estratégico
                    </h3>
                    <ul class="space-y-2">
                        @foreach($diagnosis->diagnosisItems as $item)
                            @if ($item->diagnosis_item_type_id == DiagnosisItemTypeEnum::DoingWell && $item->diagnosis_pillar_id == DiagnosisPillarEnum::Strategic)
                                <li class="text-sm text-green-700 dark:text-green-400 bg-white dark:bg-neutral-800 p-2 rounded-lg">
                                    {{ $item->description }}
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>

                {{-- Comportamental --}}
                <div class="p-4 bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 rounded-xl">
                    <h3 class="font-semibold text-green-800 dark:text-green-300 mb-3 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                        </svg>
                        Comportamental
                    </h3>
                    <ul class="space-y-2">
                        @foreach($diagnosis->diagnosisItems as $item)
                            @if ($item->diagnosis_item_type_id == DiagnosisItemTypeEnum::DoingWell && $item->diagnosis_pillar_id == DiagnosisPillarEnum::Behavioral)
                                <li class="text-sm text-green-700 dark:text-green-400 bg-white dark:bg-neutral-800 p-2 rounded-lg">
                                    {{ $item->description }}
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        {{-- Seção: Preciso Melhorar --}}
        <div class="mb-8">
            <h2 class="text-xl font-semibold text-neutral-900 dark:text-white mb-2 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-amber-500">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                </svg>
                Preciso Melhorar
            </h2>
            <p class="text-neutral-600 dark:text-neutral-400 mb-4">Selecione <strong>1 item de cada pilar</strong> para focar no seu plano de ação</p>

            {{-- Status de Seleção --}}
            <div class="mb-4 p-4 bg-neutral-100 dark:bg-neutral-800 rounded-xl">
                <div class="flex flex-wrap items-center gap-4">
                    <span class="text-sm font-medium text-neutral-700 dark:text-neutral-300">Status da seleção:</span>
                    <div class="flex items-center gap-2">
                        @if($this->hasTechnicalSelected)
                            <span class="inline-flex items-center gap-1 px-2 py-1 bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-400 text-xs font-medium rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-3 h-3">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                                </svg>
                                Técnico
                            </span>
                        @else
                            <span class="inline-flex items-center gap-1 px-2 py-1 bg-neutral-200 dark:bg-neutral-700 text-neutral-600 dark:text-neutral-400 text-xs font-medium rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-3 h-3">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                Técnico
                            </span>
                        @endif

                        @if($this->hasStrategicSelected)
                            <span class="inline-flex items-center gap-1 px-2 py-1 bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-400 text-xs font-medium rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-3 h-3">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                                </svg>
                                Estratégico
                            </span>
                        @else
                            <span class="inline-flex items-center gap-1 px-2 py-1 bg-neutral-200 dark:bg-neutral-700 text-neutral-600 dark:text-neutral-400 text-xs font-medium rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-3 h-3">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                Estratégico
                            </span>
                        @endif

                        @if($this->hasBehavioralSelected)
                            <span class="inline-flex items-center gap-1 px-2 py-1 bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-400 text-xs font-medium rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-3 h-3">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                                </svg>
                                Comportamental
                            </span>
                        @else
                            <span class="inline-flex items-center gap-1 px-2 py-1 bg-neutral-200 dark:bg-neutral-700 text-neutral-600 dark:text-neutral-400 text-xs font-medium rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-3 h-3">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                Comportamental
                            </span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                {{-- Técnico --}}
                <div @class([
                    "p-4 border rounded-xl transition-all",
                    "bg-amber-50 dark:bg-amber-900/20 border-amber-200 dark:border-amber-800" => !$this->hasTechnicalSelected,
                    "bg-green-50 dark:bg-green-900/20 border-green-300 dark:border-green-700" => $this->hasTechnicalSelected,
                ])>
                    <h3 @class([
                        "font-semibold mb-3 flex items-center gap-2",
                        "text-amber-800 dark:text-amber-300" => !$this->hasTechnicalSelected,
                        "text-green-800 dark:text-green-300" => $this->hasTechnicalSelected,
                    ])>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 6.75 22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3-4.5 16.5" />
                        </svg>
                        Técnico
                        @if(!$this->hasTechnicalSelected)
                            <span class="text-xs font-normal">(selecione 1)</span>
                        @endif
                    </h3>
                    <ul class="space-y-2">
                        @foreach($diagnosis->diagnosisItems as $item)
                            @if ($item->diagnosis_item_type_id == DiagnosisItemTypeEnum::NeedToImprove && $item->diagnosis_pillar_id == DiagnosisPillarEnum::Technical)
                                <li wire:click="selectItem({{ $item->id }})" @class([
                                    "text-sm p-3 rounded-lg cursor-pointer transition-all flex items-center justify-between gap-2",
                                    "bg-white dark:bg-neutral-800 hover:bg-amber-100 dark:hover:bg-amber-900/30 text-amber-700 dark:text-amber-400" => !$item->user_selected_at,
                                    "bg-green-200 dark:bg-green-800 text-green-800 dark:text-green-200 ring-2 ring-green-500" => $item->user_selected_at,
                                    "ring-2 ring-primary ring-offset-1" => $item->agent_selected_at && !$item->user_selected_at,
                                ])>
                                    <span>{{ $item->description }}</span>
                                    @if($item->user_selected_at)
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 flex-shrink-0">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                                        </svg>
                                    @elseif($item->agent_selected_at)
                                        <span class="text-xs text-primary flex-shrink-0">Sugerido</span>
                                    @endif
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>

                {{-- Estratégico --}}
                <div @class([
                    "p-4 border rounded-xl transition-all",
                    "bg-amber-50 dark:bg-amber-900/20 border-amber-200 dark:border-amber-800" => !$this->hasStrategicSelected,
                    "bg-green-50 dark:bg-green-900/20 border-green-300 dark:border-green-700" => $this->hasStrategicSelected,
                ])>
                    <h3 @class([
                        "font-semibold mb-3 flex items-center gap-2",
                        "text-amber-800 dark:text-amber-300" => !$this->hasStrategicSelected,
                        "text-green-800 dark:text-green-300" => $this->hasStrategicSelected,
                    ])>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3v11.25A2.25 2.25 0 0 0 6 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0 1 18 16.5h-2.25m-7.5 0h7.5m-7.5 0-1 3m8.5-3 1 3m0 0 .5 1.5m-.5-1.5h-9.5m0 0-.5 1.5" />
                        </svg>
                        Estratégico
                        @if(!$this->hasStrategicSelected)
                            <span class="text-xs font-normal">(selecione 1)</span>
                        @endif
                    </h3>
                    <ul class="space-y-2">
                        @foreach($diagnosis->diagnosisItems as $item)
                            @if ($item->diagnosis_item_type_id == DiagnosisItemTypeEnum::NeedToImprove && $item->diagnosis_pillar_id == DiagnosisPillarEnum::Strategic)
                                <li wire:click="selectItem({{ $item->id }})" @class([
                                    "text-sm p-3 rounded-lg cursor-pointer transition-all flex items-center justify-between gap-2",
                                    "bg-white dark:bg-neutral-800 hover:bg-amber-100 dark:hover:bg-amber-900/30 text-amber-700 dark:text-amber-400" => !$item->user_selected_at,
                                    "bg-green-200 dark:bg-green-800 text-green-800 dark:text-green-200 ring-2 ring-green-500" => $item->user_selected_at,
                                    "ring-2 ring-primary ring-offset-1" => $item->agent_selected_at && !$item->user_selected_at,
                                ])>
                                    <span>{{ $item->description }}</span>
                                    @if($item->user_selected_at)
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 flex-shrink-0">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                                        </svg>
                                    @elseif($item->agent_selected_at)
                                        <span class="text-xs text-primary flex-shrink-0">Sugerido</span>
                                    @endif
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>

                {{-- Comportamental --}}
                <div @class([
                    "p-4 border rounded-xl transition-all",
                    "bg-amber-50 dark:bg-amber-900/20 border-amber-200 dark:border-amber-800" => !$this->hasBehavioralSelected,
                    "bg-green-50 dark:bg-green-900/20 border-green-300 dark:border-green-700" => $this->hasBehavioralSelected,
                ])>
                    <h3 @class([
                        "font-semibold mb-3 flex items-center gap-2",
                        "text-amber-800 dark:text-amber-300" => !$this->hasBehavioralSelected,
                        "text-green-800 dark:text-green-300" => $this->hasBehavioralSelected,
                    ])>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                        </svg>
                        Comportamental
                        @if(!$this->hasBehavioralSelected)
                            <span class="text-xs font-normal">(selecione 1)</span>
                        @endif
                    </h3>
                    <ul class="space-y-2">
                        @foreach($diagnosis->diagnosisItems as $item)
                            @if ($item->diagnosis_item_type_id == DiagnosisItemTypeEnum::NeedToImprove && $item->diagnosis_pillar_id == DiagnosisPillarEnum::Behavioral)
                                <li wire:click="selectItem({{ $item->id }})" @class([
                                    "text-sm p-3 rounded-lg cursor-pointer transition-all flex items-center justify-between gap-2",
                                    "bg-white dark:bg-neutral-800 hover:bg-amber-100 dark:hover:bg-amber-900/30 text-amber-700 dark:text-amber-400" => !$item->user_selected_at,
                                    "bg-green-200 dark:bg-green-800 text-green-800 dark:text-green-200 ring-2 ring-green-500" => $item->user_selected_at,
                                    "ring-2 ring-primary ring-offset-1" => $item->agent_selected_at && !$item->user_selected_at,
                                ])>
                                    <span>{{ $item->description }}</span>
                                    @if($item->user_selected_at)
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 flex-shrink-0">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                                        </svg>
                                    @elseif($item->agent_selected_at)
                                        <span class="text-xs text-primary flex-shrink-0">Sugerido</span>
                                    @endif
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        {{-- Botão Gerar Plano --}}
        <div class="sticky bottom-0 py-4 bg-neutral-50 dark:bg-neutral-1100 border-t border-neutral-200 dark:border-neutral-800 -mx-8 px-8">
            <div class="flex items-center justify-between">
                <div>
                    @if(!$this->hasAllPillarsSelected)
                        <p class="text-amber-600 dark:text-amber-400 text-sm flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                            </svg>
                            Selecione 1 item de cada pilar para gerar seu plano de ação
                        </p>
                    @elseif(!is_null(auth()->user()->planner_created_at))
                        <p class="text-neutral-500 dark:text-neutral-400 text-sm flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            Você já gerou seu plano de ação
                        </p>
                    @else
                        <p class="text-green-600 dark:text-green-400 text-sm flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            Pronto! Você pode gerar seu plano de ação
                        </p>
                    @endif
                </div>

                <x-button
                    variant="primary"
                    size="lg"
                    class="cursor-pointer"
                    wire:click="generateActionPlan"
                    :disabled="!$this->canCreateActionPlan"
                    wire:loading.attr="disabled"
                >
                    <x-slot:iconLeft>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904 9 18.75l-.813-2.846a4.5 4.5 0 0 0-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 0 0 3.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 0 0 3.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 0 0-3.09 3.09ZM18.259 8.715 18 9.75l-.259-1.035a3.375 3.375 0 0 0-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 0 0 2.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 0 0 2.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 0 0-2.456 2.456ZM16.894 20.567 16.5 21.75l-.394-1.183a2.25 2.25 0 0 0-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 0 0 1.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 0 0 1.423 1.423l1.183.394-1.183.394a2.25 2.25 0 0 0-1.423 1.423Z" />
                        </svg>
                    </x-slot:iconLeft>
                    Gerar Plano de Ação com IA
                </x-button>
            </div>
        </div>
    @endif
</div>
