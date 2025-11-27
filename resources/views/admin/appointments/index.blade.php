@extends('admin.layout')

@section('content')
    <h2 class="text-3xl font-bold mb-6">Todas las citas</h2>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white shadow-md rounded-lg">
            <thead class="bg-gray-800 text-white">
            <tr>
                <th class="py-2 px-4">ID</th>
                <th class="py-2 px-4">Cliente</th>
                <th class="py-2 px-4">Servicio</th>
                <th class="py-2 px-4">Fecha</th>
                <th class="py-2 px-4">Hora</th>
                <th class="py-2 px-4">Estado</th>
            </tr>
            </thead>
            <tbody>
            @foreach($appointments as $appointment)
                <tr class="text-center border-b">
                    <td class="py-2 px-4">{{ $appointment->id }}</td>
                    <td class="py-2 px-4">{{ $appointment->user->name }}</td>
                    <td class="py-2 px-4">{{ $appointment->service->name }}</td>
                    <td class="py-2 px-4">{{ $appointment->date }}</td>
                    <td class="py-2 px-4">{{ $appointment->time }}</td>
                    <td class="py-2 px-4 capitalize">{{ $appointment->status }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
