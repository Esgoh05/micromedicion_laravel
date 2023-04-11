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
            $table->foreignId('idUsuario')->constrained('users');
            $table->string('idDispositivo');
            $table->string('diametroTuberia');
            $table->string('ssid');
            $table->string('passwordSsid');
            $table->string('ubicacionDispositivo');
            $table->timestamps();

            //$table->foreign('idUsuario')->references('id')->users();
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
