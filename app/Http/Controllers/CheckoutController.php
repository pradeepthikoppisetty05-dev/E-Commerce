<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function index(Request $request){
        $cartItems = Cart::with('product')
            ->where('user_id', $request->user()->id)
            ->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart')->with('error', 'Cart is empty');
        }

        $total = $cartItems->sum(fn($item) =>
            $item->product->price * $item->quantity
        );

        return view('checkout', compact('cartItems', 'total'));
    }

    public function placeOrder(Request $request){
        DB::transaction(function () use ($request) {

            $cartItems = Cart::with('product')
                ->where('user_id', $request->user()->id)
                ->get();

            if ($cartItems->isEmpty()) {
        return redirect()
            ->route('cart')
            ->with('error', 'Your cart is empty. Cannot place order.');
    }
    
            $total = $cartItems->sum(fn($item) =>
                $item->product->price * $item->quantity
            );

            $order = Order::create([
                'user_id' => $request->user()->id,
                'total_amount' => $total,
                'status' => 'paid' // fake payment success
            ]);

            foreach ($cartItems as $item) {
                $order->items()->create([
                    'product_id' => $item->product->id,
                    'quantity' => $item->quantity,
                    'price' => $item->product->price,
                ]);
            }

            Cart::where('user_id', $request->user()->id)->delete();
        });

        return redirect()->route('orders.index')->with('success', 'Order placed successfully');
    }
    
}
