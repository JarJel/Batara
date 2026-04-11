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
        return view('homepage.home', compact('products'));
    }
}