<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Session;

class RegisterController extends Controller
{
    public function register() {
    return view("register");
    }

    public function actionRegister(Request $request) {
        $user = User::create([
            'email' => $request->email,
            'name' => $request->name,
            'password'=> Hash::make($request->password),
            'isAdmin' => false
    ]);

    Session::flash('message', 'Akun anda berhasil terdaftar');
    return redirect('home');
    }
}
