<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Alamat;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $alamat = Alamat::where('id_pengguna', $user->id_pengguna)->get();

        return view('user.homepage.profile', compact('user', 'alamat'));
    }

    public function storeAlamat(Request $request)
    {
        $user = Auth::user();

        Alamat::create([
            'id_pengguna' => $user->id_pengguna,
            'nama_penerima' => $request->nama_penerima,
            'no_hp' => $request->no_hp,
            'alamat_lengkap' => $request->alamat_lengkap,
            'kota' => $request->kota,
            'kode_pos' => $request->kode_pos,
        ]);

        return back()->with('success', 'Alamat berhasil ditambahkan');
    }

    public function setDefault($id)
    {
        $user = Auth::user();

        Alamat::where('id_pengguna', $user->id_pengguna)->update(['is_default' => false]);

        Alamat::where('id_alamat', $id)->update(['is_default' => true]);

        return back();
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'nama_lengkap' => 'required',
            'nama_pengguna' => 'required|unique:pengguna,nama_pengguna,' . $user->id_pengguna . ',id_pengguna',
            'email' => 'required|email|unique:pengguna,email,' . $user->id_pengguna . ',id_pengguna',
            'nomor_telepon' => 'nullable|max:20'
        ]);

        $user->update([
            'nama_lengkap' => $request->nama_lengkap,
            'nama_pengguna' => $request->nama_pengguna,
            'email' => $request->email,
            'nomor_telepon' => $request->nomor_telepon
        ]);

        return back()->with('success', 'Profile berhasil diperbarui');
    }

    public function deleteAlamat($id)
    {
        $user = Auth::user();

        $alamat = Alamat::where('id_alamat', $id)
            ->where('id_pengguna', $user->id_pengguna) // 🔥 keamanan
            ->first();

        if (!$alamat) {
            return back()->with('error', 'Alamat tidak ditemukan');
        }

        // 🔥 cek kalau alamat default
        if ($alamat->is_default) {
            // cari alamat lain untuk dijadikan default
            $newDefault = Alamat::where('id_pengguna', $user->id_pengguna)
                ->where('id_alamat', '!=', $id)
                ->first();

            if ($newDefault) {
                $newDefault->update(['is_default' => true]);
            }
        }

        $alamat->delete();

        return back()->with('success', 'Alamat berhasil dihapus');
    }
}
