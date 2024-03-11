<?php

use App\Models\Disease;
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
        Schema::create('chi_cases', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Disease::class)
                ->constrained('diseases')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->integer('tingkat_kepercayaan'); // skala 0 - 100 (0% - 100%)
            $table->boolean('valid')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chi_cases');
    }
};
