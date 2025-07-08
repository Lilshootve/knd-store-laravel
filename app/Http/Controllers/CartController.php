<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    /**
     * Obtener o crear el carrito del usuario
     */
    private function getOrCreateCart()
    {
        $cart = null;
        
        if (auth()->check()) {
            // Usuario autenticado
            $cart = Cart::where('user_id', auth()->id())->first();
            if (!$cart) {
                $cart = Cart::create([
                    'user_id' => auth()->id(),
                    'total' => 0
                ]);
            }
        } else {
            // Usuario no autenticado - usar session
            $sessionId = Session::getId();
            $cart = Cart::where('session_id', $sessionId)->first();
            if (!$cart) {
                $cart = Cart::create([
                    'session_id' => $sessionId,
                    'total' => 0
                ]);
            }
        }
        
        return $cart;
    }

    /**
     * Mostrar el carrito
     */
    public function index()
    {
        $cart = $this->getOrCreateCart();
        $items = $cart->items()->with('cart')->get();
        
        return view('cart', compact('cart', 'items'));
    }

    /**
     * Agregar producto al carrito
     */
    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|string',
            'product_name' => 'required|string',
            'price' => 'required|numeric|min:0',
            'quantity' => 'integer|min:1'
        ]);

        $cart = $this->getOrCreateCart();
        
        // Verificar si el producto ya existe en el carrito
        $existingItem = $cart->items()->where('product_id', $request->product_id)->first();
        
        if ($existingItem) {
            // Incrementar cantidad si ya existe
            $existingItem->incrementQuantity($request->quantity ?? 1);
            $message = 'Cantidad actualizada en el carrito';
        } else {
            // Crear nuevo item
            $cart->items()->create([
                'product_id' => $request->product_id,
                'product_name' => $request->product_name,
                'price' => $request->price,
                'quantity' => $request->quantity ?? 1,
                'product_data' => $request->except(['product_id', 'product_name', 'price', 'quantity'])
            ]);
            $message = 'Producto agregado al carrito';
        }

        $cart->calculateTotal();

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => $message,
                'cart_count' => $cart->getItemCount(),
                'cart_total' => $cart->total
            ]);
        }

        return redirect()->back()->with('success', $message);
    }

    /**
     * Actualizar cantidad de un item
     */
    public function update(Request $request, $itemId)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $cart = $this->getOrCreateCart();
        $item = $cart->items()->findOrFail($itemId);
        
        $item->updateQuantity($request->quantity);

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Cantidad actualizada',
                'cart_count' => $cart->getItemCount(),
                'cart_total' => $cart->total,
                'item_subtotal' => $item->getSubtotal()
            ]);
        }

        return redirect()->back()->with('success', 'Cantidad actualizada');
    }

    /**
     * Remover item del carrito
     */
    public function remove($itemId)
    {
        $cart = $this->getOrCreateCart();
        $item = $cart->items()->findOrFail($itemId);
        $item->delete();
        
        $cart->calculateTotal();

        if (request()->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Producto removido del carrito',
                'cart_count' => $cart->getItemCount(),
                'cart_total' => $cart->total
            ]);
        }

        return redirect()->back()->with('success', 'Producto removido del carrito');
    }

    /**
     * Limpiar el carrito
     */
    public function clear()
    {
        $cart = $this->getOrCreateCart();
        $cart->clear();

        if (request()->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Carrito limpiado',
                'cart_count' => 0,
                'cart_total' => 0
            ]);
        }

        return redirect()->back()->with('success', 'Carrito limpiado');
    }

    /**
     * Obtener información del carrito (para AJAX)
     */
    public function info()
    {
        $cart = $this->getOrCreateCart();
        
        return response()->json([
            'cart_count' => $cart->getItemCount(),
            'cart_total' => $cart->total,
            'is_empty' => $cart->isEmpty()
        ]);
    }
}
