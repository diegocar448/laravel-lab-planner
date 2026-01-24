<?php

namespace App\Livewire\Forms;

use App\Models\Goal;
use Livewire\Attributes\Validate;
use Livewire\Form;

class DiagnosisForm extends Form
{
    public function createDiagnosis(Goal $goal)
    {
        return $goal->diagnoses()->create();
    }
}
