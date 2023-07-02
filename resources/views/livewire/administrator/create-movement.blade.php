<div>
    {{-- Success is as dangerous as failure. --}}
    <x-button wire:click="$set('open', true)"
        class='inline-flex items-center px-4 py-2 bg-blue-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150'>
        Crear Movimiento</x-button>
    <x-button
        class='inline-flex items-center px-4 py-2 bg-blue-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150'>
        Crear Location</x-button>
    <x-button
        class='inline-flex items-center px-4 py-2 bg-blue-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150'>
        Crear producto</x-button>
    <x-button
        class='inline-flex items-center px-4 py-2 bg-blue-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150'>
        Crear empleado</x-button>

    <x-dialog-modal wire:model='open'>
        <x-slot name="title">
            Crear un nuevo movimiento
        </x-slot>
        <x-slot name="content">
            <div class="container mx-auto mt-5 text-center">
                <div class="grid grid-cols-1 sm:grid-cols-4 gap-4 my-2 bg-white shadow-md rounded">
                    <div class="bg-blue-100 col-span-1 sm:col-span-4 text-center">
                        <div class="flex items-center justify-between sm:mx-10">
                            <label class="font-bold py-2 px-4 text-2xl">
                                FORMULARIO DE ENTRADA DE MOVIMIENTOS.
                            </label>
                            <label class="font-bold py-2 px-4 text-2xl inline-block align-baseline">
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="date_mov_insert" name="date_mov_insert" type="date"
                                    wire:model="date_mov_insert">
                                <x-input-error for="date_mov_insert" />
                            </label>
                        </div>
                    </div>
                    <div class="bg-blue-100">
                        <label for="type_mov_insert"
                            class="block uppercase tracking-wide text-gray-900 text-sm font-bold mb-2">Tipo de
                            Movimieto</label>
                        <select id="type_mov_insert" wire:model="type_mov_insert"
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                            <option value="" selected>- Seleccione el tipo de movimiento</option>
                            @if (!is_null($type_movements))
                                @foreach ($type_movements::cases() as $type_movement)
                                    <option value="{{ $type_movement->value }}">
                                        {{ $type_movement->name }}
                                    </option>
                                @endforeach
                            @endif
                        </select>
                        <x-input-error for="type_mov_insert" />
                    </div>
                    <div class="bg-blue-100">
                        <label for="location_insert"
                            class="block uppercase tracking-wide text-gray-900 text-sm font-bold mb-2">Ubicacion</label>
                        <select id="location_insert" name="location_insert" wire:model="location_insert"
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                            <option value="" selected>- Seleccione la ubicacion</option>
                            @if (!empty($locations) && $locations->count() > 0)
                                @foreach ($locations as $location)
                                    @if (is_object($location))
                                        <option value="{{ $location->id }}">
                                            {{ $location->name }}
                                        </option>
                                    @endif
                                @endforeach
                            @endif
                        </select>
                        <x-input-error for="location_insert" />
                    </div>
                    <div class="bg-blue-100">
                        <label for="product_insert"
                            class="block uppercase tracking-wide text-gray-900 text-sm font-bold mb-2">Producto</label>
                        <select id="product_insert" name="product_insert" wire:model="product_insert"
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                            <option value="" selected>- Seleccione el producto</option>
                            @if (!empty($products) && $products->count() > 0)
                                @foreach ($products as $product)
                                    @if (is_object($product))
                                        <option value="{{ $product->id }}">
                                            {{ $product->name }}
                                        </option>
                                    @endif
                                @endforeach
                            @endif
                        </select>
                        <x-input-error for="product_insert" />
                    </div>
                    <div class="bg-blue-100">
                        <label for="employee_insert"
                            class="block uppercase tracking-wide text-gray-900 text-sm font-bold mb-2">Empleado</label>
                        <select id="employee_insert" name="employee_insert" wire:model="employee_insert"
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                            <option value="" selected>- Seleccione el empleado</option>
                            @if (!empty($employees) && $employees->count() > 0)
                                @foreach ($employees as $employee)
                                    @if (is_object($employee))
                                        <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                    @endif
                                @endforeach
                            @endif
                        </select>
                        <x-input-error for="employee_insert" />
                    </div>
                    <div class="bg-blue-100">
                        <label class="block uppercase tracking-wide text-gray-900 text-sm font-bold mb-2"
                            for="stock_location_insert" value="">
                            Inicio
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="stock_location_insert" type="text" placeholder="0"
                            wire:model="stock_location_insert" disabled>
                        <x-input-error for="stock_location_insert" />
                    </div>
                    <div class="bg-blue-100">
                        <label class="block uppercase tracking-wide text-gray-900 text-sm font-bold mb-2"
                            for="stock_Warehouse_insert" value="">
                            Disponibilidad
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="stock_Warehouse_insert" type="text" placeholder="Almacen:{{ $stock_Warehouse }}" {{ $sales_insert_dispo }}
                            wire:model="stock_Warehouse_insert">
                        <x-input-error for="stock_Warehouse_insert" />
                    </div>
                    <div class="bg-blue-100">
                        <label class="block uppercase tracking-wide text-gray-900 text-sm font-bold mb-2"
                            for="quantity_mov_insert" value="">
                            Venta
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="quantity_mov_insert" type="text" placeholder="Ejemplo:1000"
                            wire:model="quantity_mov_insert">
                        <x-input-error for="quantity_mov_insert" />
                    </div>
                    <div class="bg-blue-100">
                        <label class="block uppercase tracking-wide text-gray-900 text-sm font-bold mb-2"
                            for="sales_insert">
                            Precio de Venta (Costo: {{ $price_insert }} )
                        </label>
                        <input id="sales_insert" type="text" placeholder="Ejemplo:300.00" wire:model="sales_insert"
                            {{ $sales_insert_dispo }}
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                        <x-input-error for="sales_insert" />
                    </div>
                    <div class="bg-blue-100 col-span-1 sm:col-span-4">
                        <label for="description_insert"
                            class="block uppercase tracking-wide text-gray-900 text-sm font-bold mb-2">Descripcion</label>
                        <input id="description_insert" type="text"
                            placeholder="Escribe una Breve descripcion del producto" wire:model="description_insert"
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                        <x-input-error for="description_insert" />
                    </div>
                    <div class="bg-gray-50 col-span-1 sm:col-span-4 text-center">
                        <button id="btn_add" wire:click="save"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold mb-2 mt-2 py-2 px-4 rounded">
                            Agregar Movimiento
                        </button>
                        <button id="btn_add" wire:click="$set('open', false)"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold mb-2 mt-2 py-2 px-4 rounded">
                            Cancelar
                        </button>                                             
                    </div>
                    <input id="stock_location_insert" type="hidden" wire:model="stock_location_insert">
                    <input id="sales_insert" type="hidden" wire:model="sales_insert">
                </div>
            </div>
            <div>
                @if (session()->has('message'))
                    <div class="bg-green-500 text-white p-4 rounded mb-4 transition-all">
                        {{ session('message') }}
                    </div>
                @endif                
                {{ $logtmp }}
            </div>
        </x-slot>
        <x-slot name="footer">
            creado por MIRO
        </x-slot>
    </x-dialog-modal>
    <div>
