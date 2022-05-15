<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function store(Request $request)
    {
        $cart = Cart::where('user_id', auth()->guard('api')->user()->id)->get();
        $order = new Order;
        $order->user_id = auth()->guard('api')->user()->id;
        $order->total = $request->total;
        $order->save();

        foreach ($cart as $c) {
            $order->books()->attach($c->book_id, ['quantity' => $c->quantity, 'price' => $c->price, 'total' => $c->total]);
        }

        $cart = Cart::where('user_id', auth()->guard('api')->user()->id)->delete();
        return $order;
    }
}
