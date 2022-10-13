<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{

    public function index(){

        $productos = Producto::all();

        return view('productos.index', ["productos" => $productos]);
    }
    
    public function store(Request $request){
        $request->validate([
            "nombre" => "required|min:3",
            "precio" => "required",
            "impuesto" => "required"
        ]);

        $producto = new Producto;
        $producto->nombre = $request->nombre;
        $producto->precio = $request->precio;
        $producto->impuesto = $request->impuesto;

        $producto->save();

        return redirect()->route('productos')->with('success', 'Producto Guardado');
    }

    public function show($id){

        $producto = Producto::find($id);
        return view('productos.show', ["producto" => $producto]);

    }

    
    public function delete($id){

        $producto = Producto::find($id);
        $producto->delete();
        return redirect()->route('productos')->with('success', 'Producto Eliminado');

    }

    public function update(Request $request, $id){

        $request->validate([
            "nombre" => "required|min:3",
            "precio" => "required",
            "impuesto" => "required"
        ]);

        $producto = Producto::find($id);
        $producto->nombre = $request->nombre;
        $producto->precio = $request->precio;
        $producto->impuesto = $request->impuesto;

        $producto->save();

        return redirect()->route('productos')->with('success', 'Producto Actualizado');
    }

}
