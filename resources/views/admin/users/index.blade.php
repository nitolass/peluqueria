<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Lista de Usuarios
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded-lg p-6">

                <h2 class="text-lg font-semibold mb-4">Usuarios registrados</h2>

                <div class="overflow-x-auto">
                    <table class="min-w-full border border-gray-200 rounded-lg">
                        <thead class="bg-gray-50">
                        <tr class="text-left text-sm font-medium text-gray-700">
                            <th class="px-4 py-2 border-b">ID</th>
                            <th class="px-4 py-2 border-b">Nombre</th>
                            <th class="px-4 py-2 border-b">Apellido</th>
                            <th class="px-4 py-2 border-b">Email</th>
                        </tr>
                        </thead>

                        <tbody class="text-sm text-gray-800">
                        @foreach ($users as $user)
                            <tr class="hover:bg-gray-100 transition">
                                <td class="px-4 py-2 border-b">{{ $user->id }}</td>
                                <td class="px-4 py-2 border-b">{{ $user->name }}</td>
                                <td class="px-4 py-2 border-b">{{ $user->surname }}</td>
                                <td class="px-4 py-2 border-b">{{ $user->email }}</td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
