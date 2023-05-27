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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Nombre del producto');
            $table->string('description')->nullable()->comment('Informacion del producto');
            $table->string('code')->nullable()->comment('codigo del producto');
            $table->integer('stock')->comment('Existencia del producto.');
            $table->string('image')->nullable()->comment('url a la image');
            $table->integer('quantity_min')->comment('Cantidad minima aconsejable para');
            $table->integer('quantity_max')->comment('Cantidad máxima del producto a tener en almacén.');
            $table->decimal('sales', 8, 2)->comment('Precio de compra');
            $table->decimal('price', 8, 2)->comment('Precio de venta');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
