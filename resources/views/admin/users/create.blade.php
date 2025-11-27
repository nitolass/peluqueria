<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Crear Nuevo Usuario
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded-lg p-6">

                <h2 class="text-lg font-semibold mb-4">Crear Usuario</h2>

                <form method="POST" action="{{ route('admin.users.store') }}">
                    @csrf

                    {{-- Name --}}
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
                        <input
                            type="text"
                            id="name"
                            name="name"
                            value="{{ old('name') }}"
                            required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                                   focus:border-indigo-500 focus:ring-indigo-500"
                        >
                        @error('name')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Surname --}}
                    <div class="mb-4">
                        <label for="surname" class="block text-sm font-medium text-gray-700">Apellido</label>
                        <input
                            type="text"
                            id="surname"
                            name="surname"
                            value="{{ old('surname') }}"
                            required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                                   focus:border-indigo-500 focus:ring-indigo-500"
                        >
                        @error('surname')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Email --}}
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                                   focus:border-indigo-500 focus:ring-indigo-500"
                        >
                        @error('email')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Submit Button --}}
                    <div class="mt-6">
                        <button
                            type="submit"
                            class="inline-flex justify-center px-4 py-2 bg-indigo-600 text-white
                                   font-semibold rounded-md shadow-sm hover:bg-indigo-700
                                   active:bg-indigo-800 focus:outline-none focus:ring-2
                                   focus:ring-indigo-500 focus:ring-offset-2 transition"
                        >
                            Crear Usuario
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>
