<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;

class CartController extends Controller
{
    public function add(Request $request)
{
    $user = auth()->user();

    $keranjang = \App\Models\Cart::where('id_pengguna', $user->id_pengguna)
        ->where('id_produk', $request->id_produk)
        ->first();

    if ($keranjang) {
        $keranjang->qty += 1;
        $keranjang->save();
    } else {
        \App\Models\Cart::create([
            'id_pengguna' => $user->id_pengguna,
            'id_produk' => $request->id_produk,
            'qty' => 1
        ]);
    }

    // hitung total item
    $total = \App\Models\Cart::where('id_pengguna', $user->id_pengguna)->sum('qty');

    return response()->json([
        'status' => true,
        'total' => $total
    ]);
}

    public function index()
    {
        $user = Auth::user();

        $cartItems = Cart::where('id_pengguna', $user->id_pengguna)
            ->join('produk', 'keranjang.id_produk', '=', 'produk.id_produk')
            ->select('keranjang.*', 'produk.nama_produk', 'produk.harga_dasar')
            ->get();

        $total = 0;
        foreach ($cartItems as $item) {
            $total += $item->harga_dasar * $item->qty;
        }

        return view('user.cart.index', compact('cartItems', 'total'));
    }

    public function delete($id)
    {
        Cart::where('id_keranjang', $id)->delete();
        return back()->with('success', 'Item dihapus dari keranjang');
    }
}
