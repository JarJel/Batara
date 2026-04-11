<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Checkout – BataraShop</title>

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
      --shadow-sm: 0 2px 8px rgba(45,106,79,.08);
      --shadow-md: 0 6px 24px rgba(45,106,79,.12);
      --shadow-lg: 0 16px 48px rgba(45,106,79,.16);
    }

    *, *::before, *::after { box-sizing: border-box; }

    body {
      font-family: 'Plus Jakarta Sans', sans-serif;
      background: var(--bg);
      color: var(--text);
    }

    /* PAGE HEADER */
    .page-header {
      background: linear-gradient(135deg, var(--primary-dark), var(--primary-light));
      padding: 32px 0 28px;
    }
    .page-header .section-tag {
      display: inline-block;
      background: rgba(255,255,255,.2);
      color: #fff;
      border-radius: 50px;
      padding: 3px 12px;
      font-size: .75rem;
      font-weight: 700;
      letter-spacing: .4px;
      text-transform: uppercase;
      margin-bottom: 10px;
    }
    .page-header h1 {
      font-family: 'Fraunces', serif;
      font-size: 1.6rem;
      font-weight: 700;
      color: #fff;
      margin: 0 0 4px;
    }
    .page-header p {
      color: rgba(255,255,255,.75);
      font-size: .875rem;
      margin: 0 0 20px;
    }
    .bs-breadcrumb {
      font-size: .8rem;
      color: rgba(255,255,255,.7);
      margin-bottom: 14px;
    }
    .bs-breadcrumb a {
      color: rgba(255,255,255,.9);
      text-decoration: none;
      font-weight: 600;
    }
    .bs-breadcrumb a:hover { color: var(--accent); }

    /* STEPS */
    .checkout-steps {
      display: flex;
      align-items: center;
      gap: 0;
    }
    .checkout-step {
      display: flex;
      align-items: center;
      gap: 6px;
      font-size: .8rem;
      font-weight: 600;
      color: rgba(255,255,255,.5);
    }
    .checkout-step.active { color: #fff; }
    .checkout-step.done   { color: rgba(255,255,255,.7); }
    .checkout-step .num {
      width: 24px; height: 24px;
      border-radius: 50%;
      border: 2px solid rgba(255,255,255,.3);
      display: flex; align-items: center; justify-content: center;
      font-size: .72rem; font-weight: 700;
    }
    .checkout-step.active .num { background: #fff; color: var(--primary-dark); border-color: #fff; }
    .checkout-step.done   .num { background: rgba(255,255,255,.2); border-color: rgba(255,255,255,.5); }
    .checkout-step-line {
      width: 32px; height: 2px;
      background: rgba(255,255,255,.2);
      margin: 0 6px;
    }
    .checkout-step-line.done { background: rgba(255,255,255,.5); }

    /* LAYOUT */
    .checkout-layout {
      display: grid;
      grid-template-columns: 1fr 340px;
      gap: 24px;
      align-items: start;
    }

    /* CARD */
    .co-card {
      background: #fff;
      border-radius: var(--radius-md);
      border: 1px solid var(--border);
      overflow: hidden;
      margin-bottom: 16px;
    }
    .co-card:last-child { margin-bottom: 0; }
    .co-card-header {
      padding: 16px 20px;
      border-bottom: 1px solid var(--border);
      display: flex;
      align-items: center;
      gap: 10px;
    }
    .co-card-header h2 {
      font-family: 'Fraunces', serif;
      font-size: 1rem;
      font-weight: 700;
      color: var(--text);
      margin: 0;
    }
    .step-badge {
      width: 24px; height: 24px;
      border-radius: 50%;
      background: var(--primary);
      color: #fff;
      display: flex; align-items: center; justify-content: center;
      font-size: .72rem; font-weight: 700;
      flex-shrink: 0;
    }

    /* CHECKOUT ITEMS */
    .co-item {
      display: grid;
      grid-template-columns: 52px 1fr auto;
      gap: 12px;
      padding: 14px 20px;
      border-bottom: 1px solid var(--border);
      align-items: center;
    }
    .co-item:last-child { border-bottom: none; }
    .co-item-img {
      width: 52px; height: 52px;
      border-radius: 8px;
      background: var(--bg);
      border: 1px solid var(--border);
      object-fit: cover;
    }
    .co-item-store {
      font-size: .7rem; color: var(--primary);
      font-weight: 600; margin-bottom: 2px;
    }
    .co-item-name {
      font-weight: 700; font-size: .875rem;
      color: var(--text); margin-bottom: 4px;
      line-height: 1.35;
    }
    .co-item-qty {
      background: var(--bg);
      border: 1px solid var(--border);
      border-radius: 50px;
      padding: 1px 10px;
      font-size: .72rem; font-weight: 600;
      color: var(--text-muted);
    }
    .co-item-subtotal {
      font-family: 'Fraunces', serif;
      font-size: .95rem; font-weight: 700;
      color: var(--primary-dark);
      text-align: right;
    }
    .co-item-sublabel {
      font-size: .68rem; color: var(--text-muted);
      text-align: right; margin-bottom: 2px;
    }

    /* ADDRESS FORM */
    .co-address-body { padding: 16px 20px; }
    .co-form-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 12px;
    }
    .co-form-group { display: flex; flex-direction: column; gap: 4px; }
    .co-form-group.full { grid-column: 1 / -1; }
    .co-form-group label {
      font-size: .78rem; font-weight: 600;
      color: var(--text-muted);
    }
    .co-form-group input,
    .co-form-group select,
    .co-form-group textarea {
      border: 1.5px solid var(--border);
      border-radius: var(--radius-sm);
      padding: 9px 12px;
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-size: .875rem;
      color: var(--text);
      outline: none;
      background: #fff;
      transition: border-color .2s;
    }
    .co-form-group input:focus,
    .co-form-group select:focus,
    .co-form-group textarea:focus {
      border-color: var(--primary-light);
      box-shadow: 0 0 0 3px rgba(64,145,108,.08);
    }
    .co-form-group textarea { resize: none; height: 70px; }

    /* SHIPPING OPTIONS */
    .co-shipping-body {
      padding: 16px 20px;
      display: flex;
      flex-direction: column;
      gap: 8px;
    }
    .ship-option {
      border: 1.5px solid var(--border);
      border-radius: 10px;
      padding: 12px 14px;
      display: flex;
      align-items: center;
      gap: 10px;
      cursor: pointer;
      transition: border-color .2s, background .2s;
    }
    .ship-option:has(input:checked),
    .ship-option:hover {
      border-color: var(--primary-light);
      background: rgba(45,106,79,.03);
    }
    .ship-option input[type=radio] {
      accent-color: var(--primary);
      width: 16px; height: 16px;
      flex-shrink: 0; cursor: pointer;
    }
    .ship-name { font-weight: 700; font-size: .875rem; color: var(--text); }
    .ship-eta  { font-size: .75rem; color: var(--text-muted); }
    .ship-price {
      margin-left: auto;
      font-family: 'Fraunces', serif;
      font-size: .95rem; font-weight: 700;
      color: var(--primary-dark);
    }
    .ship-free {
      margin-left: auto;
      font-size: .8rem; font-weight: 700;
      color: var(--primary);
      background: rgba(45,106,79,.08);
      border-radius: 50px;
      padding: 2px 10px;
    }

    /* PAYMENT OPTIONS */
    .co-payment-body { padding: 16px 20px; }
    .pay-group { margin-bottom: 20px; }
    .pay-group:last-child { margin-bottom: 0; }
    .pay-group-label {
      font-size: .75rem; font-weight: 700;
      color: var(--text-muted);
      text-transform: uppercase;
      letter-spacing: .5px;
      margin-bottom: 10px;
    }
    .pay-options-grid {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 8px;
    }
    .pay-option {
      border: 1.5px solid var(--border);
      border-radius: 10px;
      padding: 10px 8px;
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 6px;
      cursor: pointer;
      transition: all .2s;
      position: relative;
    }
    .pay-option:has(input:checked),
    .pay-option:hover {
      border-color: var(--primary-light);
      background: rgba(45,106,79,.03);
    }
    .pay-option:has(input:checked)::after {
      content: '';
      position: absolute;
      top: 6px; right: 6px;
      width: 8px; height: 8px;
      border-radius: 50%;
      background: var(--primary);
    }
    .pay-option input { display: none; }
    .pay-icon {
      width: 44px; height: 28px;
      border-radius: 6px;
      display: flex; align-items: center; justify-content: center;
      font-size: .65rem; font-weight: 800;
      color: #fff; letter-spacing: .3px;
    }
    .pay-icon.bca     { background: #006CB8; }
    .pay-icon.bni     { background: #EA7926; }
    .pay-icon.bri     { background: #00529C; }
    .pay-icon.mandiri { background: #003D7A; }
    .pay-icon.va      { background: #6B6B6B; }
    .pay-icon.gopay   { background: #00AED6; }
    .pay-icon.ovo     { background: #4C2A86; }
    .pay-icon.dana    { background: #118EEA; }
    .pay-icon.cod     { background: var(--primary); }
    .pay-name {
      font-size: .72rem; font-weight: 700;
      color: var(--text); text-align: center;
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
      font-size: 1rem; font-weight: 700;
      color: #fff; margin: 0;
    }
    .summary-body { padding: 20px; }
    .summary-row {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 7px 0;
      font-size: .875rem;
    }
    .summary-row .label { color: var(--text-muted); }
    .summary-row .val   { font-weight: 600; color: var(--text); }
    .summary-row .val.green { color: var(--primary); }
    .summary-row.total {
      border-top: 1.5px solid var(--border);
      margin-top: 8px;
      padding-top: 14px;
    }
    .summary-row.total .label { font-weight: 700; font-size: .95rem; color: var(--text); }
    .summary-row.total .val {
      font-family: 'Fraunces', serif;
      font-size: 1.25rem; font-weight: 700;
      color: var(--primary-dark);
    }
    .btn-checkout-now {
      width: 100%;
      background: linear-gradient(135deg, var(--primary), var(--primary-light));
      color: #fff;
      border: none;
      border-radius: 50px;
      padding: 14px;
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-weight: 700; font-size: .95rem;
      cursor: pointer;
      margin-top: 16px;
    }
    .btn-checkout-now:hover { opacity: .9; }

    .trust-list {
      border-top: 1px solid var(--border);
      margin-top: 16px; padding-top: 14px;
      display: flex; flex-direction: column; gap: 8px;
    }
    .trust-item {
      display: flex; align-items: center; gap: 8px;
      font-size: .75rem; color: var(--text-muted);
    }
    .trust-icon {
      width: 26px; height: 26px;
      background: #E8F5E9;
      border-radius: 50%;
      display: flex; align-items: center; justify-content: center;
      color: var(--primary); font-size: 11px; flex-shrink: 0;
    }

    @media (max-width: 991.98px) {
      .checkout-layout { grid-template-columns: 1fr; }
    }
    @media (max-width: 575.98px) {
      .co-form-grid { grid-template-columns: 1fr; }
      .pay-options-grid { grid-template-columns: repeat(3, 1fr); }
      .co-item { grid-template-columns: 48px 1fr auto; }
    }
  </style>
</head>

<body>

  @include('partials.navbar')

  {{-- PAGE HEADER --}}
  <div class="page-header">
    <div class="container">
      <div class="bs-breadcrumb">
        <a href="{{ url('/') }}">Beranda</a>
        <i class="fa-solid fa-chevron-right mx-1" style="font-size:.65rem"></i>
        <a href="{{ route('cart.index') }}">Keranjang</a>
        <i class="fa-solid fa-chevron-right mx-1" style="font-size:.65rem"></i>
        <span>Checkout</span>
      </div>
      <div class="section-tag">Checkout</div>
      <h1><i class="fa-solid fa-bag-shopping me-2"></i>Selesaikan Pesanan</h1>
      <p>Lengkapi data pengiriman dan pilih metode pembayaran</p>
      <div class="checkout-steps">
        <div class="checkout-step done">
          <div class="num"><i class="fa-solid fa-check" style="font-size:.6rem"></i></div>
          <span>Keranjang</span>
        </div>
        <div class="checkout-step-line done"></div>
        <div class="checkout-step active">
          <div class="num">2</div>
          <span>Checkout</span>
        </div>
        <div class="checkout-step-line"></div>
        <div class="checkout-step">
          <div class="num">3</div>
          <span>Konfirmasi</span>
        </div>
      </div>
    </div>
  </div>

  {{-- MAIN --}}
  <div class="container py-4">
    <form method="POST" action="{{ route('checkout.process') }}">
      @csrf
      <input type="hidden" name="items" value='@json($items)'>

      <div class="checkout-layout">

        {{-- KIRI --}}
        <div>

          {{-- PRODUK --}}
          <div class="co-card">
            <div class="co-card-header">
              <div class="step-badge">1</div>
              <h2>Produk yang Dipesan</h2>
            </div>
            @foreach($items as $item)
            <div class="co-item">
              <img src="https://via.placeholder.com/52" alt="{{ $item->nama_produk }}" class="co-item-img">
              <div>
                <div class="co-item-store">
                  <i class="fa-solid fa-store me-1"></i> BUMDes Store
                </div>
                <div class="co-item-name">{{ $item->nama_produk }}</div>
                <span class="co-item-qty">Qty: {{ $item->qty }}</span>
              </div>
              <div>
                <div class="co-item-sublabel">Subtotal</div>
                <div class="co-item-subtotal">Rp {{ number_format($item->harga * $item->qty) }}</div>
              </div>
            </div>
            @endforeach
          </div>

          <!-- {{-- ALAMAT --}}
          <div class="co-card">
            <div class="co-card-header">
              <div class="step-badge">2</div>
              <h2>Alamat Pengiriman</h2>
            </div>
            <div class="co-address-body">
              <div class="co-form-grid">
                <div class="co-form-group">
                  <label>Nama Penerima</label>
                  <input type="text" name="nama_penerima" placeholder="Nama lengkap penerima" required>
                </div>
                <div class="co-form-group">
                  <label>Nomor Telepon</label>
                  <input type="text" name="telepon" placeholder="08xx-xxxx-xxxx" required>
                </div>
                <div class="co-form-group">
                  <label>Provinsi</label>
                  <select name="provinsi" required>
                    <option value="">Pilih Provinsi</option>
                    <option>Jawa Barat</option>
                    <option>Jawa Tengah</option>
                    <option>DKI Jakarta</option>
                    <option>Jawa Timur</option>
                    <option>Sumatera Utara</option>
                    <option>Sulawesi Selatan</option>
                  </select>
                </div>
                <div class="co-form-group">
                  <label>Kota / Kabupaten</label>
                  <input type="text" name="kota" placeholder="Kota atau kabupaten" required>
                </div>
                <div class="co-form-group">
                  <label>Kecamatan</label>
                  <input type="text" name="kecamatan" placeholder="Kecamatan">
                </div>
                <div class="co-form-group">
                  <label>Kode Pos</label>
                  <input type="text" name="kode_pos" placeholder="xxxxx">
                </div>
                <div class="co-form-group full">
                  <label>Alamat Lengkap</label>
                  <textarea name="alamat" placeholder="Nama jalan, nomor rumah, RT/RW, kelurahan..." required></textarea>
                </div>
                <div class="co-form-group full">
                  <label>Catatan untuk Kurir <span style="color:var(--text-muted);font-weight:400">(opsional)</span></label>
                  <input type="text" name="catatan" placeholder="cth: Titip ke satpam jika tidak ada di rumah">
                </div>
              </div>
            </div>
          </div> -->

          <!-- {{-- PENGIRIMAN --}}
          <div class="co-card">
            <div class="co-card-header">
              <div class="step-badge">3</div>
              <h2>Metode Pengiriman</h2>
            </div>
            <div class="co-shipping-body">
              <label class="ship-option">
                <input type="radio" name="pengiriman" value="jne_reg" checked>
                <div>
                  <div class="ship-name">JNE Reguler</div>
                  <div class="ship-eta">Estimasi 2–3 hari kerja</div>
                </div>
                <div class="ship-price">Rp 18.000</div>
              </label>
              <label class="ship-option">
                <input type="radio" name="pengiriman" value="jne_yes">
                <div>
                  <div class="ship-name">JNE YES (Yakin Esok Sampai)</div>
                  <div class="ship-eta">Estimasi 1 hari kerja</div>
                </div>
                <div class="ship-price">Rp 38.000</div>
              </label>
              <label class="ship-option">
                <input type="radio" name="pengiriman" value="sicepat">
                <div>
                  <div class="ship-name">SiCepat Reguler</div>
                  <div class="ship-eta">Estimasi 2–4 hari kerja</div>
                </div>
                <div class="ship-price">Rp 15.000</div>
              </label>
              <label class="ship-option">
                <input type="radio" name="pengiriman" value="gratis">
                <div>
                  <div class="ship-name">Gratis Ongkir</div>
                  <div class="ship-eta">Estimasi 3–5 hari kerja · min. Rp 100.000</div>
                </div>
                <div class="ship-free">Gratis</div>
              </label>
            </div>
          </div> -->

          {{-- PEMBAYARAN --}}
          <div class="co-card">
            <div class="co-card-header">
              <div class="step-badge">4</div>
              <h2>Metode Pembayaran</h2>
            </div>
            <div class="co-payment-body">

              <div class="pay-group">
                <div class="pay-group-label">Transfer Bank</div>
                <div class="pay-options-grid">
                  <label class="pay-option">
                    <input type="radio" name="metode_bayar" value="bca" checked>
                    <div class="pay-icon bca">BCA</div>
                    <div class="pay-name">BCA</div>
                  </label>
                  <label class="pay-option">
                    <input type="radio" name="metode_bayar" value="bni">
                    <div class="pay-icon bni">BNI</div>
                    <div class="pay-name">BNI</div>
                  </label>
                  <label class="pay-option">
                    <input type="radio" name="metode_bayar" value="bri">
                    <div class="pay-icon bri">BRI</div>
                    <div class="pay-name">BRI</div>
                  </label>
                  <label class="pay-option">
                    <input type="radio" name="metode_bayar" value="mandiri">
                    <div class="pay-icon mandiri">MDR</div>
                    <div class="pay-name">Mandiri</div>
                  </label>
                  <label class="pay-option">
                    <input type="radio" name="metode_bayar" value="va">
                    <div class="pay-icon va">VA</div>
                    <div class="pay-name">Virtual Account</div>
                  </label>
                </div>
              </div>

              <div class="pay-group">
                <div class="pay-group-label">Dompet Digital</div>
                <div class="pay-options-grid">
                  <label class="pay-option">
                    <input type="radio" name="metode_bayar" value="gopay">
                    <div class="pay-icon gopay">GP</div>
                    <div class="pay-name">GoPay</div>
                  </label>
                  <label class="pay-option">
                    <input type="radio" name="metode_bayar" value="ovo">
                    <div class="pay-icon ovo">OVO</div>
                    <div class="pay-name">OVO</div>
                  </label>
                  <label class="pay-option">
                    <input type="radio" name="metode_bayar" value="dana">
                    <div class="pay-icon dana">DANA</div>
                    <div class="pay-name">DANA</div>
                  </label>
                </div>
              </div>

              <div class="pay-group">
                <div class="pay-group-label">Lainnya</div>
                <div class="pay-options-grid">
                  <label class="pay-option">
                    <input type="radio" name="metode_bayar" value="cod">
                    <div class="pay-icon cod">COD</div>
                    <div class="pay-name">Bayar di Tempat</div>
                  </label>
                </div>
              </div>

            </div>
          </div>

        </div>

        {{-- KANAN: SUMMARY --}}
        <div>
          <div class="summary-card">
            <div class="summary-header">
              <h3><i class="fa-solid fa-receipt me-2"></i>Ringkasan Pembayaran</h3>
            </div>
            <div class="summary-body">
              <div class="summary-row">
                <span class="label">Subtotal ({{ count($items) }} produk)</span>
                <span class="val">Rp {{ number_format($total) }}</span>
              </div>
              <div class="summary-row">
                <span class="label">Ongkos Kirim</span>
                <span class="val" id="ongkir-display">Rp 18.000</span>
              </div>
              <div class="summary-row">
                <span class="label">Diskon</span>
                <span class="val green">– Rp 0</span>
              </div>
              <div class="summary-row">
                <span class="label">Metode Bayar</span>
                <span class="val" id="metode-display">BCA Transfer</span>
              </div>
              <div class="summary-row total">
                <span class="label">Total</span>
                <span class="val" id="total-display">Rp {{ number_format($total + 18000) }}</span>
              </div>
              <button type="submit" class="btn-checkout-now">
                <i class="fa-solid fa-lock me-2"></i> Checkout Sekarang
              </button>
              <div class="trust-list">
                <div class="trust-item">
                  <div class="trust-icon"><i class="fa-solid fa-shield-halved"></i></div>
                  Pembayaran aman & terenkripsi
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
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    const subtotal = {{ $total }};
    const ongkirMap = { jne_reg: 18000, jne_yes: 38000, sicepat: 15000, gratis: 0 };
    const metodeMap = {
      bca: 'BCA Transfer', bni: 'BNI Transfer', bri: 'BRI Transfer',
      mandiri: 'Mandiri Transfer', va: 'Virtual Account',
      gopay: 'GoPay', ovo: 'OVO', dana: 'DANA', cod: 'Bayar di Tempat'
    };

    function fmt(n) {
      return 'Rp ' + n.toLocaleString('id-ID');
    }

    function updateSummary() {
      const ship  = document.querySelector('input[name="pengiriman"]:checked')?.value || 'jne_reg';
      const bayar = document.querySelector('input[name="metode_bayar"]:checked')?.value || 'bca';
      const ongkir = ongkirMap[ship] ?? 18000;
      const total  = subtotal + ongkir;

      document.getElementById('ongkir-display').textContent = ongkir === 0 ? 'Gratis' : fmt(ongkir);
      document.getElementById('metode-display').textContent = metodeMap[bayar] ?? bayar;
      document.getElementById('total-display').textContent  = fmt(total);
    }

    document.querySelectorAll('input[name="pengiriman"], input[name="metode_bayar"]')
      .forEach(el => el.addEventListener('change', updateSummary));
  </script>

</body>
</html>