<?php

namespace App\Http\Controllers;

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
                        'nama_produk' => $item->produk->nama_produk ?? 'Produk',
                        'harga' => $item->produk->harga_dasar ?? 0,
                        'qty' => $item->jumlah_produk ?? 1
                    ];
                });
        }

        $total = $items->sum(function ($item) {
            return $item->harga * $item->qty;
        });

        return view('checkout.index', compact('items', 'total'));
    }

    // 🔥 PROSES CHECKOUT
    public function processCheckout(Request $request)
    {
        $user = Auth::user();

        $items = json_decode($request->items);

        $total = collect($items)->sum(function ($item) {
            return $item->harga * $item->qty;
        });

        // buat pesanan
        $order = Pesanan::create([
            'id_pengguna' => $user->id_pengguna,
            'total_harga_produk' => $total,
            'status' => 'menunggu'
        ]);

        // simpan detail
        foreach ($items as $item) {
            ItemPesanan::create([
                'id_pesanan' => $order->id_pesanan,
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
}