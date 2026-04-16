<?php

namespace App\Http\Controllers;

use App\Models\Alamat;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Pesanan;
use App\Models\Produk;
use App\Models\ItemPesanan;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    // 🔥 BUY NOW (redirect ke checkout)
    public function buyNow(Request $request)
    {
        return redirect()->route('checkout', [
            'id_produk' => $request->id_produk,
            'qty' => 1
        ]);
    }

    // 🔥 HALAMAN CHECKOUT
    public function checkout(Request $request)
    {
        $user = Auth::user();

        $alamat = Alamat::where('id_pengguna', $user->id_pengguna)->first();
        // =====================
        // CASE 1: BUY NOW
        // =====================
        if ($request->id_produk) {
            $produk = Produk::where('id_produk', $request->id_produk)->first();

            $items = collect([
                (object)[
                    'id_produk' => $produk->id_produk,
                    'nama_produk' => $produk->nama_produk,
                    'harga' => $produk->harga_dasar,
                    'qty' => $request->qty ?? 1
                ]
            ]);
        }
        // =====================
        // CASE 2: DARI CART
        // =====================
        else {
            $items = Cart::where('id_pengguna', $user->id_pengguna)->get()
                ->map(function ($item) {
                    return (object)[
                        'id_produk' => $item->id_produk,
                        'id_varian_produk' => $item->id_varian_produk,
                        'nama_produk' => $item->produk->nama_produk ?? 'Produk',
                        'harga' => $item->produk->harga_dasar ?? 0,
                        'qty' => $item->jumlah_produk ?? 1
                    ];
                });
        }

        $total = $items->sum(function ($item) {
            return $item->harga * $item->qty;
        });

        return view('user.checkout.index', compact('items', 'total', 'alamat'));
    }

    // 🔥 PROSES CHECKOUT
    public function processCheckout(Request $request)
    {
        $user = Auth::user();

        $items = collect(json_decode($request->items));

        $total = collect($items)->sum(function ($item) {
            return $item->harga * $item->qty;
        });

        $id_toko = null;

        if ($items->count() > 0) {
            $produk = Produk::where('id_produk', $items[0]->id_produk)->first();
            $id_toko = $produk->id_toko ?? null;
        }

        // buat pesanan
        $order = Pesanan::create([
            'id_pengguna' => $user->id_pengguna,
            'id_toko' => $id_toko,
            'total_harga_produk' => $total,
            'status' => 'menunggu'
        ]);


        // simpan detail
        foreach ($items as $item) {
            ItemPesanan::create([
                'id_pesanan' => $order->id_pesanan,
                'id_varian_produk' => $item->id_varian_produk,
                'nama_produk_snapshot' => $item->nama_produk,
                'harga_saat_pesan' => $item->harga,
                'jumlah' => $item->qty,
                'berat_per_item_kg' => 0
            ]);
        }

        // kosongkan cart
        Cart::where('id_pengguna', $user->id_pengguna)->delete();

        return redirect('/orders')->with('success', 'Pesanan berhasil dibuat!');
    }

    public function history()
    {
        $user = Auth::user();

        $orders = Pesanan::where('id_pengguna', $user->id_pengguna)
            ->with('items')
            ->orderBy('id_pesanan', 'desc')
            ->get();

        return view('user.orders.history', compact('orders'));
    }
}
