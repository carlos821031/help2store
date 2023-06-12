<x-layouts.base>
    <x-slot name=title>
        {{ __('Movements') }}
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Movements') }}
        </h2>
    </x-slot>
    @livewire('administrator.create-movement')  
    <div class="text-4xl text-center mt-10 py-5 uppercase">Reporte de las últimas operaciones</div>        
    <div class="py-12">
        <div class="max-w-9xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @livewire('administrator.data-movement')   
            </div>
        </div>
    </div>
</x-layouts.base>
