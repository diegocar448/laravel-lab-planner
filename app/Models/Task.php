<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    protected $fillable = [
        'goal_id',
        'task_type_id',
        'task_step_id',
        'title',
        'week_prevision',
        'order',
        'scheduled_date',
        'completed_at',
    ];

    protected function casts(): array
    {
        return [
            'week_prevision' => 'integer',
            'order' => 'integer',
            'scheduled_date' => 'datetime',
            'completed_at' => 'datetime',
        ];
    }

    public function goal(): BelongsTo
    {
        return $this->belongsTo(Goal::class);
    }

    public function taskType(): BelongsTo
    {
        return $this->belongsTo(TaskType::class);
    }

    public function taskStep(): BelongsTo
    {
        return $this->belongsTo(TaskSteps::class, 'task_step_id');
    }
}
