@extends('layout')

@section('content')
    <div class="min-h-screen bg-gray-100 p-8">

        <div class="max-w-7xl mx-auto">
            <h1 class="text-4xl font-bold text-gray-800 mb-6">Bienvenido, {{ auth()->user()->name }}</h1>

            <!-- Tarjeta de próximas citas -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                @forelse(auth()->user()->appointments->sortBy('date') as $appointment)
                    <div class="bg-white rounded-xl shadow-md p-6 flex flex-col justify-between hover:shadow-lg transition">
                        <h2 class="text-xl font-semibold mb-2">{{ $appointment->service->name }}</h2>
                        <p class="text-gray-600 mb-1"><strong>Fecha:</strong> {{ $appointment->date->format('d/m/Y') }}</p>
                        <p class="text-gray-600 mb-1"><strong>Hora:</strong> {{ $appointment->time }}</p>
                        <p class="text-sm font-medium
                        {{ $appointment->status === 'pending' ? 'text-yellow-600' : 'text-green-600' }}">
                            {{ ucfirst($appointment->status) }}
                        </p>
                    </div>
                @empty
                    <p class="text-gray-600 col-span-full">No tienes citas programadas.</p>
                @endforelse

            </div>

            <!-- Botón para crear nueva cita -->
            <div class="mt-8">
                <a href="{{ route('admin.') }}"
                   class="px-6 py-3 bg-blue-900 text-white rounded-lg hover:bg-blue-900 transition">
                    Crear nueva cita
                </a>
            </div>

            <!-- Información adicional de la peluquería -->
            <div class="mt-12 bg-white p-6 rounded-xl shadow-md">
                <h2 class="text-2xl font-bold mb-4">Juan Studio Hair</h2>
                <p class="text-gray-700 mb-2">💈 Estilo moderno y clásico</p>
                <p class="text-gray-700 mb-2">💇‍♂️ Atención personalizada</p>
                <p class="text-gray-700 mb-2">🎨 Coloración profesional</p>
                <p class="text-gray-700">📍 Ubicados en Murcia</p>
            </div>
        </div>

    </div>
@endsection
