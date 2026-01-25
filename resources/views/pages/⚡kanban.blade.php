<?php

use App\Models\Task;
use App\Models\TaskStep;
use Livewire\Attributes\Computed;
use Livewire\Component;

new class extends Component {

    #[Computed]
    public function steps()
    {
        return TaskStep::with([
            'tasks' => fn($q) => $q->forCurrentUser()->orderBy('order'),
            'tasks.goal',
            'tasks.taskType'
        ])->get();
    }

    #[Computed]
    public function isGeneratingPlan(): bool
    {
        $user = auth()->user();

        if (is_null($user->planner_created_at)) {
            return false;
        }

        return Task::forCurrentUser()->count() === 0;
    }

    public function moveTaskBacklog($taskId, $newPosition)
    {
        $this->moveTask($taskId, $newPosition, 1);
    }

    public function moveTaskToDo($taskId, $newPosition)
    {
        $this->moveTask($taskId, $newPosition, 2);
    }

    public function moveTaskDoing($taskId, $newPosition)
    {
        $this->moveTask($taskId, $newPosition, 3);
    }

    public function moveTaskDone($taskId, $newPosition)
    {
        $this->moveTask($taskId, $newPosition, 4);
    }

    public function moveTask($taskId, $newPosition, $targetStepId)
    {
        $task = Task::findOrFail($taskId);

        $sourceStepId = $task->task_step_id;
        $oldPosition = $task->order;

        if ($sourceStepId == $targetStepId)
        {
            if ($oldPosition == $newPosition)
            {
                return;
            }

            if ($oldPosition < $newPosition)
            {
                Task::query()
                    ->forCurrentUser()
                    ->where('task_step_id', $targetStepId)
                    ->where('order', '>', $oldPosition)
                    ->where('order', '<=', $newPosition)
                    ->decrement('order');
            } else {
                Task::query()
                    ->forCurrentUser()
                    ->where('task_step_id', $targetStepId)
                    ->where('order', '>=', $newPosition)
                    ->where('order', '<', $oldPosition)
                    ->increment('order');
            }

            $task->update(['order'=> $newPosition]);
        } else {
            Task::query()
                ->forCurrentUser()
                ->where('task_step_id', $sourceStepId)
                ->where('order', '>', $oldPosition)
                ->decrement('order');

            // Make room in the target step
            Task::query()
                ->forCurrentUser()
                ->where('task_step_id', $targetStepId)
                ->where('order', '>=', $newPosition)
                ->increment('order');

            // Move the task to the new step and position
            $task->update([
                'task_step_id' => $targetStepId,
                'order' => $newPosition,
            ]);
        }
    }
};
?>

<div class="p-8 h-full" wire:poll.5s="$refresh">
    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-3xl font-bold text-neutral-900 dark:text-white">
                Kanban
            </h1>
            <p class="text-neutral-600 dark:text-neutral-400 mt-1">
                Gerencie suas tarefas de forma visual
            </p>
        </div>
        <x-theme-toggle/>
    </div>

    @if($this->isGeneratingPlan)
        <div class="mb-8 p-6 bg-primary/10 dark:bg-primary/20 border border-primary/30 rounded-xl">
            <div class="flex items-center gap-4">
                <div class="flex-shrink-0">
                    <svg class="w-8 h-8 text-primary animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-primary dark:text-primary-light">
                        Gerando seu plano de ação...
                    </h3>
                    <p class="text-sm text-primary/80 dark:text-primary-light/80 mt-1">
                        A IA está analisando seu diagnóstico e criando tarefas personalizadas. Isso pode levar alguns instantes.
                    </p>
                </div>
            </div>
        </div>
    @endif

    <div class="flex gap-6 overflow-x-auto pb-4">

        @foreach($this->steps as $step)
            <div class="flex-shrink-0 w-80">

                <x-kanban-column-header
                        :title="$step['name']"
                        :color="$step['color']"
                        :count="count($step['tasks'])"
                        :colum-key="$step['name']"
                />

                <div class="flex flex-col gap-3 min-h-96 p-2 rounded-lg bg-neutral-100 dark:bg-neutral-800/50"
                     wire:sort="moveTask{{str_replace("-", "", $step['name'])}}"
                     wire:sort:group="kanban"
                >

                    @forelse($step['tasks'] as $task)
                        <x-kanban-card
                                :task="$task"
                        />
                    @empty
                        <x-kanban-empty-state/>
                    @endforelse

                </div>

            </div>

        @endforeach

    </div>
</div>