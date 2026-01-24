<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Goal extends Model
{
    protected $fillable = [
        'user_id',
        'goal_situation_id',
        'name',
        'deadline',
        'description',
    ];

    protected function casts(): array
    {
        return [
            'deadline' => 'date',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function goalSituation(): BelongsTo
    {
        return $this->belongsTo(GoalSituation::class);
    }

    public function diagnosis(): HasOne
    {
        return $this->hasOne(Diagnosis::class);
    }

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }
}
