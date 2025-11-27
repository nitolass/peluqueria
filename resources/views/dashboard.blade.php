@extends('layouts.app') <!-- tu layout principal -->

@section('content')
    <div class="bg-white shadow-md rounded-lg p-6">

        <h2 class="text-2xl font-bold mb-4">Mis Citas</h2>

        @if($appointments->isEmpty())
            <p class="text-gray-600 mb-4">No tienes ninguna cita reservada.</p>
            <a href="{{ route('appointments.create') }}"
               class="inline-block px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition">
                Reservar nueva cita
            </a>
        @else
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200">
                    <thead>
                    <tr class="bg-gray-100">
                        <th class="py-2 px-4 border-b">Servicio</th>
                        <th class="py-2 px-4 border-b">Fecha</th>
                        <th class="py-2 px-4 border-b">Hora</th>
                        <th class="py-2 px-4 border-b">Estado</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($appointments as $appointment)
                        <tr>
                            <td class="py-2 px-4 border-b">{{ $appointment->service->name }}</td>
                            <td class="py-2 px-4 border-b">{{ \Carbon\Carbon::parse($appointment->date)->format('l, d M Y') }}</td>
                            <td class="py-2 px-4 border-b">{{ $appointment->time }}</td>
                            <td class="py-2 px-4 border-b capitalize">{{ $appointment->status }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                <a href="{{ route('appointments.create') }}"
                   class="inline-block px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition">
                    Reservar nueva cita
                </a>
            </div>
        @endif

    </div>
@endsection
