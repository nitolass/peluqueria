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
     * Mostrar todas las citas del sistema (puedes usar para admin)
     */
    public function index()
    {
        // Todos los usuarios ven solo sus citas
        $appointments = Appointment::with('user', 'service')
            ->where('user_id', Auth::id())
            ->get();

        return view('admin.appointments.index', compact('appointments'));
    }

    /**
     * Formulario de creación de cita
     * Mostramos servicios y calendario con horas ocupadas
     */
    public function create()
    {
        $services = Service::all();

        // Obtener citas existentes del usuario
        $appointments = Auth::user()->appointments()->get();

        // Array de horas ya ocupadas por fecha
        $bookedSlots = [];
        foreach ($appointments as $appointment) {
            $bookedSlots[$appointment->date][] = $appointment->time;
        }

        return view('admin.appointments.create', compact('services', 'bookedSlots'));
    }

    /**
     * Guardar una nueva cita
     */
    public function store(Request $request)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'date' => 'required|date',
            'time' => 'required',
        ]);

        $appointment = new Appointment();
        $appointment->service_id = $request->service_id;
        $appointment->user_id = Auth::id();
        $appointment->date = $request->date;
        $appointment->time = $request->time;
        $appointment->status = 'pending';
        $appointment->save();

        return redirect()->route('admin.appointments.index')
            ->with('success', 'Cita creada correctamente');
    }
}
