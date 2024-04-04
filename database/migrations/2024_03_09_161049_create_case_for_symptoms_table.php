<?php

use App\Models\ChiCase;
use App\Models\Symptom;
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
        Schema::create('case_for_symptoms', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(ChiCase::class)
                ->constrained('chi_cases')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreignIdFor(Symptom::class)
                ->constrained('symptoms')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            
            // dipake untuk perhitungan CBR
            $table->integer('bobot_kepercayaan')->nullable(); // skala 0 - 100 (0% - 100%) bobot kepercayaan pakar terhadap gejala kepada suatu kasus
            // dipake untuk perhitungan CF
            $table->integer('mb')->nullable(); // skala 0 - 100 (0% - 100%) measure of belife
            $table->integer('md')->nullable(); // skala 0 - 100 (0% - 100%) measure of disbelife
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('case_for_symptoms');
    }
};
