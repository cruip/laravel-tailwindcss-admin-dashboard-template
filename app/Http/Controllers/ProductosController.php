<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataFeed;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;

class ProductosController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dataFeed = new DataFeed();
        $productos = Producto::paginate(5);

        return view('pages/productos/productos', compact('dataFeed', 'productos'));


    }

    public function create(Request $request){
        $dataFeed = new DataFeed();

        return view('pages/productos/create', compact('dataFeed'));

    }
    public function store(Request $request){
        $request->validate([
            'nombre' => 'required',
            'precio' => 'required|numeric|min:1',
            'cantidad' => 'required|numeric|min:1',
            'categoria' => 'required',
            'imagen' => 'required|image|mimes:jpg,png,gif',
        ]);
        $user_creador = Auth::user()->id;

        $producto = new Producto();

        $producto->nombre = $request->input('nombre');
        $producto->precio = $request->input('precio');
        $producto->cantidad = $request->input('cantidad');
        $producto->categoria = $request->input('categoria');
        $producto->created_by = $user_creador;

        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $rutaImagen = $imagen->storePublicly('public/images'); // Use storePublicly() instead of store()
            $producto->imagen = str_replace('public/', '', $rutaImagen); // Remove the 'public/' prefix to store the correct path in the database.
                }

        $producto->save();
        return redirect()->route('productos');

    }
    public function sumar(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);
        $producto->cantidad += 1;
        $producto->save();

        return redirect()->route('productos');
    }

    public function restar(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);
        if ($producto->cantidad > 0) {
            $producto->cantidad -= 1;
            $producto->save();
        }

        return redirect()->route('productos');
    }

    public function destroy($id){

        $producto = Producto::findOrFail($id);
        $producto->delete();
        return redirect()->route('productos');

    }

    public function edit($id){
        $dataFeed = new DataFeed();
        $producto = Producto::findOrFail($id);

        return view('pages/productos/edit', compact('dataFeed', 'producto'));

    }


    public function update(Request $request, $id){

        $producto = Producto::findOrFail($id);

        $request->validate([
            'nombre' => 'required',
            'precio' => 'required|numeric|min:1',
            'cantidad' => 'required|numeric|min:1',
            'categoria' => 'required',
            'imagen' => 'image|mimes:jpg,png,gif',
        ]);

        $user_edit = Auth::user()->id;

        $producto->nombre = $request->input('nombre');
        $producto->precio = $request->input('precio');
        $producto->cantidad = $request->input('cantidad');
        $producto->categoria = $request->input('categoria');
        $producto->updated_by = $user_edit;

        if ($request->hasFile('imagen')) {

            $request->validate([
                'imagen' => 'image|mimes:jpg,png,gif',
            ]);

            $imagen = $request->file('imagen');
            $producto->imagen = str_replace('public/', '', $rutaImagen); // Remove the 'public/' prefix to store the correct path in the database.
        }

        $producto->save();

        return redirect()->route('productos');

    }
}
