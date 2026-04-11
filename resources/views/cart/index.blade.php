<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang – BataraShop</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Fraunces:ital,wght@0,700;1,400&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary: #2D6A4F;
            --primary-light: #40916C;
            --primary-dark: #1B4332;
            --accent: #F4A261;
            --accent-dark: #E76F51;
            --bg: #F8FAF8;
            --surface: #FFFFFF;
            --text: #1A2E1A;
            --text-muted: #6B7C6B;
            --border: #E2EBE2;
            --radius-sm: 8px;
            --radius-md: 14px;
            --radius-lg: 20px;
            --shadow-sm: 0 2px 8px rgba(45, 106, 79, .08);
            --shadow-md: 0 6px 24px rgba(45, 106, 79, .12);
            --shadow-lg: 0 16px 48px rgba(45, 106, 79, .16);
        }

        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: var(--bg);
            color: var(--text);
        }

        /* PAGE HEADER */
        .cart-page-header {
            background: linear-gradient(135deg, var(--primary-dark), var(--primary-light));
            padding: 32px 0 28px;
        }

        .cart-page-header .section-tag {
            display: inline-block;
            background: rgba(255, 255, 255, .2);
            color: #fff;
            border-radius: 50px;
            padding: 3px 12px;
            font-size: .75rem;
            font-weight: 700;
            letter-spacing: .4px;
            text-transform: uppercase;
            margin-bottom: 10px;
        }

        .cart-page-header h1 {
            font-family: 'Fraunces', serif;
            font-size: 1.6rem;
            font-weight: 700;
            color: #fff;
            margin: 0 0 4px;
        }

        .cart-page-header p {
            color: rgba(255, 255, 255, .75);
            font-size: .875rem;
            margin: 0;
        }

        /* BREADCRUMB */
        .bs-breadcrumb {
            font-size: .8rem;
            color: rgba(255, 255, 255, .7);
            margin-bottom: 16px;
        }

        .bs-breadcrumb a {
            color: rgba(255, 255, 255, .9);
            text-decoration: none;
            font-weight: 600;
        }

        .bs-breadcrumb a:hover {
            color: var(--accent);
        }

        /* CART CARD */
        .cart-card {
            background: #fff;
            border-radius: var(--radius-md);
            border: 1px solid var(--border);
            overflow: hidden;
        }

        .cart-card-header {
            padding: 16px 20px;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .cart-card-header h2 {
            font-family: 'Fraunces', serif;
            font-size: 1rem;
            font-weight: 700;
            color: var(--text);
            margin: 0;
        }

        /* CART ITEM */
        .cart-item {
            display: grid;
            grid-template-columns: 72px 1fr auto;
            gap: 14px;
            padding: 16px 20px;
            border-bottom: 1px solid var(--border);
            align-items: center;
        }

        .cart-item:last-child {
            border-bottom: none;
        }

        .cart-item-img {
            width: 72px;
            height: 72px;
            border-radius: 10px;
            background: var(--bg);
            border: 1px solid var(--border);
            object-fit: cover;
        }

        .cart-item-store {
            font-size: .72rem;
            color: var(--primary);
            font-weight: 600;
            margin-bottom: 3px;
        }

        .cart-item-name {
            font-weight: 700;
            font-size: .9rem;
            color: var(--text);
            margin-bottom: 4px;
        }

        .cart-item-price {
            font-family: 'Fraunces', serif;
            font-size: 1rem;
            font-weight: 700;
            color: var(--primary-dark);
        }

        .cart-item-qty {
            background: var(--bg);
            border: 1px solid var(--border);
            border-radius: 50px;
            padding: 2px 12px;
            font-size: .8rem;
            font-weight: 600;
            color: var(--text-muted);
            display: inline-block;
            margin-top: 4px;
        }

        .cart-item-right {
            text-align: right;
        }

        .cart-item-subtotal-label {
            font-size: .72rem;
            color: var(--text-muted);
            margin-bottom: 2px;
        }

        .cart-item-subtotal {
            font-family: 'Fraunces', serif;
            font-size: 1rem;
            font-weight: 700;
            color: var(--primary-dark);
        }

        .btn-hapus {
            background: none;
            border: 1.5px solid #FECDD3;
            color: var(--accent-dark);
            border-radius: 50px;
            padding: 5px 14px;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: .75rem;
            font-weight: 700;
            cursor: pointer;
            margin-top: 8px;
            transition: all .2s;
        }

        .btn-hapus:hover {
            background: #FFF1F2;
            border-color: var(--accent-dark);
        }

        /* SUMMARY CARD */
        .summary-card {
            background: #fff;
            border-radius: var(--radius-md);
            border: 1px solid var(--border);
            overflow: hidden;
            position: sticky;
            top: 20px;
        }

        .summary-header {
            background: linear-gradient(135deg, var(--primary-dark), var(--primary));
            padding: 16px 20px;
        }

        .summary-header h3 {
            font-family: 'Fraunces', serif;
            font-size: 1rem;
            font-weight: 700;
            color: #fff;
            margin: 0;
        }

        .summary-body {
            padding: 20px;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 8px 0;
            font-size: .875rem;
        }

        .summary-row .label {
            color: var(--text-muted);
        }

        .summary-row .val {
            font-weight: 600;
            color: var(--text);
        }

        .summary-row.total {
            border-top: 1.5px solid var(--border);
            margin-top: 8px;
            padding-top: 14px;
        }

        .summary-row.total .label {
            font-weight: 700;
            font-size: .95rem;
            color: var(--text);
        }

        .summary-row.total .val {
            font-family: 'Fraunces', serif;
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--primary-dark);
        }

        .btn-checkout {
            width: 100%;
            background: linear-gradient(135deg, var(--primary), var(--primary-light));
            color: #fff;
            border: none;
            border-radius: 50px;
            padding: 14px;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 700;
            font-size: .95rem;
            cursor: pointer;
            margin-top: 16px;
        }

        .btn-checkout:hover {
            opacity: .9;
        }

        .btn-lanjut-belanja {
            width: 100%;
            background: none;
            border: 1.5px solid var(--border);
            color: var(--primary);
            border-radius: 50px;
            padding: 11px;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 600;
            font-size: .875rem;
            cursor: pointer;
            margin-top: 10px;
        }

        /* TRUST */
        .trust-list {
            border-top: 1px solid var(--border);
            margin-top: 20px;
            padding-top: 16px;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .trust-item {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: .78rem;
            color: var(--text-muted);
        }

        .trust-icon {
            width: 28px;
            height: 28px;
            background: #E8F5E9;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            font-size: 12px;
            flex-shrink: 0;
        }

        /* EMPTY STATE */
        .cart-empty {
            background: #fff;
            border-radius: var(--radius-md);
            border: 1.5px dashed var(--border);
            padding: 64px 24px;
            text-align: center;
        }

        .cart-empty i {
            font-size: 3rem;
            color: var(--border);
            margin-bottom: 16px;
        }

        .cart-empty h3 {
            font-family: 'Fraunces', serif;
            font-size: 1.2rem;
            color: var(--text);
            margin: 0 0 6px;
        }

        .cart-empty p {
            color: var(--text-muted);
            font-size: .875rem;
            margin: 0 0 20px;
        }

        .btn-mulai-belanja {
            background: linear-gradient(135deg, var(--primary), var(--primary-light));
            color: #fff;
            border: none;
            border-radius: 50px;
            padding: 11px 28px;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 700;
            font-size: .875rem;
            text-decoration: none;
        }
    </style>
</head>

<body>

    {{-- NAVBAR --}}
    @include('partials.navbar')

    {{-- PAGE HEADER --}}
    <div class="cart-page-header">
        <div class="container">
            <div class="bs-breadcrumb mb-2">
                <a href="{{ url('/') }}">Beranda</a>
                <i class="fa-solid fa-chevron-right mx-1" style="font-size:.65rem"></i>
                <span>Keranjang Saya</span>
            </div>
            <div class="section-tag">Keranjang</div>
            <h1><i class="fa-solid fa-cart-shopping me-2"></i>Keranjang Saya</h1>
            <p>{{ $cartItems->count() }} produk siap untuk di-checkout</p>
        </div>
    </div>

    {{-- MAIN CONTENT --}}
    <div class="container py-4">

        @if(session('success'))
        <div class="alert d-flex align-items-center gap-2 mb-3"
            style="background:#E8F5E9;border:1px solid #A5D6A7;color:#1B5E20;border-radius:10px;font-size:.875rem;font-weight:600;">
            <i class="fa-solid fa-circle-check"></i>
            {{ session('success') }}
        </div>
        @endif

        @if($cartItems->isEmpty())

        <div class="cart-empty">
            <i class="fa-solid fa-cart-shopping"></i>
            <h3>Keranjang Masih Kosong</h3>
            <p>Yuk, mulai belanja produk unggulan dari BUMDes se-Indonesia!</p>
            <a href="{{ url('/produk') }}" class="btn-mulai-belanja">
                <i class="fa-solid fa-store me-1"></i> Mulai Belanja
            </a>
        </div>

        @else

        <div class="row g-4">

            {{-- KIRI: LIST PRODUK --}}
            <div class="col-lg-8">
                <div class="cart-card">
                    <div class="cart-card-header">
                        <h2>Daftar Produk</h2>
                        <span class="text-muted" style="font-size:.8rem">{{ $cartItems->count() }} item</span>
                    </div>

                    @foreach($cartItems as $item)
                    <div class="cart-item">
                        <img src="https://via.placeholder.com/72" alt="{{ $item->nama_produk }}" class="cart-item-img">

                        <div>
                            <div class="cart-item-store">
                                <i class="fa-solid fa-store me-1"></i> BUMDes Store
                            </div>
                            <div class="cart-item-name">{{ $item->nama_produk }}</div>
                            <div class="cart-item-price">Rp {{ number_format($item->harga_dasar) }}</div>
                            <div class="cart-item-qty">Qty: {{ $item->qty }}</div>
                        </div>

                        <div class="cart-item-right">
                            <div class="cart-item-subtotal-label">Subtotal</div>
                            <div class="cart-item-subtotal">Rp {{ number_format($item->harga_dasar * $item->qty) }}</div>
                            <form method="POST" action="{{ route('cart.delete', $item->id_keranjang) }}">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn-hapus">
                                    <i class="fa-solid fa-trash-can me-1"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>

            {{-- KANAN: RINGKASAN --}}
            <div class="col-lg-4">
                <div class="summary-card">
                    <div class="summary-header">
                        <h3><i class="fa-solid fa-receipt me-2"></i>Ringkasan Pesanan</h3>
                    </div>
                    <div class="summary-body">
                        <div class="summary-row">
                            <span class="label">Subtotal ({{ $cartItems->count() }} produk)</span>
                            <span class="val">Rp {{ number_format($total) }}</span>
                        </div>
                        <div class="summary-row">
                            <span class="label">Ongkos Kirim</span>
                            <span class="val">Rp 0/span>
                        </div>
                        <div class="summary-row">
                            <span class="label">Diskon Promo</span>
                            <span class="val" style="color:var(--primary)">– Rp 0</span>
                        </div>
                        <div class="summary-row total">
                            <span class="label">Total</span>
                            <span class="val">Rp {{ number_format($total) }}</span>
                        </div>

                        <form action="{{ route('checkout') }}">
                            @csrf
                            <button class="btn-checkout">
                                <i class="fa-solid fa-lock me-2"></i> Lanjut ke Checkout
                            </button>
                        </form>

                        <a href="{{ url('/produk') }}" class="btn-lanjut-belanja d-block text-center text-decoration-none">
                            Lanjut Belanja
                        </a>

                        <div class="trust-list">
                            <div class="trust-item">
                                <div class="trust-icon"><i class="fa-solid fa-shield-halved"></i></div>
                                Pembayaran aman & terenkripsi
                            </div>
                            <div class="trust-item">
                                <div class="trust-icon"><i class="fa-solid fa-truck"></i></div>
                                Gratis ongkir min. Rp 100.000
                            </div>
                            <div class="trust-item">
                                <div class="trust-icon"><i class="fa-solid fa-rotate-left"></i></div>
                                Garansi uang kembali 7 hari
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>