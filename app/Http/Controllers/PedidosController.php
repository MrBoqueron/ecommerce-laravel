<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class PedidosController extends Controller
{
    public function index()
    {
        $pedidos = Order::all();
        return view('pedidos.index', compact('pedidos'));
    }

    public function show($id)
    {

        $order = Order::with('orderItems.producto')->find($id);

        // Verifica si el pedido existe
        if (!$order) {
            abort(404);
        }
    
        return view('pedidos.ver', compact('order'));
    }

    public function destroy($id)
    {
        $pedido = Order::find($id);
        $pedido->delete();
        return redirect()->route('admin.pedidos');
    }
}
