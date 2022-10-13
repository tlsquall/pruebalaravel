<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Compra;
use Illuminate\Support\Facades\Auth;

class CompraController extends Controller
{
    public function index(){

        $productos = Producto::all();
        $compras = Compra::getByUser(Auth::user()->id);

        return view('compra.index', ["productos" => $productos, "compras" => $compras]);
    }

    public function store(Request $request){
        $request->validate([
            "producto" => "required"
        ]);

        $compra = new Compra;
        $compra->od_user = Auth::user()->id;
        $compra->od_producto = $request->producto;

        $compra->save();

        return redirect()->route('compra')->with('success', 'Compra Satisfactoria');
    }

}
