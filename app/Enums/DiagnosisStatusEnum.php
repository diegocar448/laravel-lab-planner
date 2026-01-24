<?php

namespace App\Enums;

enum DiagnosisStatusEnum: int
{
    case Creating = 1;
    case InProgress = 2;
    case Completed = 3;

    public function label(): string
    {
        return match ($this) {
            self::Creating => "Creating",
            self::InProgress => "In Progress",
            self::Completed => "Completed",
        };
    }
}
