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
            $table->timestamps('inicio');
            $table->double('caudalPromedio');
            $table->time('time');
            $table->double('volumen');
            $table->timestamps('fin');
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
