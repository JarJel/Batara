<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Toko;
use App\Models\ProfilToko;

class TokoController extends Controller
{
    // =========================
    // FORM REGISTER
    // =========================
    public function create()
    {
        if (auth()->user()->toko) {
            return redirect()->route('seller.dashboard');
        }

        return view('seller.register');
    }

    // =========================
    // SIMPAN TOKO
    // =========================
    public function store(Request $request)
    {
        $request->validate([
            'nama_toko' => 'required|max:150',
            'deskripsi' => 'nullable',
            'alamat_toko' => 'nullable',
            'nomor_telepon' => 'nullable'
        ]);

        $user = Auth::user();

        // =========================
        // SIMPAN TOKO
        // =========================
        $toko = Toko::create([
            'id_pengguna' => $user->id_pengguna,
            'nama_toko' => $request->nama_toko,
            'slug_toko' => strtolower(str_replace(' ', '-', $request->nama_toko)),
            'tanggal_daftar' => now()
        ]);

        // =========================
        // SIMPAN PROFIL
        // =========================
        ProfilToko::create([
            'id_toko' => $toko->id_toko,
            'deskripsi' => $request->deskripsi,
            'alamat_toko' => $request->alamat_toko,
            'nomor_telepon' => $request->nomor_telepon
        ]);

        // =========================
        // 🔥 PENTING: REFRESH RELASI
        // =========================
        $user->load('toko');

        // =========================
        // 🔥 JANGAN KE DASHBOARD DULU
        // =========================
        return redirect()->route('seller.register')
            ->with('success', 'Toko berhasil dibuat!');
    }
}