<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('lesson_embeddings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('content');
            $table->vector('embedding')->comment('modelo text-embedding-3-small');
            $table->float('start');
            $table->float('end');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lesson_embeddings');
    }
};
