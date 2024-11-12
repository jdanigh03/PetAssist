<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Mascota extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'nacimiento',
        'raza_id',
        'user_id',
        'foto',
    ];


    public function raza()
    {
        return $this->belongsTo(Raza::class);
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function getEdadAttribute()
    {
        return Carbon::parse($this->attributes['nacimiento'])->age;
    }


    public function getEdadStringAttribute()
    {

        $nacimiento = Carbon::parse($this->attributes['nacimiento']);
        $ahora = Carbon::now();
        $edad = $ahora->diff($nacimiento);

        $anios = $edad->y;
        $meses = $edad->m;
        $dias = $edad->d;


        $edadString = '';

        if ($anios > 0) {
            $edadString .= $anios . ' año' . ($anios > 1 ? 's' : '');
        }


        if ($meses > 0) {
            $edadString .= ($anios > 0 ? ', ' : '') . $meses . ' mes' . ($meses > 1 ? 'es' : '');
        }


        if ($anios == 0 && $meses == 0) {
            $edadString .= $dias . ' día' . ($dias > 1 ? 's' : '');
        }




        return $edadString;
    }


    

}