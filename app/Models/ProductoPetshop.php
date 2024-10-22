<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductoPetshop extends Model
{
    use HasFactory;

    protected $table = 'productos_petshop';
    public $timestamps = false;

    protected $primaryKey = 'ID_Producto';

    protected $fillable = [
        'Nombre', 'Descripcion', 'Precio', 'Cantidad', 'Imagen', 'Categoria'
    ];
}

