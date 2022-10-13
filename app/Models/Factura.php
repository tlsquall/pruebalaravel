<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Compra;
use Illuminate\Support\Facades\DB;

class Factura extends Model
{
    use HasFactory;
    static function getList(){

        return Factura::select('facturas.id', 'facturas.created_at',DB::raw("SUM(productos.precio) as total"))->join('compras', 'od_factura', '=', 'facturas.id')->join('productos','productos.id', '=', 'compras.od_producto')->groupBy('facturas.id')->get(); 

    }

    static function generate(){
        $compras = Compra::where('od_factura','=', NULL)->groupBy('od_user')->get();

        foreach($compras as $compra){

            $factura = new Factura();
            $factura->od_user = $compra->od_user;
            $factura->save();

            $comprasUser = Compra::where('od_factura','=', NULL)->where('od_user','=',$compra->od_user)->get();
            foreach($comprasUser as $cc){
                $cc->od_factura = $factura->id;
                $cc->save();
            }

        }

    }

}
