<?php

namespace App\Http\Controllers\Web;

use App\Helpers\Helper;
use App\Models\Book;
use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Province;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        $carts = Cart::where('user_id', Auth::guard('web')->user()->id)->get();
        $provinces = Province::all();
        return view('pages.web.checkout.main', compact('carts', 'provinces'));
    }
    public function checkout(Request $request)
    {
        $validators = Validator::make($request->all(), [
            'fullname' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'province' => 'required',
            'city' => 'required',
            'subdistrict' => 'required',
            'postal_code' => 'required',
            'shippingMethod' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validators->fails()) {
            $errors = $validators->errors();
            if ($errors->has('fullname')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('fullname'),
                ]);
            }
            if ($errors->has('phone')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('phone'),
                ]);
            }
            if ($errors->has('address')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('address'),
                ]);
            }
            if ($errors->has('province')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('province'),
                ]);
            }
            if ($errors->has('city')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('city'),
                ]);
            }
            if ($errors->has('subdistrict')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('subdistrict'),
                ]);
            }
            if ($errors->has('postal_code')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('postal_code'),
                ]);
            }
            if ($errors->has('shippingMethod')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => 'Silahkan pilih jasa pengiriman',
                ]);
            }
            if ($errors->has('image')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => 'Silahkan upload bukti pembayaran',
                ]);
            }
        }

        $user = User::find(Auth::guard('web')->user()->id);
        $user->fullname = $request->fullname;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->province_id = $request->province;
        $user->city_id = $request->city;
        $user->subdistrict_id = $request->subdistrict;
        $user->postal_code = $request->postal_code;
        $user->save();


        $cart = Cart::where('user_id', Auth::guard('web')->user()->id)->get();
        $total = 0;

        foreach ($cart as $c) {
            $total = $total + ($c->quantity * $c->book->price);
        }

        $order = new Order();
        $order->code = Helper::IDGenerator();
        $order->user_id = Auth::guard('web')->user()->id;
        $order->total = $total;
        $order->delivery = $request->shippingMethod;
        $file = $request->file('image');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('images/bukti_pembayaran'), $filename);
        $order->image = $filename;
        $order->save();
        $cart = Cart::where('user_id', Auth::guard('web')->user()->id)->get();
        foreach ($cart as $c) {
            $order_detail = new OrderDetail;
            $order_detail->order_id = $order->id;
            $order_detail->book_id = $c->book_id;
            $order_detail->quantity = $c->quantity;
            $order_detail->save();
            $book = Book::find($c->book_id);
            $book->stock = $book->stock - $c->quantity;
            $book->update();
        }
        Cart::where('user_id', Auth::user()->id)->delete();

        return view('pages.web.checkout.detail', ['order' => $order]);
    }
}
