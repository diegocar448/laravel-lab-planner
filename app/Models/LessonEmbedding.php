<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Pgvector\Laravel\HasNeighbors;
use Pgvector\Laravel\Vector;

class LessonEmbedding extends Model
{
   use HasNeighbors;

    protected $fillable = [
        'name',
        'content',
        'embedding',
        'start',
        'end',
    ];

    protected function casts(): array
    {
        return [
            'embedding' => Vector::class,
        ];
    }
}
