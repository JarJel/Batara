<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class HomeController extends Controller
{
    public function index()
    {
        $products = Produk::latest()->take(8)->get();

        return view('user.homepage.home', compact('products'));
    }
}
