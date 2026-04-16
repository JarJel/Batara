<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Seller – BataraShop</title>

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
      --shadow-sm: 0 2px 8px rgba(45,106,79,.08);
      --shadow-md: 0 6px 24px rgba(45,106,79,.12);
    }

    *, *::before, *::after { box-sizing: border-box; }

    body {
      font-family: 'Plus Jakarta Sans', sans-serif;
      background: var(--bg);
      color: var(--text);
      margin: 0;
    }

    /* NAVBAR */
    #mainNavbar {
      position: sticky;
      top: 0;
      z-index: 200;
    }

    /* LAYOUT */
    .seller-layout {
      display: flex;
      min-height: calc(100vh - 57px);
    }

    /* CONTENT */
    .seller-content {
      margin-left: 248px;
      flex: 1;
      padding: 28px;
      min-width: 0;
    }

    .page-title {
      font-family: 'Fraunces', serif;
      font-size: 1.4rem; font-weight: 700;
      color: var(--text); margin-bottom: 4px;
    }
    .page-sub {
      font-size: .82rem; color: var(--text-muted);
      margin-bottom: 24px;
    }

    /* ALERT */
    .bs-alert-success {
      background: #E8F5E9; border: 1px solid #A5D6A7;
      color: #1B5E20; border-radius: 10px;
      padding: 11px 16px; font-size: .875rem; font-weight: 600;
      margin-bottom: 20px;
      display: flex; align-items: center; gap: 8px;
    }

    /* STATS */
    .stats-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 16px;
      margin-bottom: 28px;
    }
    .stat-card {
      background: #fff;
      border-radius: var(--radius-md);
      border: 1px solid var(--border);
      padding: 20px;
      display: flex; flex-direction: column; gap: 10px;
    }
    .stat-card-top {
      display: flex; align-items: center; justify-content: space-between;
    }
    .stat-icon {
      width: 40px; height: 40px;
      border-radius: 10px;
      display: flex; align-items: center; justify-content: center;
      font-size: 16px;
    }
    .stat-icon.green { background: #E8F5E9; color: var(--primary); }
    .stat-icon.orange { background: #FFF3E0; color: var(--accent-dark); }
    .stat-icon.teal { background: #E0F7FA; color: #00796B; }

    .stat-trend {
      font-size: .72rem; font-weight: 700;
      padding: 3px 8px; border-radius: 50px;
      background: #E8F5E9; color: var(--primary);
    }
    .stat-num {
      font-family: 'Fraunces', serif;
      font-size: 1.75rem; font-weight: 700; color: var(--text);
    }
    .stat-label { font-size: .78rem; color: var(--text-muted); font-weight: 600; }

    /* SECTION */
    .section-header {
      display: flex; align-items: center; justify-content: space-between;
      margin-bottom: 14px;
    }
    .section-title {
      font-family: 'Fraunces', serif;
      font-size: 1rem; font-weight: 700; color: var(--text);
    }
    .btn-see-all {
      font-size: .78rem; font-weight: 700;
      color: var(--primary); text-decoration: none;
      border: 1.5px solid var(--border);
      border-radius: 50px; padding: 4px 12px;
      transition: all .2s;
    }
    .btn-see-all:hover { border-color: var(--primary); color: var(--primary); }

    /* TABLE CARD */
    .table-card {
      background: #fff;
      border-radius: var(--radius-md);
      border: 1px solid var(--border);
      overflow: hidden;
    }
    .bs-table { width: 100%; border-collapse: collapse; }
    .bs-table th {
      padding: 11px 16px;
      font-size: .72rem; font-weight: 700;
      color: var(--text-muted);
      text-transform: uppercase; letter-spacing: .4px;
      border-bottom: 1px solid var(--border);
      text-align: left; background: var(--bg);
    }
    .bs-table td {
      padding: 13px 16px;
      font-size: .85rem; color: var(--text);
      border-bottom: 1px solid var(--border);
    }
    .bs-table tr:last-child td { border-bottom: none; }
    .bs-table tr:hover td { background: rgba(45,106,79,.02); }

    /* STATUS */
    .order-status {
      display: inline-flex; align-items: center; gap: 4px;
      border-radius: 50px; padding: 3px 10px;
      font-size: .72rem; font-weight: 700;
    }
    .order-status .dot { width: 5px; height: 5px; border-radius: 50%; }
    .status-menunggu  { background: #FFF8E1; color: #8D6E00; }
    .status-menunggu .dot  { background: #F4A261; }
    .status-diproses  { background: #E3F2FD; color: #0D47A1; }
    .status-diproses .dot  { background: #42A5F5; }
    .status-selesai   { background: #E8F5E9; color: #1B5E20; }
    .status-selesai .dot   { background: #66BB6A; }
    .status-dibatalkan { background: #FFEBEE; color: #B71C1C; }
    .status-dibatalkan .dot { background: #EF5350; }

    /* PRODUCT CELL */
    .product-cell { display: flex; align-items: center; gap: 10px; }
    .product-thumb {
      width: 36px; height: 36px;
      border-radius: 8px; background: var(--bg);
      border: 1px solid var(--border);
      object-fit: cover;
    }

    .two-col { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-top: 0; }

    @media (max-width: 991.98px) {
      .seller-content { margin-left: 0; }
      .stats-grid { grid-template-columns: 1fr 1fr; }
      .two-col { grid-template-columns: 1fr; }
    }
    @media (max-width: 575.98px) {
      .stats-grid { grid-template-columns: 1fr; }
    }
  </style>
</head>

<body>
  <div class="seller-layout">

    {{-- SIDEBAR --}}
    @include('seller.partials.sidebar')

    {{-- CONTENT --}}
    <main class="seller-content">

      <div class="page-title">Dashboard Toko</div>
      <div class="page-sub">
        Selamat datang kembali, <strong>{{ auth()->user()->nama_pengguna }}</strong>!
        Berikut ringkasan toko kamu hari ini.
      </div>

      @if(session('success'))
        <div class="bs-alert-success">
          <i class="fa-solid fa-circle-check"></i>
          {{ session('success') }}
        </div>
      @endif

      {{-- STAT CARDS --}}
      <div class="stats-grid">
        <div class="stat-card">
          <div class="stat-card-top">
            <div class="stat-icon green">
              <i class="fa-solid fa-box"></i>
            </div>
            <span class="stat-trend">
              <i class="fa-solid fa-arrow-up" style="font-size:.6rem"></i> Aktif
            </span>
          </div>
          <div class="stat-num">{{ $totalProduk ?? 0 }}</div>
          <div class="stat-label">Total Produk</div>
        </div>

        <div class="stat-card">
          <div class="stat-card-top">
            <div class="stat-icon orange">
              <i class="fa-solid fa-clipboard-list"></i>
            </div>
            <span class="stat-trend">
              <i class="fa-solid fa-arrow-up" style="font-size:.6rem"></i> Bulan ini
            </span>
          </div>
          <div class="stat-num">{{ $totalOrder ?? 0 }}</div>
          <div class="stat-label">Total Pesanan</div>
        </div>

        <div class="stat-card">
          <div class="stat-card-top">
            <div class="stat-icon teal">
              <i class="fa-solid fa-wallet"></i>
            </div>
            <span class="stat-trend">
              <i class="fa-solid fa-arrow-up" style="font-size:.6rem"></i> +18%
            </span>
          </div>
          <div class="stat-num">
            Rp {{ number_format($totalPendapatan ?? 0) }}
          </div>
          <div class="stat-label">Total Pendapatan</div>
        </div>
      </div>

      {{-- TABLES --}}
      <div class="two-col">

        {{-- PESANAN TERBARU --}}
        <div>
          <div class="section-header">
            <span class="section-title">Pesanan Terbaru</span>
            <a href="{{ route('seller.pesanan') ?? '#' }}" class="btn-see-all">
              Lihat Semua <i class="fa-solid fa-arrow-right" style="font-size:.6rem"></i>
            </a>
          </div>
          <div class="table-card">
            <table class="bs-table">
              <thead>
                <tr>
                  <th>ID Pesanan</th>
                  <th>Total</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                @forelse($recentOrders ?? [] as $order)
                @php
                  $statusKey = strtolower($order->status);
                @endphp
                <tr>
                  <td style="font-weight:700;color:var(--primary)">
                    #{{ str_pad($order->id_pesanan, 6, '0', STR_PAD_LEFT) }}
                  </td>
                  <td>Rp {{ number_format($order->total_harga_produk) }}</td>
                  <td>
                    <span class="order-status status-{{ $statusKey }}">
                      <span class="dot"></span>
                      {{ ucfirst($statusKey) }}
                    </span>
                  </td>
                </tr>
                @empty
                <tr>
                  <td colspan="3" style="text-align:center;color:var(--text-muted);padding:20px;">
                    Belum ada pesanan
                  </td>
                </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>

        {{-- PRODUK TERLARIS --}}
        <div>
          <div class="section-header">
            <span class="section-title">Produk Terlaris</span>
            <a href="{{ route('seller.produk.index') }}" class="btn-see-all">
              Lihat Semua <i class="fa-solid fa-arrow-right" style="font-size:.6rem"></i>
            </a>
          </div>
          <div class="table-card">
            <table class="bs-table">
              <thead>
                <tr>
                  <th>Produk</th>
                  <th>Terjual</th>
                  <th>Stok</th>
                </tr>
              </thead>
              <tbody>
                @forelse($topProducts ?? [] as $p)
                <tr>
                  <td>
                    <div class="product-cell">
                      <img src="https://via.placeholder.com/36"
                           alt="{{ $p->nama_produk }}"
                           class="product-thumb">
                      <span style="font-weight:600;font-size:.82rem;">
                        {{ Str::limit($p->nama_produk, 24) }}
                      </span>
                    </div>
                  </td>
                  <td style="font-weight:700;color:var(--primary)">
                    {{ $p->terjual ?? 0 }}
                  </td>
                  <td style="color:var(--text-muted)">
                    {{ $p->stok ?? '-' }}
                  </td>
                </tr>
                @empty
                <tr>
                  <td colspan="3" style="text-align:center;color:var(--text-muted);padding:20px;">
                    Belum ada produk
                  </td>
                </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>

      </div>

    </main>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>