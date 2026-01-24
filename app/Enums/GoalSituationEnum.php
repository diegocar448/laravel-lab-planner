<?php

namespace App\Enums;

enum GoalSituationEnum: int
{
    case InProgress = 1;
    case Archived = 2;
    case Abandoned = 3;

    public function label(): string
    {
        return match ($this) {
            self::InProgress => "In Progress",
            self::Archived => "Archived",
            self::Abandoned => "Abandoned",
        };
    }
}
