<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart');
        return view('cart.index', compact('cart'));
    }

    public function store(Request $request)
    {
        $producto = Productos::find($request->id);

        if (!$producto) {
            abort(404);
        }

        $cart = session()->get('cart');

        if (!$cart) {
            $cart = [
                $request->id => [
                    "id" => $request->id,
                    "nombre" => $producto->nombre,
                    "precio" => $producto->precio,
                    "cantidad" => is_numeric($producto->cantidad) ? $producto->cantidad : 1,
                    "imagen" => $producto->imagen
                ]
            ];
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Producto agregado al carrito exitosamente!');
        }

        if (isset($cart[$request->id])) {
            // Asegurarse de que la cantidad actual sea numérica antes de incrementar
            $cart[$request->id]['cantidad'] = is_numeric($cart[$request->id]['cantidad']) ? $cart[$request->id]['cantidad'] + 1 : 1;
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Producto agregado al carrito exitosamente!');
        }

        // Manejar el caso donde la cantidad es 0 o no está definida
        if ($request->has('quantity') && is_numeric($request->quantity) && $request->quantity > 0) {
            $cart[$request->id] = [
                "nombre" => $producto->nombre,
                "precio" => $producto->precio,
                "cantidad" => $request->quantity,
                "imagen" => $producto->imagen
            ];
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Producto agregado al carrito exitosamente!');
        } else {
            return redirect()->back()->with('error', 'La cantidad seleccionada no es válida.');
        }
    }

    public function destroy(Request $request, $id)
    {
        $cart = session()->get('cart');
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Producto eliminado del carrito exitosamente!');
        }
    }

    public function update(Request $request)
    {
        if ($request->id and $request->cantidad) {
            $cart = session()->get('cart');
            $cart[$request->id]["cantidad"] = $request->cantidad;
            session()->put('cart', $cart);
            session()->flash('success', 'Carrito actualizado exitosamente!');
        }
    }

    public function clear()
    {
        session()->forget('cart');
        return redirect()->back()->with('success', 'Carrito vaciado exitosamente!');
    }

    public function checkout()
    {
        $user = auth()->user();
        $cart = session()->get('cart');
    
        $order = new Order([
            'user_id' => $user->id,
            'total' => 0,
        ]);
    
        $order->save();
    
        foreach ($cart as $productId => $cartItem) {
            $product = Productos::find($productId);
    
            if (!$product) {
                return redirect()->route('cart')->with('error', 'Producto no encontrado.');
            }
    
            if (!isset($cartItem['cantidad']) || !is_numeric($cartItem['cantidad']) || $cartItem['cantidad'] <= 0) {
                return redirect()->route('cart')->with('error', 'La cantidad en el carrito no es válida.');
            }
    
            // Verificar si hay suficiente stock antes de realizar la compra
            if ($product->stock < $cartItem['cantidad']) {
                return redirect()->route('cart')->with('error', 'No hay suficiente stock para el producto: ' . $product->nombre);
            }
    
            $orderItem = new OrderItem([
                'order_id' => $order->id,
                'product_id' => $productId,
                'quantity' => $cartItem['cantidad'],
                'price' => $product->precio,
            ]);
    
            // Actualizar el stock después de procesar el pedido
            $product->stock -= $cartItem['cantidad'];
    
            $orderItem->save();
        }
    
        // Guardar el pedido después de procesar todos los elementos del carrito
        $order->total = $order->orderItems->sum('price');
        $order->save();
    
        // Actualizar el stock de productos después de procesar todos los elementos del carrito
        foreach ($cart as $productId => $cartItem) {
            $product = Productos::find($productId);
            $product->stock -= $cartItem['cantidad'];
            $product->save(); // Puedes necesitar ajustar esto según tu lógica y relación con el modelo
        }
    
        session()->forget('cart');
    
        return redirect()->route('home')->with('success', 'El pedido ha sido realizado exitosamente!');
    }
    
}
