<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;

    protected $fillable = [
        'ID_Animal', // Asegúrate de usar el nombre correcto de la columna
        'Fecha_Hora',
        'motivo', 
        'ID_Veterinario', //  Nombre correcto de la columna para el veterinario
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function mascota()
    {
        return $this->belongsTo(Mascota::class, 'ID_Animal'); 
    }

    public function veterinario()
    {
        return $this->belongsTo(User::class, 'ID_Veterinario'); // Relación con el modelo User, usando la columna 'ID_Veterinario'
    }
}