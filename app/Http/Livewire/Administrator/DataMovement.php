<?php

namespace App\Http\Livewire\Administrator;

use App\Models\Movement as ModelsMovement;
use Livewire\Component;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class DataMovement extends DataTableComponent
{
    protected $model = ModelsMovement::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setEmptyMessage('No results found');//Text de salida si valor vacio
        $this->setSingleSortingDisabled();
        $this->setQueryStringDisabled();
        $this->setColumnSelectStatus(false);
    }

    public function columns(): array
    {
        return [
            Column::make('ID', 'id')
                ->sortable(),
            Column::make('Fecha', 'date_mov')
                ->sortable(),
                Column::make('Type', 'type_mov')
                ->sortable(),
                Column::make('Producto', 'product.name')
                ->sortable(),
                Column::make('Ubicacion', 'location.name')
                ->sortable(),                
                Column::make('Empleado', 'employee.name')
                ->sortable(),
                Column::make('Cantidad movido', 'quantity_mov')
                ->sortable(),
                /*Column::make('Operador', 'user.name')
                ->sortable(),*/
                Column::make('Existencia', 'stock_location')
                ->sortable(),                
                Column::make('Precio de Compra/U', 'price')
                ->sortable(),
                Column::make('Precio de compra/Total', 'price_total_mov')
                ->sortable(),
                Column::make('Precio de Venta/U', 'sales')
                ->sortable(),
                Column::make('Precio de Venta/Total', 'sales_total_mov')
                ->sortable(),   
                Column::make('Ingreso/Total', 'profits_total_mov')
                ->sortable(),
                Column::make('Descripcion', 'description')
                ->sortable(),
        ];
    }
}