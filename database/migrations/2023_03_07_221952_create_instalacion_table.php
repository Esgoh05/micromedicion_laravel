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
        Schema::create('instalacion', function (Blueprint $table) {
            $table->id();
            $table->string('idUsuario');
            $table->string('idDispositivo');
            $table->string('diametroTuberia');
            $table->string('ssid');
            $table->string('passwordSsid');
            $table->string('ubicacionDispositivo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instalacion');
    }
};
