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
            $table->foreignId('location_id')
                ->constrained()
                ->comment('Foranea a Location');
            $table->foreignId('employee_id')
                ->constrained()
                ->comment('Foranea a employees, Quien recibe o entrega segun el tipo de mov');
            $table->integer('quantity_mov')->comment('Cantidad movida');
            $table->foreignId('user_id')
                ->constrained()
                ->comment('Foranea a user. Operador que registro el movimiento');
            //$table->integer('stock_total')->comment('Existencia total del producto.');
            $table->integer('stock_location')->comment('Existencia del producto en la ubicacion.');            
            $table->decimal('price', 8, 2)->default(0)->comment('Precio de compra unitario');
            $table->decimal('price_total_mov', 8, 2)->default(0)->comment('Precio de compra total del mov');
            $table->decimal('sales', 8, 2)->default(0)->comment('Precio de venta unitario, Se debe dar la posibilidad de ponerlo manual tambien');
            $table->decimal('sales_total_mov', 8, 2)->default(0)->comment('Precio de venta total del mov, Se debe dar la posibilidad de ponerlo manual tambien');
            $table->decimal('profits_total_mov', 8, 2)->default(0)->comment('Ganancia del movimiento');
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
