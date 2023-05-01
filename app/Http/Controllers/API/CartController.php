<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = Cart::where('user_id', auth()->guard('api')->user()->id)->get();
        return $cart;
    }

    public function store(Request $request)
    {
        $cart = Cart::create([
            'user_id' => auth()->guard('api')->user()->id,
            'book_id' => $request->book_id,
            'quantity' => $request->quantity,
        ]);
        return response()->json([
            'alert' => 'success',
            'message' => 'Berhasil menambahkan ke keranjang',
            'data' => $cart,
        ]);
    }

    public function update(Request $request, Cart $cart)
    {
        $cart->update([
            'quantity' => $request->quantity,
        ]);
        
        return response()->json([
            'alert' => 'success',
            'message' => 'Berhasil mengubah jumlah',
            'data' => $cart,
        ]);
    }

    public function destroy(Cart $cart)
    {
        $cart->delete();
        
        return "Item Berhasil Dihapus";
    }
}
