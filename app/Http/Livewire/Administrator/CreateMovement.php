<?php

namespace App\Http\Livewire\Administrator;

use App\Enums\TypeMovementEnum;
use App\Models\Employee;
use App\Models\Location;
use App\Models\Product;
use App\Models\Movement;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Enum;
use Livewire\Component;

class CreateMovement extends Component
{
    public $open = false;//Control del modal
    /**Todo lo que termina en _insert es un elemento del formulario */
    public $date_mov_insert;//Referente al campo fecha
    public $type_mov_insert;//Referente al campo typo de movimiento seleccionado
    public $type_movements;//Utilizado en esta clase como tmp de typo de mov
    public $product_insert;//Referente al producto seleccionado en el formulario
    public $products;//Utilizado en es esta clase como tmp de productos
    public $location_insert;//Referente al location seleccionado en el formulario
    public $locations;//Utilizado en es esta clase como tmp de location
    public $employee_insert;//Referente al empleado seleccionado en el formulario
    public $employees;//Utilizado en es esta clase como tmp de empleado
    public $stock_location_insert;//Referente a la existencia en la location seleccionado en el formulario
    public $stock_Warehouse_insert;//Referente a la cantidad del producto movido del almacen al location seleccionado en el formulario
    public $stock_Warehouse;//Referente a la existencia del producto en el almacen    
    public $price_insert;//Referente al costo seleccionado en el formulario
    public $sales_insert;//Referente a la venta seleccionado en el formulario
    public $sales_insert_dispo; //Abilita o no, el campo de testo del presio de venta
    public $quantity_mov_insert;//Referente a la cantidad movida seleccionado en el formulario
    public $description_insert;//Referente a la descripcion seleccionado en el formulario
    public $logtmp;// Variable tmp para mis controles


    public function render()
    {
        return view('livewire.administrator.create-movement');
    }

    public function mount()
    {

        $this->date_mov_insert = date('Y-m-d');//Inicio con la fecha actual
        $this->type_movements = TypeMovementEnum::class;//Clase enum q me da los tipos de mov validos
        $this->employees = Employee::orderBy('name')->get();//Comienzo mostrando todos los empleados
        //$this->date_mov_insert = '2023-06-09';
        if ($this->type_mov_insert <> '') {
            //$this->products = Product::orderBy('name')->get();
            //$this->locations = Location::orderBy('name')->get();
            $this->sales_insert_dispo = "";
            $this->stock_location_insert = '0';
            $this->stock_Warehouse_insert = '';
        }
        $this->logtmp = 'Vacio';
    }

    protected function rules()
    {
        $rules = [
            'date_mov_insert' => 'required',
            'type_mov_insert' => ['required', new Enum(TypeMovementEnum::class)],
            'product_insert' => 'required',
            'location_insert' => 'required',
            'employee_insert' => 'required',
            'price_insert' => 'required|numeric',
            'sales_insert' => 'required|numeric',
            'quantity_mov_insert' => 'required|numeric|gt:0',
            'stock_location_insert' => 'required',
        ];
        /**Edito la regla para la cantidad de salida. Si es salida debe ser mayor q la existencia */
        if (($this->quantity_mov_insert <> 0) and ($this->quantity_mov_insert <> "") and ($this->type_mov_insert <> '') and (TypeMovementEnum::from($this->type_mov_insert)->isValueDesc())) {
            $rules['quantity_mov_insert'] =
                [
                    'required',
                    'lte:' . $this->stock_location_insert,
                ];
        }

        return $rules;
    }

    /**
     * 
     */
    public function updateddatemovinsert()
    {
        //Quitar
        $this->logtmp();
    }

    /**
     * Operaciones si se modifica el valor del select de type_mov_insert
     */
    public function updatedtypemovinsert()
    {
        $this->reset_variables('type_mov_insert');
        $this->employees = Employee::orderBy('name')->get();
        /**Reglas si es una salida */
        if (($this->type_mov_insert <> '') and (TypeMovementEnum::from($this->type_mov_insert)->isSalida())) {
            /**variable para abilitar el campo de precio de venta en caso que sea una entrada**/
            $this->sales_insert_dispo = '';
            $this->locations = Location::where('shop', 1)
                ->whereHas('products', function ($query) {
                    $query->where('quantity', '>', 0);
                })
                ->get();
            $this->stock_location_insert = '0';
            $this->products = '';
        } elseif (($this->type_mov_insert <> '') and (TypeMovementEnum::from($this->type_mov_insert)->isEntrada())) {
            /**Si no es una salida muestro todos los productos*/
            $this->products = Product::all();
            /**reinicio los valores de los demas campos del formulario.
             * Si es Entrada solo se puede seleccionar el Almacen
             *  Se pone estatico a solicitud del cliente 
             * Se podria quitar el tipo de mov. Ha existido variacienes en el proyecto despues de definirse.
             * */
            $this->locations = Location::where('name', 'Almacen')->get();
            //$this->locations = Location::orderBy('name')->get();
            $this->stock_location_insert = '0';
            /**variable para desabilitar el campo de recio de venta en caso que sea una entrada */
            $this->sales_insert_dispo = 'disabled';
        } else {
            $this->products = '';
            $this->locations = '';
            $this->sales_insert_dispo = "";
            $this->stock_location_insert = '0';
        }
        /**
         * Quitar
         */
        $this->logtmp();
    }

    /**
     * Operaciones si se modifica el valor del select de product
     */
    public function updatedlocationinsert()
    {
        /**Reset todas las variables necesarias */
        $this->reset_variables('location_insert');
        /**Si tenemos seleccionado alguna location */
        if (!empty($this->location_insert)) {
            /**Reglas si es una salida */
            if (($this->type_mov_insert <> '') and (TypeMovementEnum::from($this->type_mov_insert)->isSalida())) {
                /** Almaceno los producto cuya cantidad en la location seleccionada sea mayor que 0*/
                $this->products = Product::whereHas('locations', function ($query) {
                    $query->where('locations.id', $this->location_insert)
                        ->where('shop', 1)
                        ->where('quantity', '>', 0);
                })->get();
            } else {
                $this->products = Product::all();
            }
        }
        $this->logtmp();
    }

    /**
     * Operaciones si se modifica el valor del select de product
     */
    public function updatedproductinsert()
    {
        /**Reset todas las variables necesarias */
        $this->reset_variables('product_insert');

        /**Si tenemos seleccionado algun producto */
        if (!empty($this->product_insert)) {

            /**Precio de venta del producto seleccionado */
            $this->sales_insert = Product::where('id', $this->product_insert)->latest()->first()->sales;

            /**Precio de compra del producto seleccionado */
            $this->price_insert = Product::where('id', $this->product_insert)->latest()->first()->price;

            /**Cantidad del producto en la ubicacion seleccionada */
            $product = Location::find($this->location_insert)
                ->products()
                ->where('products.id', $this->product_insert)
                ->first();
            if (!is_null($product) && !is_null($product->pivot)) {
                $this->stock_location_insert = $product->pivot->quantity;
            }
            /**Cantidad del producto en el almacen */
            //$this->stock_Warehouse_insert = '';
            $product = Location::find('2')
                ->products()
                ->where('products.id', $this->product_insert)
                ->first();
            if (!is_null($product) && !is_null($product->pivot)) {
                $this->stock_Warehouse = $product->pivot->quantity;
            }                
        }
        $this->logtmp();
    }

    /**
     * Calcular la cantidad actual de productos al reealizar el movimiento de entrada o salida.
     */
    /**
     * Actualiza o crea cantidad en la tabla pivote location_product entre product y location
     */
    public function edit_quantity($location_id, $product_id, $cantidad, $tipo_movimiento)
    {
        $location = Location::find($location_id);
        $product = Product::find($product_id);

        $cantidad_actual = $location->products()->where('product_id', $product->id)->value('quantity');

        if ($tipo_movimiento == 'entrada') {
            $nueva_cantidad = $cantidad_actual + $cantidad;
        } elseif ($tipo_movimiento == 'salida') {
            $nueva_cantidad = $cantidad_actual - $cantidad;

            if ($nueva_cantidad < 0) {
                $this->addError('quantity_mov_insert', 'No hay suficiente cantidad del producto en la ubicación.');
                $this->resetErrorBag();
                return;
            }
        } else {
            throw new Exception("Tipo de movimiento no válido.");
        }

        $location->products()->syncWithoutDetaching([
            $product->id => ['quantity' => $nueva_cantidad]
        ]);
    }

    /**
     * Reinicia las variables necesarias en el paso seleccionado
     */
    public function reset_variables($step)
    {
        switch ($step) {
            case 'type_mov_insert':
                //$date_mov_insert;
                //$type_mov_insert;
                //$type_movements;
                $this->product_insert = '';
                $this->location_insert = '';
                $this->locations = '';
                $this->stock_location_insert = 0;
                $this->stock_Warehouse_insert = '';
                $this->stock_Warehouse = '0';
                $this->price_insert = 0;
                $this->sales_insert = 0;
                $this->sales_insert_dispo = ''; //Abilita o no, el campo de testo del presio de venta          
                $this->quantity_mov_insert = '';
                $this->description_insert = '';
                //$employee_insert;
                //$employees;   
                break;
            case 'product_insert':
                //$date_mov_insert;
                //$type_mov_insert;
                //$type_movements;
                //$this->product_insert = '';
                //$this->location_insert = '';
                //$this->locations = '';
                $this->stock_Warehouse_insert = '';
                $this->stock_Warehouse = '0';
                $this->stock_location_insert = 0;
                $this->price_insert = 0;
                $this->sales_insert = 0;
                //$this->sales_insert_dispo = ''; //Abilita o no, el campo de testo del presio de venta          
                //$this->quantity_mov_insert = 0;
                //$this->description_insert = '';
                //$employee_insert;
                //$employees;   
                break;
            case 'location_insert':
                //$date_mov_insert;
                //$type_mov_insert;
                //$type_movements;
                $this->product_insert = '';
                $this->products = '';
                $this->stock_Warehouse_insert = '';
                $this->stock_Warehouse = '0';
                //$this->location_insert = '';
                //$this->locations = '';
                $this->stock_location_insert = 0;
                $this->price_insert = 0;
                $this->sales_insert = 0;
                //$this->sales_insert_dispo = ''; //Abilita o no, el campo de testo del presio de venta          
                //$this->quantity_mov_insert = 0;
                //$this->description_insert = '';
                //$employee_insert;
                //$employees;   
                break;
            default:
                # code...
                break;
        }
    }

    /**
     * Crear nuevo movement
     */
    public function save(Request $request)
    {
        //Quitar
        $this->logtmp();
        /**Validamos */
        $this->validate();
        /**Actualizo la existencia del producto y location en la tabla pivote */
        $this->edit_quantity($this->location_insert, $this->product_insert, abs($this->quantity_mov_insert), $this->type_mov_insert);
        /**Condiciones si es una entrada o salida */
        if (($this->type_mov_insert <> '') and (TypeMovementEnum::from($this->type_mov_insert)->isSalida())) {
            /**Si es una salida */

            if (abs($this->stock_location_insert) >= abs($this->quantity_mov_insert)) {
                movement::create([
                    'date_mov' => $this->date_mov_insert,
                    'type_mov' => $this->type_mov_insert,
                    'product_id' => $this->product_insert,
                    'location_id' => $this->location_insert,
                    'employee_id' => $this->employee_insert,
                    'quantity_mov' =>  abs($this->quantity_mov_insert),
                    'user_id' => Auth::id(),
                    'stock_location' =>  abs($this->stock_location_insert) - abs($this->quantity_mov_insert), //valor del stock               
                    'price' =>  abs($this->price_insert),
                    'price_total_mov' => $this->price_insert * $this->quantity_mov_insert,
                    'sales' =>  abs($this->sales_insert),
                    'sales_total_mov' => $this->sales_insert * $this->quantity_mov_insert,
                    'profits_total_mov' => $this->sales_insert * $this->quantity_mov_insert - $this->price_insert * $this->quantity_mov_insert,
                    'description' => $this->description_insert
                ]);                

                $this->reset(['description_insert', 'sales_insert', 'price_insert', 'type_mov_insert', 'product_insert', 'location_insert', 'employee_insert', 'quantity_mov_insert', 'stock_location_insert']);

                session()->flash('message', 'Los datos se han insertado correctamente.');
            } else {
                session()->flash('message', 'La cantidad a mover debe ser menor que la cantidad existente.');
            }
        } else {
            movement::create([
                'date_mov' => $this->date_mov_insert,
                'type_mov' => $this->type_mov_insert,
                'product_id' => $this->product_insert,
                'location_id' => $this->location_insert,
                'employee_id' => $this->employee_insert,
                'quantity_mov' =>  abs($this->quantity_mov_insert),
                'user_id' => Auth::id(),
                'stock_location' =>  abs($this->stock_location_insert) + abs($this->quantity_mov_insert), //valor del stock               
                'price' =>  abs($this->price_insert),
                'price_total_mov' => $this->price_insert * $this->quantity_mov_insert,
                'sales' =>  abs($this->sales_insert),
                'sales_total_mov' => $this->sales_insert * $this->quantity_mov_insert,
                'profits_total_mov' => $this->sales_insert * $this->quantity_mov_insert - $this->price_insert * $this->quantity_mov_insert,
                'description' => $this->description_insert
            ]);

            $this->reset(['description_insert', 'sales_insert', 'price_insert', 'type_mov_insert', 'product_insert', 'location_insert', 'employee_insert', 'quantity_mov_insert', 'stock_location_insert']);

            session()->flash('message', 'Los datos se han insertado correctamente.');
        }
    }

    /**
     * Se puede quitar esta funcion en cuanto se termine el proyecto
     */
    public function logtmp($sms = '')
    {
        $this->logtmp = ' date_mov:' . $this->date_mov_insert;
        $this->logtmp .= ' type_mov:' . $this->type_mov_insert;
        $this->logtmp .= ' product_id:' . $this->product_insert;
        $this->logtmp .= ' location_id:' . $this->location_insert;
        $this->logtmp .= ' employee_id:' . $this->employee_insert;
        $this->logtmp .= ' quantity_mov_insert:' . $this->quantity_mov_insert;
        $this->logtmp .= ' user_id:' . Auth::id();
        $this->logtmp .= ' stock_location_insert:' . $this->stock_location_insert;
        $this->logtmp .= ' price:' . $this->price_insert;
        //$this->logtmp .= ' price_total_mov:' . $this->price_insert * $this->quantity_mov_insert;
        $this->logtmp .= ' sales:' . $this->sales_insert;
        //$this->logtmp .= ' sales_total_mov:' . $this->sales_insert * $this->quantity_mov_insert;
        //$this->logtmp .= ' profits_total_mov:' . $this->sales_insert * $this->quantity_mov_insert - $this->price_insert * $this->quantity_mov_insert;
        $this->logtmp .= ' description:' . $this->description_insert;
        if ($sms)
            $this->logtmp .= ' sms:' . $sms;
    }
}
