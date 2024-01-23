<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductosController extends Controller
{
    public function index()
    {
        $productos = \App\Models\Productos::all();
        return view('index', compact('productos'));
    }

    public function ver_productos()
    {
        $productos = \App\Models\Productos::all();
        return view('admin.productos', compact('productos'));
    }

    public function create_productos()
    {
        $categorias = \App\Models\Categoria::all();
        return view('admin.create_productos', compact('categorias'));
    }

    public function store_productos(Request $request)
    {
        $producto = new \App\Models\Productos();
        $producto->nombre = $request->input('nombre');
        $producto->descripcion = $request->input('descripcion');
        $producto->marca = $request->input('marca');
        $producto->stock = $request->input('stock');
        $producto->precio = $request->input('precio');
        $producto->id_categoria = $request->input('categoria');
    
        // Validar la imagen
        $request->validate([
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $categoria = \App\Models\Categoria::find($request->input('categoria'));
    
        // Procesar y guardar la imagen
        $imagen = $request->file('imagen');
        $nombreArchivo = $request->input('nombre') . '.' . $imagen->getClientOriginalExtension();
        $directorio = 'storage/images/productos/' . $categoria->nombre;
    
        // Crear el directorio si no existe 
        if (!file_exists($directorio)) {
            mkdir($directorio, 0777, true);
        }

        $imagen->move($directorio, $nombreArchivo);
    
        $producto->imagen = $directorio . '/' . $nombreArchivo;

    
        // Guardar el producto
        $producto->save();
    
        return redirect()->route('admin.productos')->with('success', 'Producto agregado exitosamente.');
    }
    


    public function ver_producto($id)
    {
        $producto = \App\Models\Productos::find($id);
        return view('admin.ver_producto', compact('producto'));
    }

    public function destroy_productos($id)
    {
        $producto = \App\Models\Productos::find($id);
        $producto->delete();
        return redirect()->route('admin.productos');
    }
}
