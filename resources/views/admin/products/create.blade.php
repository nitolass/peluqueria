<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Crear Producto
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">

                @if ($errors->any())
                    <div class="mb-4 text-red-600">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>- {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('products.store') }}" method="POST">
                    @csrf

                    {{-- Nombre --}}
                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700" for="name">
                            Nombre del producto
                        </label>
                        <input
                            type="text"
                            name="name"
                            id="name"
                            value="{{ old('name') }}"
                            required
                            class="border-gray-300 rounded-md shadow-sm w-full"
                        >
                    </div>

                    {{-- Precio --}}
                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700" for="price">
                            Precio (€)
                        </label>
                        <input
                            type="number"
                            step="0.01"
                            name="price"
                            id="price"
                            value="{{ old('price') }}"
                            required
                            class="border-gray-300 rounded-md shadow-sm w-full"
                        >
                    </div>


                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700" for="stock">
                            Stock
                        </label>
                        <input
                            type="number"
                            name="stock"
                            id="stock"
                            value="{{ old('stock') }}"
                            required
                            class="border-gray-300 rounded-md shadow-sm w-full"
                        >
                    </div>

                    <div class="mt-6">
                        <button
                            type="submit"
                            class="inline-flex items-center px-4 py-2
                                   rounded-md font-semibold text-xs text-black uppercase tracking-widest
                          "
                        >
                            Guardar producto
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>
