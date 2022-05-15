<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $orders = Order::paginate(10);
            return view('pages.admin.orders.list', compact('orders'));
        }
        return view('pages.admin.orders.main');
    }

    public function show(Order $order)
    {
        return view('pages.admin.orders.show', compact('order'));
    }

    public function accept(Order $order)
    {
        $order->status = 'accepted';
        $order->save();

        return response()->json([
            'alert' => 'success',
            'message' => 'Pesanan berhasil diterima',
        ]);
    }

    public function reject(Order $order)
    {
        $order->status = 'rejected';
        $order->save();

        return response()->json([
            'alert' => 'success',
            'message' => 'Pesanan berhasil ditolak',
        ]);
    }
}
