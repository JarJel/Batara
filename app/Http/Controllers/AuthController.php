<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{   
    public function indexLogin() {
        return view('/loginAllUser/login');
    }

    // tampilkan halaman register
    public function indexRegister()
    {
        return view('/loginAllUser/register');
    }

    // proses register
    public function store(Request $request)
    {

        $request->validate([
            'nama_lengkap' => 'required',
            'nama_pengguna' => 'required|unique:pengguna',
            'email' => 'required|email|unique:pengguna',
            'kata_sandi' => 'required|min:6'
        ]);

        $user = User::create([
            'nama_lengkap' => $request->nama_lengkap,
            'nama_pengguna' => $request->nama_pengguna,
            'email' => $request->email,
            'kata_sandi' => Hash::make($request->kata_sandi)
        ]);
        // $role = Role::where('nama_role', 'user')->first();
        // $user->roles()->attach($role->id_role);

        return redirect('/login')->with('success', 'Register berhasil!');
    }

    // proses login
    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->kata_sandi)) {
            Auth::login($user);
            return redirect('/');
        }

        return back()->with('error', 'Email atau password salah');
    }

    // logout
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
