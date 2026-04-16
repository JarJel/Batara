<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Produk;
use App\Models\Pesanan;
use App\Models\Toko;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $toko = auth()->user()->toko;

        if (!$toko) {
            return redirect()->route('seller.register');
        }

        return view('seller.dashboard', [
            'totalProduk' => 0,
            'totalOrder' => 0,
            'totalPendapatan' => 0
        ]);
    }
}
