@extends('admin.layout')

@section('content')
    <h2>Crear nueva cita (Admin)</h2>

    <form action="{{ route('admin.appointments.store') }}" method="POST">
        @csrf
        <label>Usuario:</label>
        <select name="user_id">
            @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
            @endforeach
        </select>

        <label>Servicio:</label>
        <select name="service_id">
            @foreach($services as $service)
                <option value="{{ $service->id }}">{{ $service->name }}</option>
            @endforeach
        </select>

        <label>Fecha:</label>
        <input type="date" name="date" required>

        <label>Hora:</label>
        <input type="time" name="time" required>

        <button type="submit">Crear cita</button>
    </form>
@endsection
