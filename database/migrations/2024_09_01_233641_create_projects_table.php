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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->text('description')->nullable();
            $table->string('file_path')->nullable();
            $table->foreignId('course_id')->constrained();
            $table->foreignId('professor_id')->constrained('users')->default('2');
            $table->foreignId('team_id')->nullable()->constrained(); 
            $table->enum('project_type', ['TCC', 'Projeto Integrador', 'Pesquisa', 'Seminário', 'Voluntário'])->default('Projeto Integrador');
            $table->string('rating')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
