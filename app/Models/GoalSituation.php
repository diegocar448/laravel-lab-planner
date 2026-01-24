<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class GoalSituation extends Model
{
    protected $fillable = [
        'name',
        'icon',
        'color',
    ];

    public function goals(): HasMany
    {
        return $this->hasMany(Goal::class);
    }
}
