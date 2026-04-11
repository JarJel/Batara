<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Riwayat Pesanan – BataraShop</title>

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
    .page-header {
      background: linear-gradient(135deg, var(--primary-dark), var(--primary-light));
      padding: 32px 0 28px;
    }

    .page-header .section-tag {
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

    .page-header h1 {
      font-family: 'Fraunces', serif;
      font-size: 1.6rem;
      font-weight: 700;
      color: #fff;
      margin: 0 0 4px;
    }

    .page-header p {
      color: rgba(255, 255, 255, .75);
      font-size: .875rem;
      margin: 0;
    }

    .bs-breadcrumb {
      font-size: .8rem;
      color: rgba(255, 255, 255, .7);
      margin-bottom: 14px;
    }

    .bs-breadcrumb a {
      color: rgba(255, 255, 255, .9);
      text-decoration: none;
      font-weight: 600;
    }

    .bs-breadcrumb a:hover {
      color: var(--accent);
    }

    /* ORDER CARD */
    .orders-card {
      background: #fff;
      border-radius: var(--radius-md);
      border: 1px solid var(--border);
      overflow: hidden;
    }

    .orders-card-header {
      padding: 16px 20px;
      border-bottom: 1px solid var(--border);
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .orders-card-header h2 {
      font-family: 'Fraunces', serif;
      font-size: 1rem;
      font-weight: 700;
      color: var(--text);
      margin: 0;
    }

    /* ORDER ITEM */
    .order-item {
      padding: 20px;
      border-bottom: 1px solid var(--border);
      display: grid;
      grid-template-columns: 1fr auto;
      gap: 16px;
      align-items: center;
    }

    .order-item:last-child {
      border-bottom: none;
    }

    .order-id {
      font-size: .75rem;
      color: var(--text-muted);
      font-weight: 600;
      margin-bottom: 4px;
    }

    .order-id span {
      background: rgba(45, 106, 79, .08);
      color: var(--primary);
      border-radius: 50px;
      padding: 2px 10px;
      font-size: .72rem;
      font-weight: 700;
    }

    .order-total {
      font-family: 'Fraunces', serif;
      font-size: 1.05rem;
      font-weight: 700;
      color: var(--primary-dark);
      margin-bottom: 6px;
    }

    .order-meta {
      display: flex;
      align-items: center;
      gap: 8px;
      flex-wrap: wrap;
    }

    .order-date {
      font-size: .75rem;
      color: var(--text-muted);
      display: flex;
      align-items: center;
      gap: 4px;
    }

    /* STATUS BADGES */
    .order-status {
      display: inline-flex;
      align-items: center;
      gap: 5px;
      border-radius: 50px;
      padding: 4px 12px;
      font-size: .75rem;
      font-weight: 700;
    }

    .order-status .dot {
      width: 6px;
      height: 6px;
      border-radius: 50%;
      display: inline-block;
      flex-shrink: 0;
    }

    .status-menunggu {
      background: #FFF8E1;
      color: #8D6E00;
    }

    .status-menunggu .dot {
      background: #F4A261;
    }

    .status-diproses {
      background: #E3F2FD;
      color: #0D47A1;
    }

    .status-diproses .dot {
      background: #42A5F5;
    }

    .status-dikirim {
      background: #E8F5E9;
      color: #1B5E20;
    }

    .status-dikirim .dot {
      background: #66BB6A;
    }

    .status-selesai {
      background: #E8F5E9;
      color: #1B5E20;
    }

    .status-selesai .dot {
      background: #66BB6A;
    }

    .status-dibatalkan {
      background: #FFEBEE;
      color: #B71C1C;
    }

    .status-dibatalkan .dot {
      background: #EF5350;
    }

    .order-right {
      display: flex;
      flex-direction: column;
      align-items: flex-end;
      gap: 8px;
    }

    .btn-detail {
      border: 1.5px solid var(--border);
      color: var(--primary);
      border-radius: 50px;
      padding: 7px 18px;
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-size: .8rem;
      font-weight: 700;
      text-decoration: none;
      transition: all .2s;
      white-space: nowrap;
    }

    .btn-detail:hover {
      border-color: var(--primary);
      background: rgba(45, 106, 79, .04);
      color: var(--primary);
    }

    /* EMPTY STATE */
    .orders-empty {
      background: #fff;
      border-radius: var(--radius-md);
      border: 1.5px dashed var(--border);
      padding: 64px 24px;
      text-align: center;
    }

    .orders-empty i {
      font-size: 3rem;
      color: var(--border);
      margin-bottom: 16px;
    }

    .orders-empty h3 {
      font-family: 'Fraunces', serif;
      font-size: 1.2rem;
      color: var(--text);
      margin: 0 0 6px;
    }

    .orders-empty p {
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

    .modal-content {
      box-shadow: var(--shadow-lg);
      border: none;
    }

    .modal-header {
      border-bottom: 1px solid var(--border);
    }

    .modal-body table th {
      font-size: .8rem;
      color: var(--text-muted);
    }

    .modal-body table td {
      font-size: .85rem;
    }

    @media (max-width: 575.98px) {
      .order-item {
        grid-template-columns: 1fr;
      }

      .order-right {
        align-items: flex-start;
      }
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
        <span>Riwayat Pesanan</span>
      </div>
      <div class="section-tag">Pesanan</div>
      <h1><i class="fa-solid fa-box me-2"></i>Riwayat Pesanan</h1>
      <p>Pantau semua status pesanan kamu di sini</p>
    </div>
  </div>

  {{-- MAIN --}}
  <div class="container py-4">

    @if($orders->isEmpty())

    <div class="orders-empty">
      <i class="fa-solid fa-box-open"></i>
      <h3>Belum Ada Pesanan</h3>
      <p>Kamu belum pernah melakukan pesanan. Yuk mulai belanja!</p>
      <a href="{{ url('/produk') }}" class="btn-mulai-belanja">
        <i class="fa-solid fa-store me-1"></i> Mulai Belanja
      </a>
    </div>

    @else

    <div class="orders-card">
      <div class="orders-card-header">
        <h2>Semua Pesanan</h2>
        <span class="text-muted" style="font-size:.8rem">{{ $orders->count() }} pesanan</span>
      </div>

      @php
      $statusMap = [
      'menunggu' => ['class' => 'status-menunggu', 'label' => 'Menunggu'],
      'diproses' => ['class' => 'status-diproses', 'label' => 'Diproses'],
      'dikirim' => ['class' => 'status-dikirim', 'label' => 'Dikirim'],
      'selesai' => ['class' => 'status-selesai', 'label' => 'Selesai'],
      'dibatalkan' => ['class' => 'status-dibatalkan', 'label' => 'Dibatalkan'],
      ];
      @endphp

      @foreach($orders as $order)
      @php
      $statusKey = strtolower($order->status);
      $statusInfo = $statusMap[$statusKey] ?? ['class' => 'status-menunggu', 'label' => $order->status];
      @endphp
      <div class="order-item">
        <div class="modal fade" id="modalOrder{{ $order->id_pesanan }}" tabindex="-1">
          <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content" style="border-radius:16px;">

              <div class="modal-header border-0 pb-0">
                <h5 class="modal-title fw-bold">
                  Detail Pesanan #{{ str_pad($order->id_pesanan, 6, '0', STR_PAD_LEFT) }}
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>

              <div class="modal-body">

                {{-- STATUS --}}
                <div class="mb-3">
                  <span class="order-status {{ $statusInfo['class'] }}">
                    <span class="dot"></span>
                    {{ $statusInfo['label'] }}
                  </span>
                </div>

                {{-- LIST PRODUK --}}
                <div class="table-responsive">
                  <table class="table align-middle">
                    <thead>
                      <tr>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Qty</th>
                        <th>Total</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($order->items as $item)
                      <tr>
                        <td>{{ $item->nama_produk_snapshot }}</td>
                        <td>Rp {{ number_format($item->harga_saat_pesan) }}</td>
                        <td>{{ $item->jumlah }}</td>
                        <td class="fw-bold">
                          Rp {{ number_format($item->harga_saat_pesan * $item->jumlah) }}
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>

                {{-- TOTAL --}}
                <div class="text-end mt-3">
                  <h5 class="fw-bold text-success">
                    Total: Rp {{ number_format($order->total_harga_produk) }}
                  </h5>
                </div>

              </div>

            </div>
          </div>
        </div>
        <div>
          <div class="order-id">
            ID Pesanan &nbsp;<span>#{{ str_pad($order->id_pesanan, 6, '0', STR_PAD_LEFT) }}</span>
          </div>
          <div class="order-total">Rp {{ number_format($order->total_harga_produk) }}</div>
          <div class="order-meta">
            <span class="order-status {{ $statusInfo['class'] }}">
              <span class="dot"></span>
              {{ $statusInfo['label'] }}
            </span>
            <span class="order-date">
              <i class="fa-regular fa-calendar" style="font-size:.7rem"></i>
              {{ \Carbon\Carbon::parse($order->created_at)->translatedFormat('d M Y') }}
            </span>
          </div>
        </div>
        <div class="order-right">
          <button class="btn-detail" data-bs-toggle="modal" data-bs-target="#modalOrder{{ $order->id_pesanan }}">
            <i class="fa-solid fa-eye me-1"></i> Detail
          </button>
        </div>
      </div>
      @endforeach

    </div>

    @endif
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>