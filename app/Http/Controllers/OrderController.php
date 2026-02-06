<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(Request $request){
        $orders = Order::where('user_id', $request->user()->id)
            ->latest()
            ->get();

        return view('orderindex', compact('orders'));
    }

    public function show(Order $order)
    {

        if ($order->user_id !== Auth::id()) {
            abort(403);
        }

        $order->load('items.product');

        return view('ordershow', compact('order'));
    }

}
