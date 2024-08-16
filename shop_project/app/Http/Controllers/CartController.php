<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');

        $product = Product::findOrFail($productId);

        // Retrieve the cart from the session, or create a new one if it doesn't exist
        $cart = Session::get('cart', []);

        // Add or update the product in the cart
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $quantity;
        } else {
            $cart[$productId] = [
                'product' => $product,
                'quantity' => $quantity,
            ];
        }

        // Save the cart back to the session
        Session::put('cart', $cart);
         return view('cart', compact('cart'));
        return redirect()->back()->with('success', 'Товар добавлен в корзину.');
    }

    public function view()
    {
        $cart = Session::get('cart', []);
        return view('cart', compact('cart'));
    }

    public function remove(Request $request)
{
    $productId = $request->input('product_id');

    // Retrieve the cart from the session
    $cart = Session::get('cart', []);

    // Remove the product from the cart
    if (isset($cart[$productId])) {
        unset($cart[$productId]);
    }

    // Save the updated cart back to the session
    Session::put('cart', $cart);

    return redirect()->back()->with('success', 'Товар удален из корзины.');
}

    public function updateQuantity(Request $request)
    {
        $quantities = $request->input('quantity');

        // Retrieve the cart from the session
        $cart = Session::get('cart', []);

        // Update the quantity of the products in the cart
        foreach ($quantities as $productId => $quantity) {
            if ($quantity <= 0) {
                unset($cart[$productId]);
            } elseif (isset($cart[$productId])) {
                $cart[$productId]['quantity'] = $quantity;
            }
        }

        // Save the updated cart back to the session
        Session::put('cart', $cart);

        return redirect()->back()->with('success', 'Корзина обновлена.');
    }

    public function checkout()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('message', 'Пожалуйста, войдите, чтобы продолжить покупку.');
        }

        // Your checkout logic here

        return view('checkout');
    }
}
