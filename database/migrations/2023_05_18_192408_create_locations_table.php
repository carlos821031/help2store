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
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Nombre de la ubicacion');
            $table->string('address')->nullable()->comment('Direccion');
            $table->string('description')->nullable()->comment('Descripcion de la ubicacion');
            $table->string('code')->nullable()->comment('Codigo para la ubicacion');
            $table->float('latitude')->nullable()->comment('latitude');
            $table->float('longitude')->nullable()->comment('longitude');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locations');
    }
};
