<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compra;
use App\Models\Factura;
use App\Models\User;

class FacturaController extends Controller
{
    public function index(){

        $facturas = Factura::getList();

        return view('facturas.index', ["facturas" => $facturas]);
    }

    public function store(){

        Factura::generate();
        return redirect()->route('facturas')->with('success', 'Facturas generadas');

    }

    public function show($id){
        $factura = Factura::find($id);
        $productos = Compra::join('productos', 'productos.id', '=', 'od_producto')->where('od_factura','=',$id)->get();
        $total = 0;
        $impuestos = 0;
        foreach ($productos as $pro) {
            $total += $pro->precio;
            $impuestos += $pro->precio - $pro->precio / ($pro->impuesto/100 + 1);
        }
        return view('facturas.show', ["factura" => $factura, "productos" => $productos, "total" => $total, "impuestos" => $impuestos]);

    }
}
