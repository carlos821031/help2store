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
        Schema::create('location_product', function (Blueprint $table) {
            $table->id();
            $table->foreignId('location_id')
                ->constrained()
                ->comment('Foranea a Location');
            $table->foreignId('product_id')
                ->constrained()
                ->comment('Foranea a Product');                       
            $table->integer('quantity')->comment('Existencia del producto en la ubicacion.');                     
            $table->string('description')->nullable()->comment('Decripcion de la operacion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('location_product');
    }
};
