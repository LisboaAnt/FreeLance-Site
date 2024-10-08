<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id(); // Isso cria a coluna 'id' autoincrement
            $table->string('title');
            $table->text('description');
            $table->dateTime('ends_at')->nullable();
            $table->string('status')->default('open');
            $table->json('tech_stack')->nullable();
            $table->foreignId('created_by')->constrained('users');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
