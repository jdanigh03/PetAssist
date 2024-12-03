<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovimientoInventario extends Model
{
    use HasFactory;

    // Relación con el producto
    public function producto()
    {
        return $this->belongsTo(ProductoPetshop::class, 'producto_id');
    }
}