<?php

namespace App\Livewire\Forms;

use App\Enums\GoalSituationEnum;
use App\Models\Goal;
use Livewire\Attributes\Validate;
use Livewire\Form;
use function auth;

class GoalForm extends Form
{
    public ?Goal $goal = null;

    #[Validate('required|string|min:3|max:255')]
    public string $name = '';

    #[Validate('required|date|after:today')]
    public string $deadline = '';

    #[Validate('required|string|min:10|max:5000')]
    public string $description = '';

    public function setGoal(Goal $goal): void
    {
        $this->goal = $goal;
        $this->name = $goal->name;
        $this->deadline = $goal->deadline->format('Y-m-d');
        $this->description = $goal->description;
        $this->goal_situation_id = $goal->goal_situation_id;
    }

    public function store(): Goal
    {
        $this->validate();

        $goal = Goal::create([
            ...$this->only(['name', 'deadline', 'description', 'goal_situation_id']),
            'goal_situation_id' => GoalSituationEnum::InProgress,
            'user_id' => auth()->id(),
        ]);

        $this->reset();

        return $goal;
    }

    public function update(): Goal
    {
        $this->validate();

        $this->goal->update(
            $this->only(['name', 'deadline', 'description', 'self_situation', 'goal_situation_id'])
        );

        return $this->goal;
    }
}
