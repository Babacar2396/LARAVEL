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
        {
            Schema::create('notes', function (Blueprint $table) {
                $table->id();
                $table->foreignId('classe_discipline_id')->constrained('classe_disciplines');
                $table->foreignId('inscription_id')->constrained('inscriptions');
                $table->foreignId('semestre_actif_id')->constrained('semestre_actifs');
                // $table->foreignId('annee_scolaires_id')->constrained('annee_scolaires');
                // $table->foreignId('evaluations_id')->constrained('evaluations');
                $table->integer('note');
                $table->timestamps();
            });
        }
        }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notes');
    }
};
