<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function register(Request $request)
    {

        $validate = Validator::make($request->all(), [
            'nama_depan' => 'required',
            'nama_belakang' => 'required',
            'email' => 'required|email|unique:users',
            'username' => 'required',
            'password' => 'required|required_with:konfirmasi_password',
            'konfirmasi_password' => 'required|same:password'
        ]);

        if($validate -> fails())
        {
            return response()->json([
                'status' => false,
                'message' => 'Maaf anda tidak berhasil registrasi!',
                'error' => $validate->errors()
            ], 401);
        }

        $user = User::create([
            'nama_depan' => $request->nama_depan,
            'nama_belakang' => $request->nama_belakang,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password)
        ]);
        
        return response()->json([
            'status' => true,
            'message' => "Selamat anda telah berhasil registrasi!",
            'token' => $user->createToken('token')->plainTextToken
        ], 200);
    }

    public function login(Request $request)
    {

        $validate = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if($validate -> fails())
        {
            return response()->json([
                'status' => false,
                'message' => 'Validasi tidak berhasil',
                'error' => $validate->errors()
            ], 401);
        }

        if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return response()->json([
                'status' => false,
                'message' => 'Email atau Password yang anda masukkan tidak sesuai!',
            ], 401);
        } 

        $user = User::where('email', $request->email)->first();

        return response()->json([
            'status' => true,
            'message' => "Selamat anda telah berhasil login!",
            'token' => $user->createToken('token')->plainTextToken
        ], 200);
        
    }
}
