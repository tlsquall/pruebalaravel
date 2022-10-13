<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;

    static function getByUser($id){

        return Compra::where('od_user', $id)->join('productos','od_producto', '=', 'productos.id')->get(); 

    }
}
