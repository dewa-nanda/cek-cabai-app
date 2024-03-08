<?php

use App\Models\Disease;
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
        Schema::create('disease_for_symptoms', function (Blueprint $table) {
            $table->id();
            
            $table->foreignIdFor(Disease::class)
                    ->constrained('diseases')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');

            $table->foreignIdFor(Symptom::class)
                    ->constrained('symptoms')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');

            $table->integer('tingkat_kepercayaan'); // skala 0 - 100 (0% - 100%)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('disease_for_symptoms');
    }
};
