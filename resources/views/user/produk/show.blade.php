<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $product->nama_produk }} – BataraShop</title>

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

    /* BREADCRUMB */
    .bs-breadcrumb {
      font-size: .8rem;
      color: var(--text-muted);
      margin-bottom: 24px;
      display: flex;
      align-items: center;
      gap: 6px;
      flex-wrap: wrap;
    }

    .bs-breadcrumb a {
      color: var(--primary);
      text-decoration: none;
      font-weight: 600;
    }

    .bs-breadcrumb a:hover {
      color: var(--primary-dark);
    }

    /* LAYOUT */
    .product-layout {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 40px;
      align-items: start;
    }

    /* GAMBAR */
    .img-wrap {
      position: relative;
    }

    .img-main {
      width: 100%;
      aspect-ratio: 1/1;
      border-radius: 16px;
      background: #fff;
      border: 1px solid var(--border);
      overflow: hidden;
    }

    .img-main img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform .4s;
    }

    .img-main img:hover {
      transform: scale(1.04);
    }

    .img-badge {
      position: absolute;
      top: 12px;
      left: 12px;
      background: var(--accent-dark);
      color: #fff;
      font-size: .7rem;
      font-weight: 700;
      padding: 3px 10px;
      border-radius: 50px;
    }

    .img-wish {
      position: absolute;
      top: 12px;
      right: 12px;
      width: 36px;
      height: 36px;
      background: #fff;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      border: none;
      cursor: pointer;
      box-shadow: var(--shadow-sm);
      color: var(--text-muted);
      font-size: .9rem;
      transition: all .2s;
    }

    .img-wish:hover {
      color: var(--accent-dark);
      transform: scale(1.1);
    }

    .img-thumbs {
      display: flex;
      gap: 8px;
      margin-top: 10px;
    }

    .img-thumb {
      width: 64px;
      height: 64px;
      border-radius: 8px;
      background: #fff;
      border: 1.5px solid var(--border);
      overflow: hidden;
      cursor: pointer;
      transition: border-color .2s;
    }

    .img-thumb.active {
      border-color: var(--primary);
    }

    .img-thumb img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    /* INFO */
    .store-tag {
      display: flex;
      align-items: center;
      gap: 6px;
      font-size: .78rem;
      color: var(--primary);
      font-weight: 700;
      margin-bottom: 8px;
    }

    .store-tag span {
      background: rgba(45, 106, 79, .08);
      border-radius: 50px;
      padding: 2px 10px;
    }

    .product-title {
      font-family: 'Fraunces', serif;
      font-size: 1.75rem;
      font-weight: 700;
      color: var(--text);
      line-height: 1.25;
      margin-bottom: 12px;
    }

    .rating-row {
      display: flex;
      align-items: center;
      gap: 10px;
      margin-bottom: 18px;
      flex-wrap: wrap;
    }

    .stars {
      color: #F4A261;
      font-size: .9rem;
    }

    .rating-num {
      font-size: .85rem;
      font-weight: 700;
      color: var(--text);
    }

    .rating-count,
    .sold {
      font-size: .78rem;
      color: var(--text-muted);
    }

    .dot {
      width: 4px;
      height: 4px;
      border-radius: 50%;
      background: var(--border);
    }

    .price-wrap {
      margin-bottom: 20px;
    }

    .price {
      font-family: 'Fraunces', serif;
      font-size: 2rem;
      font-weight: 700;
      color: var(--primary-dark);
    }

    .product-desc {
      font-size: .875rem;
      color: var(--text-muted);
      line-height: 1.75;
      margin-bottom: 24px;
      padding: 14px 16px;
      background: #fff;
      border-radius: 10px;
      border: 1px solid var(--border);
    }

    /* QTY */
    .qty-label {
      font-size: .78rem;
      font-weight: 700;
      color: var(--text-muted);
      margin-bottom: 8px;
    }

    .qty-wrap {
      display: flex;
      align-items: center;
      margin-bottom: 8px;
    }

    .qty-btn {
      width: 36px;
      height: 36px;
      border: 1.5px solid var(--border);
      background: #fff;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1rem;
      font-weight: 700;
      color: var(--text);
      cursor: pointer;
      transition: all .2s;
      flex-shrink: 0;
    }

    .qty-btn:first-child {
      border-radius: 8px 0 0 8px;
    }

    .qty-btn:last-child {
      border-radius: 0 8px 8px 0;
    }

    .qty-btn:hover {
      border-color: var(--primary);
      color: var(--primary);
    }

    .qty-input {
      width: 56px;
      height: 36px;
      border: 1.5px solid var(--border);
      border-left: none;
      border-right: none;
      text-align: center;
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-size: .9rem;
      font-weight: 700;
      color: var(--text);
      background: #fff;
      outline: none;
    }

    .stock-info {
      font-size: .75rem;
      color: var(--text-muted);
      margin-bottom: 20px;
    }

    .stock-info span {
      color: var(--primary);
      font-weight: 700;
    }

    /* BUTTONS */
    .action-row {
      display: flex;
      gap: 10px;
      margin-bottom: 20px;
    }

    .btn-cart {
      flex: 1;
      border: 2px solid var(--primary);
      background: #fff;
      color: var(--primary);
      border-radius: 50px;
      padding: 13px 20px;
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-weight: 700;
      font-size: .9rem;
      cursor: pointer;
      transition: all .2s;
    }

    .btn-cart:hover {
      background: rgba(45, 106, 79, .06);
    }

    .btn-buy {
      flex: 1;
      background: linear-gradient(135deg, var(--primary), var(--primary-light));
      color: #fff;
      border: none;
      border-radius: 50px;
      padding: 13px 20px;
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-weight: 700;
      font-size: .9rem;
      cursor: pointer;
      transition: all .2s;
    }

    .btn-buy:hover {
      opacity: .9;
    }

    /* TRUST */
    .trust-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 8px;
    }

    .trust-item {
      display: flex;
      align-items: center;
      gap: 8px;
      background: #fff;
      border: 1px solid var(--border);
      border-radius: 10px;
      padding: 10px 12px;
      font-size: .75rem;
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

    .btn-loading {
      opacity: 0.7;
      pointer-events: none;
    }

    .spinner {
      width: 14px;
      height: 14px;
      border: 2px solid #fff;
      border-top: 2px solid transparent;
      border-radius: 50%;
      display: inline-block;
      animation: spin 0.6s linear infinite;
    }

    @keyframes spin {
      to {
        transform: rotate(360deg);
      }
    }

    @media (max-width: 991.98px) {
      .product-layout {
        grid-template-columns: 1fr;
      }
    }

    @media (max-width: 575.98px) {
      .trust-grid {
        grid-template-columns: 1fr;
      }

      .product-title {
        font-size: 1.4rem;
      }
    }
  </style>
</head>

<body>

  @include('user.partials.navbar')

  <div class="container py-4">

    {{-- BREADCRUMB --}}
    <div class="bs-breadcrumb">
      <a href="{{ url('/') }}">Beranda</a>
      <i class="fa-solid fa-chevron-right" style="font-size:.6rem"></i>
      <a href="{{ url('/produk') }}">Produk</a>
      <i class="fa-solid fa-chevron-right" style="font-size:.6rem"></i>
      <span style="color:var(--text);font-weight:600;">{{ $product->nama_produk }}</span>
    </div>

    <div class="product-layout">

      {{-- KIRI: GAMBAR --}}
      <div class="img-wrap">
        <div class="img-main">
          <img src="https://via.placeholder.com/500" alt="{{ $product->nama_produk }}" id="mainImg">
        </div>
        <span class="img-badge">Terlaris</span>
        <button class="img-wish" id="wishBtn" onclick="toggleWish()">
          <i class="fa-regular fa-heart" id="wishIcon"></i>
        </button>
        <div class="img-thumbs">
          <div class="img-thumb active">
            <img src="https://via.placeholder.com/120" alt="">
          </div>
        </div>
      </div>

      {{-- KANAN: INFO --}}
      <div>
        <div class="store-tag">
          <i class="fa-solid fa-store"></i>
          <span>BUMDes Store</span>
        </div>

        <h1 class="product-title">{{ $product->nama_produk }}</h1>

        <div class="rating-row">
          <div class="stars">
            @for($i = 0; $i < 5; $i++) ★ @endfor
              </div>
              <span class="rating-num">{{ $product->rating_produk ?? '5.0' }}</span>
              <div class="dot"></div>
              <span class="rating-count">{{ $product->jumlah_rating_produk ?? 0 }} ulasan</span>
              <div class="dot"></div>
              <span class="sold">{{ $product->terjual ?? 0 }} terjual</span>
          </div>

          <div class="price-wrap">
            <span class="price">Rp {{ number_format($product->harga_dasar) }}</span>
          </div>

          <div class="product-desc">
            {{ $product->deskripsi_produk ?? 'Produk berkualitas terbaik langsung dari pengrajin desa. Dibuat dengan bahan pilihan dan proses yang terjaga kualitasnya.' }}
          </div>

          <form id="formOrder" method="POST">
            @csrf
            <input type="hidden" name="id_produk" value="{{ $product->id_produk }}">

            <div class="qty-label">Jumlah</div>
            <div class="qty-wrap">
              <button type="button" class="qty-btn" onclick="kurang()">−</button>
              <input type="number" id="qty" name="qty" value="1" min="1" class="qty-input">
              <button type="button" class="qty-btn" onclick="tambah()">+</button>
            </div>
            <div class="stock-info">
              Stok tersedia: <span>{{ $product->stok ?? '–' }} unit</span>
            </div>

            <div class="action-row">
              <button type="button" id="btn-cart" onclick="tambahKeranjang({{ $product->id_produk }})" class="btn-cart">
                🛒 Keranjang
              </button>
              <button type="submit"
                formaction="{{ route('buy.now') }}"
                class="btn-buy">
                <i class="fa-solid fa-bolt me-2"></i> Beli Sekarang
              </button>
            </div>
          </form>

          <div class="trust-grid">
            <div class="trust-item">
              <div class="trust-icon"><i class="fa-solid fa-shield-halved"></i></div>
              Produk 100% original
            </div>
            <div class="trust-item">
              <div class="trust-icon"><i class="fa-solid fa-truck"></i></div>
              Gratis ongkir min. Rp 100rb
            </div>
            <div class="trust-item">
              <div class="trust-icon"><i class="fa-solid fa-rotate-left"></i></div>
              Garansi uang kembali
            </div>
            <div class="trust-item">
              <div class="trust-icon"><i class="fa-solid fa-location-dot"></i></div>
              Produk langsung dari desa
            </div>
          </div>

        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
      function tambah() {
        const qty = document.getElementById('qty');
        qty.value = parseInt(qty.value) + 1;
      }

      function kurang() {
        const qty = document.getElementById('qty');
        if (qty.value > 1) qty.value = parseInt(qty.value) - 1;
      }

      function toggleWish() {
        const btn = document.getElementById('wishBtn');
        const icon = document.getElementById('wishIcon');
        const active = btn.getAttribute('data-active') === '1';
        if (active) {
          icon.classList.replace('fa-solid', 'fa-regular');
          btn.style.color = '';
          btn.removeAttribute('data-active');
        } else {
          icon.classList.replace('fa-regular', 'fa-solid');
          btn.style.color = '#E76F51';
          btn.setAttribute('data-active', '1');
        }
      }
    </script>
</body>

</html>