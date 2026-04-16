<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class ProdukController extends Controller
{
    // tampilkan semua produk
    public function index()
    {
        $products = Produk::all();
        return view('user.homepage.home', compact('products'));
    }

    public function show($id)
    {
        $product = Produk::where('id_produk', $id)->firstOrFail();
        return view('user.produk.show', compact('product'));
    }
}
