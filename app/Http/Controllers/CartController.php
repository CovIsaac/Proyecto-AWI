<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mezcal;
use App\Models\Cart;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::where('user_id', auth()->id())->get();
        return view('carrito', compact('cartItems'));
    }

    public function addToCart(Request $request, Mezcal $mezcal)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1|max:10',
        ]);

        $cart = Cart::firstOrCreate(
            ['user_id' => auth()->id(), 'mezcal_id' => $mezcal->id],
            ['quantity' => 0]
        );

        $cart->quantity += $request->quantity;
        $cart->save();

        return redirect()->route('dashboard')->with('success', 'Producto añadido al carrito');
    }

    public function updateCart(Request $request, Cart $cart)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1|max:10',
        ]);

        $cart->update(['quantity' => $request->quantity]);

        return redirect()->route('carrito')->with('success', 'Cantidad actualizada');
    }

    public function removeFromCart(Cart $cart)
    {
        $cart->delete();

        return redirect()->route('carrito')->with('success', 'Producto eliminado del carrito');
    }

    public function showPaymentPage()
    {
        return view('pago');
    }

    public function procesarPago(Request $request)
    {
        $request->validate([
            'nombre_tarjeta' => 'required|string|max:255',
            'numero_tarjeta' => 'required|string|max:16|min:16',
            'fecha_expiracion' => 'required|string|max:5|min:5',
        ]);

        // Aquí se procesaría el pago
        // Como es un proyecto, asumimos que siempre es exitoso

        // Eliminar el carrito del usuario
        Cart::where('user_id', auth()->id())->delete();

        // Redirigir al dashboard con un mensaje de éxito
        return redirect()->route('dashboard')->with('success', 'Compra realizada con éxito');
    }
}
