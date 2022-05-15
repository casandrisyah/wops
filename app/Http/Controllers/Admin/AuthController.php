<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin')->except('do_logout');
    }

    public function index()
    {
        return view('pages.admin.auth.main');
    }

    public function do_login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|max:255',
            'password' => 'required|min:8',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('email')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('email'),
                ]);
            } else {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('password'),
                ]);
            }
        }
        $user = User::where('email', $request->email)->where('role', 'admin')->first();
        if ($user) {
            if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
                return response()->json([
                    'alert' => 'success',
                    'message' => 'Welcome back ' . Auth::guard('admin')->user()->name,
                    'callback' => 'reload',
                ]);
            } else {
                return response()->json([
                    'alert' => 'error',
                    'message' => 'Maaf, password anda salah.',
                ]);
            }
        } else {
            return response()->json([
                'alert' => 'error',
                'message' => 'Maaf, Akun belum terdaftar.',
            ]);
        }
    }
    public function do_logout()
    {
        $user = Auth::guard('admin')->user();
        Auth::logout($user);
        return redirect('admin/auth');
    }
}
