<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\AnneeScolaire;
use App\Models\Discipline;
use App\Models\Classe;
use App\Models\Evaluation;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('classe_disciplines', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Discipline::class)->constrained();
            $table->foreignIdFor(Classe::class)->constrained();
            $table->foreignIdFor(AnneeScolaire::class)->constrained();
            $table->foreignIdFor(Evaluation::class)->constrained();
            $table->integer('noteMax');
            $table->boolean('etat')->default(1);
            $table->foreignIdFor(Semestre::class)->constrained(); // Ajout de la colonne semestre_id
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classe_disciplines');
    }
};
