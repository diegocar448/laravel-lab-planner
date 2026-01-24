<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DiagnosisItem extends Model
{
    protected $fillable = [
        'diagnosis_id',
        'diagnosis_item_type_id',
        'diagnosis_pillar_id',
        'description',
        'agent_selected_at',
        'user_selected_at',
    ];

    protected function casts(): array
    {
        return [
            'agent_selected_at' => 'datetime',
            'user_selected_at' => 'datetime',
        ];
    }

    public function diagnosis(): BelongsTo
    {
        return $this->belongsTo(Diagnosis::class);
    }

    public function diagnosisItemType(): BelongsTo
    {
        return $this->belongsTo(DiagnosisItemType::class);
    }

    public function diagnosisPillar(): BelongsTo
    {
        return $this->belongsTo(DiagnosisPillar::class);
    }
}
