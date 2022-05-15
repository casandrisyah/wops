<?php

namespace App\Http\Controllers\API;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', auth()->guard('web')->user()->id)->paginate(10);
        return $orders;
    }

    public function show(Order $order)
    {
        return $order;
    }
}
