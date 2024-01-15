<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function register()
    {
        return view('login.register');
    }

    public function login_action(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            session(['key' => 'value']);

            return redirect()->intended('/karyawan');
        }

        return back()->withErrors([
            'email' => 'Email Atau Password Salah',
        ]);
    }

    public function register_action(Request $request)
    {
        $request->validate([
            'email' => 'required|unique:tb_user',
            'password' => 'required',
        ]);

        $user = new User([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => '2',
        ]);
        $user->save();

        return redirect('/login')->with('success', 'Akun berhasil dibuat, Silahkan Login!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('success','Anda Berhasil Logout');
    }
}
