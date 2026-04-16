<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Produk;
use App\Models\Kategori;
use App\Models\Toko;
use App\Models\VarianProduk;

class SellerProductController extends Controller
{
    public function index()
    {
        $toko = auth()->user()->toko;

        $produk = Produk::with('varian')
            ->where('id_toko', $toko->id_toko)
            ->get();

        return view('seller.produk.index', compact('produk'));
    }

    public function create()
    {
        $kategori = Kategori::whereNull('id_kategori_induk')->get();

        return view('seller.produk.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required',
            'harga_dasar' => 'required|numeric',
            'id_kategori' => 'required|exists:kategori,id_kategori'
        ]);

        $toko = auth()->user()->toko;

        $produk = Produk::create([
            'nama_produk' => $request->nama_produk,
            'harga_dasar' => $request->harga_dasar,
            'deskripsi' => $request->deskripsi,
            'id_toko' => $toko->id_toko,
            'id_kategori' => $request->id_kategori,
            'berat' => $request->berat ?? 0
        ]);

        // ======================
        // SIMPAN VARIAN (OPSIONAL)
        // ======================
        if ($request->varian_nama) {
            foreach ($request->varian_nama as $i => $nama) {

                if ($nama) { // skip kalau kosong
                    VarianProduk::create([
                        'id_produk' => $produk->id_produk,
                        'nama_varian' => $nama,
                        'harga_varian' => $request->varian_harga[$i] ?? null,
                        'stok_varian' => $request->varian_stok[$i] ?? 0
                    ]);
                }
            }
        }

        return redirect()->route('seller.produk.index')
            ->with('success', 'Produk + varian berhasil ditambahkan');
    }

    public function edit($id)
    {
        $toko = auth()->user()->toko;

        $produk = Produk::where('id_produk', $id)
            ->where('id_toko', $toko->id_toko)
            ->firstOrFail();

        return view('seller.produk.edit', compact('produk'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_produk' => 'required',
            'harga_dasar' => 'required|numeric'
        ]);

        $toko = auth()->user()->toko;

        $produk = Produk::where('id_produk', $id)
            ->where('id_toko', $toko->id_toko)
            ->firstOrFail();

        $produk->update($request->only('nama_produk', 'harga_dasar', 'deskripsi'));

        return redirect()->route('seller.produk.index')
            ->with('success', 'Produk berhasil diupdate');
    }

    public function getVarian($id)
    {
        $produk = \App\Models\Produk::with('varian')->where('id_produk', $id)->first();

        if (!$produk) {
            return response()->json([
                'status' => false,
                'message' => 'Produk tidak ditemukan'
            ]);
        }

        return response()->json([
            'status' => true,
            'nama_produk' => $produk->nama_produk,
            'varian' => $produk->varian
        ]);
    }

    public function destroy($id)
    {
        $toko = auth()->user()->toko;

        $produk = Produk::where('id_produk', $id)
            ->where('id_toko', $toko->id_toko)
            ->firstOrFail();

        $produk->delete();

        return back()->with('success', 'Produk dihapus');
    }
}
