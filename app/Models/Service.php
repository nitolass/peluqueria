<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Appointment;

/**
 * @property \Illuminate\Database\Eloquent\Collection $appointments
 */
class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
    ];

    /**
     * Relación: un servicio tiene muchas citas
     */
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
