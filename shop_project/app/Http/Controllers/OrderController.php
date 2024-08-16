<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('admin/orders', compact('orders'));
    }

    public function store(Request $request)
    {
        $cart = session()->get('cart');
        $username = Auth::user()->name;

        foreach ($cart as $item) {
            Order::create([
                'product_id' => $item['product']->id,
                'username' => $username,
                'quantity' => $item['quantity'],
                'price' => $item['product']->price * $item['quantity'],
                'status' => 0,
            ]);
        }

        session()->forget('cart');

        return redirect()->route('index.index')->with('success', 'Ваш заказ был успешно оформлен!');
    }

    public function destroy($id)
    {
        $order = Order::find($id);
        if ($order) {
            $order->delete();
        }

        return redirect()->route('orders.index')->with('success', 'Заказ был успешно удален');
    }

    public function approve($id)
    {
        $order = Order::find($id);
        if ($order) {
            $order->status = 1;
            $order->save();
        }

        return redirect()->route('orders.index')->with('success', 'Заказ был одобрен');
    }

    public function reject($id)
    {
        $order = Order::find($id);
        if ($order) {
            $order->status = 2;
            $order->save();
        }

        return redirect()->route('orders.index')->with('success', 'Заказ был отклонен');
    }
}
