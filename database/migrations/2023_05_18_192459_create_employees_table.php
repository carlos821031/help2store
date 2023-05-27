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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Nombre del empleado');
            $table->string('email')->unique()->nullable()->comment('email');
            $table->string('phone')->nullable()->comment('Telefono');            
            $table->decimal('salary', 8, 2)->nullable()->comment('salario');
            $table->boolean('active')->comment('activo'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
