<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Diagnosis extends Model
{
    protected $fillable = [
        'goal_id',
        'diagnosis_status_id',
        'description',
    ];

    public function goal(): BelongsTo
    {
        return $this->belongsTo(Goal::class);
    }

    public function diagnosisStatus(): BelongsTo
    {
        return $this->belongsTo(DiagnosisStatus::class);
    }

    public function diagnosisItems(): HasMany
    {
        return $this->hasMany(DiagnosisItem::class);
    }
}
