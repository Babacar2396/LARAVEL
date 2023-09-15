<?php

use App\Models\Semestre;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('classe_disciplines', function (Blueprint $table) {
            // $table->foreignId('semestre_id')->constrained('Semestre'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('classe_disciplines', function (Blueprint $table) {
              Schema::dropIfExists('classe_disciplines');
        });
    }
};
