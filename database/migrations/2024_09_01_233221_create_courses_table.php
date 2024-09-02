<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255); // Definindo um comprimento máximo para o nome
            $table->text('description')->nullable();
            $table->enum('knowledge_area', ['Tecnologia', 'Saúde', 'Gestão', 'Comércio', 'Segurança', 'Turismo'])->default('Tecnologia');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
