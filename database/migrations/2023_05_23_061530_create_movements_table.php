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
        Schema::create('movements', function (Blueprint $table) {
            $table->id();
            $table->date('date_mov')
                ->comment('Fecha de la operacion.')
                ->index()->format('d/m/Y');
            $table->string('type_mov')->comment('Tipo de movimientos entrada, salida, interno, devolucion');
            $table->foreignId('product_id')
                ->constrained()
                ->comment('Foranea a Product');            
            $table->foreignId('origen')
                ->constrained(
                    table: 'locations',
                    indexName: 'origen'
                )
                ->comment('Foranea a Location, Origen de la operacion');
            $table->foreignId('destiny')
                ->constrained(
                    table: 'locations',
                    indexName: 'destiny'
                )
                ->comment('Foranea a Location, Destino de la operacion');
            $table->foreignId('deliver')
                ->constrained(
                    table: 'employees',
                    indexName: 'deliver'
                )
                ->comment('Foranea a employees, Quien entrega');
            $table->foreignId('receiver')
                ->constrained(
                    table: 'employees',
                    indexName: 'receiver'
                )
                ->comment('Foranea a employees, Quien recibe');            
            $table->integer('quantity_mov')->comment('Cantidad movida');
            $table->foreignId('user_id')
                ->constrained()
                ->comment('Foranea a user. Operador que registro el movimiento');
            $table->integer('quantity_initial_total')->comment('Cantidad total del producto antes de realizar esta operacion');
            $table->integer('quantity_initial_origin')->comment('Cantidad inicial del producto antes de realizar esta operacion en el origen');
            $table->integer('quantity_initial_destiny')->comment('Cantidad inicial del producto antes de realizar esta operacion en el destino');            
            $table->decimal('price', 8, 2)->default(0)->comment('Precio de compra');
            $table->integer('stock_total')->comment('Existencia total del producto.');
            $table->integer('stock_origin')->comment('Existencia del producto en la ubicacion origen despues de realizar la operacion.');
            $table->integer('stock_destiny')->comment('Existencia del producto en la ubicacion destino despues de realizar esta operacion.');
            $table->decimal('sales', 8, 2)->default(0)->comment('Precio de venta, Se debe dar la posibilidad de ponerlo manual tambien');
            $table->string('description')->nullable()->comment('Decripcion de la operacion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movements');
    }
};
