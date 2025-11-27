<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;
use App\Admin\Users\Models\User;

class AppointmentController extends Controller
{
    /**
     * Mostrar todas las citas del usuario logueado
     */
    public function index()
    {
        $appointments = Appointment::with('user', 'service')
            ->where('user_id', Auth::id())
            ->get();

        return view('admin.appointments.index', compact('appointments'));
    }

    /**
     * Formulario para crear nueva cita
     */
    public function create()
    {
        $services = Service::all();
        $users = User::all(); // Para poder elegir usuario si quieres mostrarlo

        $appointments = Auth::user()->appointments()->get();

        $bookedSlots = [];
        foreach ($appointments as $appointment) {
            $bookedSlots[$appointment->date][] = $appointment->time;
        }

        return view('admin.appointments.create', compact('services', 'users', 'bookedSlots'));
    }

    /**
     * Guardar cita
     */
    public function store(Request $request)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'date' => 'required|date',
            'time' => 'required',
            'user_id' => 'sometimes|exists:users,id',
        ]);

        $appointment = new Appointment();
        $appointment->service_id = $request->service_id;
        $appointment->user_id = $request->user_id ?? Auth::id();
        $appointment->date = $request->date;
        $appointment->time = $request->time;
        $appointment->status = 'pending';
        $appointment->save();

        return redirect()->route('appointments.index')
            ->with('success', 'Cita creada correctamente');
    }
}
