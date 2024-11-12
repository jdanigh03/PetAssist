<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Raza extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'especie_id',
        'caracteristicas',
    ];


    public function especie()
    {
        return $this->belongsTo(Especie::class);
    }


    public function mascotas()
    {
        return $this->hasMany(Mascota::class);
    }
}