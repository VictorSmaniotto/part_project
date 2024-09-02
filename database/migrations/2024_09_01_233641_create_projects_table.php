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
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('archive_path')->nullable();
            $table->foreignId('course_id')->constrained();
            $table->foreignId('professor_id')->constrained('users');
            $table->enum('project_type', ['TCC', 'Projeto Integrador', 'Pesquisa', 'Seminário', 'Voluntário'])->default('Projeto Integrador');
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
