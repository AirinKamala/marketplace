<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class AuthController extends Controller
{

    public function register(Request $request)
    {
        try{
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email',
            'password' => 'required|string|min:6'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $user = User::create([
            "email" => $request->email,
            'name' => $request->name,
            'password' => Hash::make($request->password),
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json([
            'success' => true,
            'message' => 'User berhasil didaftarkan',
            'data' => $user,
            'access_token' => $token,
        ], 201);
        } catch (\Exception $e) {
            return response()->json([
            'success' => false,
            'message' => 'Terjadi kesalahan pada server.',
            'error'   => $e->getMessage() // Hapus line ini saat production (security)
        ], 500);
        }
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "email" => 'required|email',
            'password' => 'required'
        ]);

        if($validator->fails()) response()->json( $validator->errors(), 422);

        $user = User::where('email', $request->email)->first();
        if($user || !Hash::check($request->getPassword(), $user->password)) response()->json([
            'success' => false,
            'message' => 'Password anda salah'
        ], 401);

        $user->tokens()->delete();
        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json([
            'success'=> true,
            'message'=> 'Login berhasil',
            'data' => $user,
            'access_token' => $token,
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'success'=> true,
            'message'=> 'Logout berhasil',
            'data' => $request->user(),
        ],201);
    }
}
