<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    public function index()
    {
        $productos = Productos::paginate(6);
        return view('inicio.index', compact('productos'));
    }

    public function create()
    {
        return view('inicio.create');
        return view('inicio.create', compact('productos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'required|string|max:255',
            'quantity' => 'required|numeric',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,avif|max:2048',
        ]);

        $datosProductos = request()->except('_token');
        $imagen = $request->file('image');
        if ($imagen && $imagen->isValid()) {
            $rutaCarpeta = 'storage/uploads';
            $nombreImagen = $imagen->getClientOriginalName();
            $request->file('image')->move($rutaCarpeta, $nombreImagen);
            $datosProductos['image'] = $nombreImagen;
        }

        Productos::insert($datosProductos);
        return redirect('/inicio/create')->with('success', 'Producto registrado con éxito.');
    }

    public function productosCarrito(){
        return view('/inicio/carrito')->with('productosCarrito',\Cart::getContent());
    }

    public function agregarCarrito(Request $request){
        //dd($request->all());
        \Cart::add(array(
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'description' => $request->description,
                'image' => $request->image,
            )
        ));
        return redirect('/prueba/producto');
    }

    public function quitarCarrito(Request $request){
        \Cart::remove($request->id);
        return redirect('/prueba/producto');
    }

    Public function incrementarCarrito(Request $request){
        \Cart::update($request->id, array(
            'quantity' => 1,
        ));
        return redirect('/prueba/producto');
    }

    Public function decrementarCarrito(Request $request){
        \Cart::update($request->id, array(
            'quantity' => -1,
        ));
        return redirect('/prueba/producto');
    }
}
