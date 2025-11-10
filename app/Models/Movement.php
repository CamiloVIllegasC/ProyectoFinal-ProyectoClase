<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movement extends Model
{
    public const MOVEMENT_TYPES_IN = 'entrada';
    public const MOVEMENT_TYPES_DEVOLUTION = 'devolucion';
    public const MOVEMENT_TYPES_OUT = 'salida';
    //
    use HasFactory;

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
