<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auto extends Producto
{
    use HasFactory;

    public static function getAll() {
        return self::Paginate();
    }
}
