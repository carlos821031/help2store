<x-personalized.app>
    <x-slot name=title>
        {{ __('Movements') }}
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Movements') }}
        </h2>
    </x-slot>
    <administration.store.insert-location />
    @livewire('create-movement')
    
    <!-- Comienza la Tabla -->
    <!--
            Comenzando por las grip
            gap separacion entre celdas
            my separacion entre la grip
            mx-auto centra
            mt-5 margen superior
        -->
    <div class="text-4xl text-center mt-10 py-5 uppercase">Reporte de las últimas operaciones</div>
    <table class="min-w-full divide-y divide-gray-200">
        <thead>
            <tr>
                <th class="px-2 py-1 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Precio</th>
                <th class="px-2 py-1 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Producto</th>
                <th class="px-2 py-1 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Inicio</th>
                <th class="px-2 py-1 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Disponibilidad</th>
                <th class="px-2 py-1 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Venta</th>
                <th class="px-2 py-1 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Importe</th>
                <th class="px-2 py-1 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Final</th>
                <th class="px-2 py-1 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Fecha</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            <tr>
                <td class="px-2 py-1 whitespace-nowrap">100.00</td>
                <td class="px-2 py-1 whitespace-nowrap">Galleta de vainilla rellenas con fresa</td>
                <td class="px-2 py-1 whitespace-nowrap">1000</td>
                <td class="px-2 py-1 whitespace-nowrap">9000</td>
                <td class="px-2 py-1 whitespace-nowrap">2</td>
                <td class="px-2 py-1 whitespace-nowrap">200.00</td>
                <td class="px-2 py-1 whitespace-nowrap">99</td>
                <td class="px-2 py-1 whitespace-nowrap">12/12/2024</td>
            </tr>
            <tr>
                <td class="px-2 py-1 whitespace-nowrap">100.00</td>
                <td class="px-2 py-1 whitespace-nowrap">Galleta de vainilla rellenas con fresa</td>
                <td class="px-2 py-1 whitespace-nowrap">1000</td>
                <td class="px-2 py-1 whitespace-nowrap">9000</td>
                <td class="px-2 py-1 whitespace-nowrap">2</td>
                <td class="px-2 py-1 whitespace-nowrap">200.00</td>
                <td class="px-2 py-1 whitespace-nowrap">99</td>
                <td class="px-2 py-1 whitespace-nowrap">12/12/2024</td>
            </tr>
            <tr>
                <td class="px-2 py-1 whitespace-nowrap">100.00</td>
                <td class="px-2 py-1 whitespace-nowrap">Galleta de vainilla rellenas con fresa</td>
                <td class="px-2 py-1 whitespace-nowrap">1000</td>
                <td class="px-2 py-1 whitespace-nowrap">9000</td>
                <td class="px-2 py-1 whitespace-nowrap">2</td>
                <td class="px-2 py-1 whitespace-nowrap">200.00</td>
                <td class="px-2 py-1 whitespace-nowrap">99</td>
                <td class="px-2 py-1 whitespace-nowrap">12/12/2024</td>
            </tr>
            <tr>
                <td class="px-2 py-1 whitespace-nowrap">100.00</td>
                <td class="px-2 py-1 whitespace-nowrap">Galleta de vainilla rellenas con fresa</td>
                <td class="px-2 py-1 whitespace-nowrap">1000</td>
                <td class="px-2 py-1 whitespace-nowrap">9000</td>
                <td class="px-2 py-1 whitespace-nowrap">2</td>
                <td class="px-2 py-1 whitespace-nowrap">200.00</td>
                <td class="px-2 py-1 whitespace-nowrap">99</td>
                <td class="px-2 py-1 whitespace-nowrap">12/12/2024</td>
            </tr>
            <tr>
                <td class="px-2 py-1 whitespace-nowrap">100.00</td>
                <td class="px-2 py-1 whitespace-nowrap">Galleta de vainilla rellenas con fresa</td>
                <td class="px-2 py-1 whitespace-nowrap">1000</td>
                <td class="px-2 py-1 whitespace-nowrap">9000</td>
                <td class="px-2 py-1 whitespace-nowrap">2</td>
                <td class="px-2 py-1 whitespace-nowrap">200.00</td>
                <td class="px-2 py-1 whitespace-nowrap">99</td>
                <td class="px-2 py-1 whitespace-nowrap">12/12/2024</td>
            </tr>
            <tr>
                <td class="px-2 py-1 whitespace-nowrap">100.00</td>
                <td class="px-2 py-1 whitespace-nowrap">Galleta de vainilla rellenas con fresa</td>
                <td class="px-2 py-1 whitespace-nowrap">1000</td>
                <td class="px-2 py-1 whitespace-nowrap">9000</td>
                <td class="px-2 py-1 whitespace-nowrap">2</td>
                <td class="px-2 py-1 whitespace-nowrap">200.00</td>
                <td class="px-2 py-1 whitespace-nowrap">99</td>
                <td class="px-2 py-1 whitespace-nowrap">12/12/2024</td>
            </tr>
            <tr>
                <td class="px-2 py-1 whitespace-nowrap">100.00</td>
                <td class="px-2 py-1 whitespace-nowrap">Galleta de vainilla rellenas con fresa</td>
                <td class="px-2 py-1 whitespace-nowrap">1000</td>
                <td class="px-2 py-1 whitespace-nowrap">9000</td>
                <td class="px-2 py-1 whitespace-nowrap">2</td>
                <td class="px-2 py-1 whitespace-nowrap">200.00</td>
                <td class="px-2 py-1 whitespace-nowrap">99</td>
                <td class="px-2 py-1 whitespace-nowrap">12/12/2024</td>
            </tr>
            <tr>
                <td class="px-2 py-1 whitespace-nowrap">100.00</td>
                <td class="px-2 py-1 whitespace-nowrap">Galleta de vainilla rellenas con fresa</td>
                <td class="px-2 py-1 whitespace-nowrap">1000</td>
                <td class="px-2 py-1 whitespace-nowrap">9000</td>
                <td class="px-2 py-1 whitespace-nowrap">2</td>
                <td class="px-2 py-1 whitespace-nowrap">200.00</td>
                <td class="px-2 py-1 whitespace-nowrap">99</td>
                <td class="px-2 py-1 whitespace-nowrap">12/12/2024</td>
            </tr>
            <tr>
                <td class="px-2 py-1 whitespace-nowrap">100.00</td>
                <td class="px-2 py-1 whitespace-nowrap">Galleta de vainilla rellenas con fresa</td>
                <td class="px-2 py-1 whitespace-nowrap">1000</td>
                <td class="px-2 py-1 whitespace-nowrap">9000</td>
                <td class="px-2 py-1 whitespace-nowrap">2</td>
                <td class="px-2 py-1 whitespace-nowrap">200.00</td>
                <td class="px-2 py-1 whitespace-nowrap">99</td>
                <td class="px-2 py-1 whitespace-nowrap">12/12/2024</td>
            </tr>
            <tr>
                <td class="px-2 py-1 whitespace-nowrap">100.00</td>
                <td class="px-2 py-1 whitespace-nowrap">Galleta de vainilla rellenas con fresa</td>
                <td class="px-2 py-1 whitespace-nowrap">1000</td>
                <td class="px-2 py-1 whitespace-nowrap">9000</td>
                <td class="px-2 py-1 whitespace-nowrap">2</td>
                <td class="px-2 py-1 whitespace-nowrap">200.00</td>
                <td class="px-2 py-1 whitespace-nowrap">99</td>
                <td class="px-2 py-1 whitespace-nowrap">12/12/2024</td>
            </tr>
            <tr>
                <td class="px-2 py-1 whitespace-nowrap">100.00</td>
                <td class="px-2 py-1 whitespace-nowrap">Galleta de vainilla rellenas con fresa</td>
                <td class="px-2 py-1 whitespace-nowrap">1000</td>
                <td class="px-2 py-1 whitespace-nowrap">9000</td>
                <td class="px-2 py-1 whitespace-nowrap">2</td>
                <td class="px-2 py-1 whitespace-nowrap">200.00</td>
                <td class="px-2 py-1 whitespace-nowrap">99</td>
                <td class="px-2 py-1 whitespace-nowrap">12/12/2024</td>
            </tr>
            <tr>
                <td class="px-2 py-1 whitespace-nowrap">100.00</td>
                <td class="px-2 py-1 whitespace-nowrap">Galleta de vainilla rellenas con fresa</td>
                <td class="px-2 py-1 whitespace-nowrap">1000</td>
                <td class="px-2 py-1 whitespace-nowrap">9000</td>
                <td class="px-2 py-1 whitespace-nowrap">2</td>
                <td class="px-2 py-1 whitespace-nowrap">200.00</td>
                <td class="px-2 py-1 whitespace-nowrap">99</td>
                <td class="px-2 py-1 whitespace-nowrap">12/12/2024</td>
            </tr>
            <tr>
                <td class="px-2 py-1 whitespace-nowrap">100.00</td>
                <td class="px-2 py-1 whitespace-nowrap">Galleta de vainilla rellenas con fresa</td>
                <td class="px-2 py-1 whitespace-nowrap">1000</td>
                <td class="px-2 py-1 whitespace-nowrap">9000</td>
                <td class="px-2 py-1 whitespace-nowrap">2</td>
                <td class="px-2 py-1 whitespace-nowrap">200.00</td>
                <td class="px-2 py-1 whitespace-nowrap">99</td>
                <td class="px-2 py-1 whitespace-nowrap">12/12/2024</td>
            </tr>
            <tr>
                <td class="px-2 py-1 whitespace-nowrap">100.00</td>
                <td class="px-2 py-1 whitespace-nowrap">Galleta de vainilla rellenas con fresa</td>
                <td class="px-2 py-1 whitespace-nowrap">1000</td>
                <td class="px-2 py-1 whitespace-nowrap">9000</td>
                <td class="px-2 py-1 whitespace-nowrap">2</td>
                <td class="px-2 py-1 whitespace-nowrap">200.00</td>
                <td class="px-2 py-1 whitespace-nowrap">99</td>
                <td class="px-2 py-1 whitespace-nowrap">12/12/2024</td>
            </tr>
            <tr>
                <td class="px-2 py-1 whitespace-nowrap">100.00</td>
                <td class="px-2 py-1 whitespace-nowrap">Galleta de vainilla rellenas con fresa</td>
                <td class="px-2 py-1 whitespace-nowrap">1000</td>
                <td class="px-2 py-1 whitespace-nowrap">9000</td>
                <td class="px-2 py-1 whitespace-nowrap">2</td>
                <td class="px-2 py-1 whitespace-nowrap">200.00</td>
                <td class="px-2 py-1 whitespace-nowrap">99</td>
                <td class="px-2 py-1 whitespace-nowrap">12/12/2024</td>
            </tr>
            <tr>
                <td class="px-2 py-1 whitespace-nowrap">100.00</td>
                <td class="px-2 py-1 whitespace-nowrap">Galleta de vainilla rellenas con fresa</td>
                <td class="px-2 py-1 whitespace-nowrap">1000</td>
                <td class="px-2 py-1 whitespace-nowrap">9000</td>
                <td class="px-2 py-1 whitespace-nowrap">2</td>
                <td class="px-2 py-1 whitespace-nowrap">200.00</td>
                <td class="px-2 py-1 whitespace-nowrap">99</td>
                <td class="px-2 py-1 whitespace-nowrap">12/12/2024</td>
            </tr>
            <tr>
                <td class="px-2 py-1 whitespace-nowrap">100.00</td>
                <td class="px-2 py-1 whitespace-nowrap">Galleta de vainilla rellenas con fresa</td>
                <td class="px-2 py-1 whitespace-nowrap">1000</td>
                <td class="px-2 py-1 whitespace-nowrap">9000</td>
                <td class="px-2 py-1 whitespace-nowrap">2</td>
                <td class="px-2 py-1 whitespace-nowrap">200.00</td>
                <td class="px-2 py-1 whitespace-nowrap">99</td>
                <td class="px-2 py-1 whitespace-nowrap">12/12/2024</td>
            </tr>
            <tr>
                <td class="px-2 py-1 whitespace-nowrap">100.00</td>
                <td class="px-2 py-1 whitespace-nowrap">Galleta de vainilla rellenas con fresa</td>
                <td class="px-2 py-1 whitespace-nowrap">1000</td>
                <td class="px-2 py-1 whitespace-nowrap">9000</td>
                <td class="px-2 py-1 whitespace-nowrap">2</td>
                <td class="px-2 py-1 whitespace-nowrap">200.00</td>
                <td class="px-2 py-1 whitespace-nowrap">99</td>
                <td class="px-2 py-1 whitespace-nowrap">12/12/2024</td>
            </tr>
            <tr>
                <td class="px-2 py-1 whitespace-nowrap">100.00</td>
                <td class="px-2 py-1 whitespace-nowrap">Galleta de vainilla rellenas con fresa</td>
                <td class="px-2 py-1 whitespace-nowrap">1000</td>
                <td class="px-2 py-1 whitespace-nowrap">9000</td>
                <td class="px-2 py-1 whitespace-nowrap">2</td>
                <td class="px-2 py-1 whitespace-nowrap">200.00</td>
                <td class="px-2 py-1 whitespace-nowrap">99</td>
                <td class="px-2 py-1 whitespace-nowrap">12/12/2024</td>
            </tr>
            <tr>
                <td class="px-2 py-1 whitespace-nowrap">100.00</td>
                <td class="px-2 py-1 whitespace-nowrap">Galleta de vainilla rellenas con fresa</td>
                <td class="px-2 py-1 whitespace-nowrap">1000</td>
                <td class="px-2 py-1 whitespace-nowrap">9000</td>
                <td class="px-2 py-1 whitespace-nowrap">2</td>
                <td class="px-2 py-1 whitespace-nowrap">200.00</td>
                <td class="px-2 py-1 whitespace-nowrap">99</td>
                <td class="px-2 py-1 whitespace-nowrap">12/12/2024</td>
            </tr>
            <tr>
                <td class="px-2 py-1 whitespace-nowrap">100.00</td>
                <td class="px-2 py-1 whitespace-nowrap">Galleta de vainilla rellenas con fresa</td>
                <td class="px-2 py-1 whitespace-nowrap">1000</td>
                <td class="px-2 py-1 whitespace-nowrap">9000</td>
                <td class="px-2 py-1 whitespace-nowrap">2</td>
                <td class="px-2 py-1 whitespace-nowrap">200.00</td>
                <td class="px-2 py-1 whitespace-nowrap">99</td>
                <td class="px-2 py-1 whitespace-nowrap">12/12/2024</td>
            </tr>
        </tbody>
    </table>
</x-personalized.app>

<!-- Footer -->
<footer class="footer-1 bg-gray-100 py-8 sm:py-12 text-center">
    <div class="container mx-auto">
        <p>©MIRO
            <script>
                document.write(new Date().getFullYear())
            </script>. Todos los derechos reservados.
        </p>
    </div>
</footer>
<script>
    const product_id = document.getElementById("product_id");
    const btn_add = document.getElementById("btn_add");

    btn_add.addEventListener("keydown", (event) => {
        if (event.key === "Tab") {
            event.preventDefault();
            product_id.focus();
        }
    });
</script>
