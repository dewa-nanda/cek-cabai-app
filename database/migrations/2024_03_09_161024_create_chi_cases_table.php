<?php

use App\Models\Disease;
use App\Models\User;
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
            $table->foreignIdFor(User::class)
                ->nullable()    
                ->constrained('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            
            $table->foreignIdFor(Disease::class)
                ->constrained('diseases')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->integer('derajat_kepercayaan')->nullable(); // skala 0 - 100 (0% - 100%) final result for cf
            $table->integer('kemiripan_kasus')->nullable(); // skala 0 - 100 (0% - 100%) final result for cbr
            $table->enum('valid', ['notChecked', 'notValid', 'valid'])->default('notChecked');
            $table->boolean('repaired')->nullable();
            $table->boolean('pakar')->nullable();
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
