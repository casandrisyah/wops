<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index()
    {
        return view('pages.admin.profile.main');
    }

    public function cpassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required|min:8|same:password',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('old_password')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('old_password'),
                ]);
            } else {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('new_password'),
                ]);
            }
        }

        $user = User::find(auth()->user()->id);

        if (Hash::check($request->old_password, $user->password)) {
            $user->password = Hash::make($request->new_password);
            $user->update();

            return response()->json([
                'alert' => 'success',
                'message' => 'Password berhasil diubah.',
            ]);
        }
    }
}
