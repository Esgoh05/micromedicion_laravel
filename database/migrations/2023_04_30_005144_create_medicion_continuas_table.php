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
        Schema::create('medicion_continuas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->double('caudalpromedio');
            $table->time('tiempo', $precision = 0);
            $table->double('volumen');
            $table->dateTimeTz('fin');
            $table->foreignId('iddispositivo')->constrained('device');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicion_continuas');
    }
};
