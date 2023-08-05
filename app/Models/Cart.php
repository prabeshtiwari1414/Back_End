<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    public static function hasCartItem($cartCode)
    {
        return static::where('code', $cartCode)->exists();
    }
}