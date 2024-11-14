<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleCita extends Model
{
    use HasFactory;

    protected $table = 'detalles_citas';
    protected $fillable = [
        'cita_id',
        'tratamiento',
        'medicamentos',
        'observaciones',
        'pruebas_realizadas',
    ];

    // Relación con la cita
    public function cita()
    {
        return $this->belongsTo(Cita::class);
    }
    public function detalle()
    {
        return $this->hasOne(DetalleCita::class);
    }
}
