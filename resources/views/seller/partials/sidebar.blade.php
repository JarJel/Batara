<style>
  /* SIDEBAR */
  .bs-sidebar {
    width: 248px;
    background: #fff;
    border-right: 1px solid var(--border);
    flex-shrink: 0;
    display: flex;
    flex-direction: column;
    position: fixed;
    top: 57px;
    left: 0;
    height: calc(100vh - 57px);
    overflow-y: auto;
  }

  .bs-sidebar-header { padding: 16px 16px 12px; }

  .bs-store-card {
    background: linear-gradient(135deg, var(--primary-dark), var(--primary-light));
    border-radius: 12px;
    padding: 14px 16px;
  }
  .bs-store-icon {
    width: 36px; height: 36px;
    background: rgba(255,255,255,.2);
    border-radius: 8px;
    display: flex; align-items: center; justify-content: center;
    color: #fff; font-size: 14px; margin-bottom: 8px;
  }
  .bs-store-name {
    font-family: 'Fraunces', serif;
    font-size: .95rem; font-weight: 700;
    color: #fff; margin-bottom: 6px;
  }
  .bs-store-status {
    display: inline-flex; align-items: center; gap: 4px;
    background: rgba(255,255,255,.2);
    border-radius: 50px; padding: 2px 8px;
    font-size: .68rem; font-weight: 700; color: #fff;
  }
  .bs-store-status-dot {
    width: 6px; height: 6px;
    border-radius: 50%; background: #4ADE80;
  }

  .bs-sidebar-nav { padding: 8px 12px; flex: 1; }

  .bs-nav-section-label {
    font-size: .65rem; font-weight: 700;
    color: var(--text-muted);
    letter-spacing: .6px; text-transform: uppercase;
    padding: 10px 8px 6px;
  }

  .bs-nav-item {
    display: flex; align-items: center; gap: 10px;
    padding: 9px 12px;
    border-radius: 8px;
    font-size: .85rem; font-weight: 600;
    color: var(--text-muted);
    text-decoration: none;
    transition: all .2s;
    margin-bottom: 2px;
  }
  .bs-nav-item:hover { background: var(--bg); color: var(--primary); }
  .bs-nav-item.active {
    background: rgba(45,106,79,.08);
    color: var(--primary);
  }
  .bs-nav-item .nav-icon {
    width: 30px; height: 30px;
    border-radius: 7px;
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0; font-size: 13px;
  }
  .bs-nav-item.active .nav-icon { background: var(--primary); color: #fff; }
  .bs-nav-item:not(.active) .nav-icon { background: var(--bg); }

  .bs-nav-badge-count {
    margin-left: auto;
    background: var(--accent-dark);
    color: #fff; border-radius: 50px;
    padding: 1px 7px; font-size: .65rem; font-weight: 700;
  }

  .bs-sidebar-footer {
    padding: 12px 20px;
    border-top: 1px solid var(--border);
  }
  .bs-logout-btn {
    display: flex; align-items: center; gap: 8px;
    padding: 9px 12px; border-radius: 8px;
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: .85rem; font-weight: 600;
    color: var(--accent-dark);
    cursor: pointer; transition: background .2s;
    width: 100%; border: none; background: none;
  }
  .bs-logout-btn:hover { background: #FFF1F2; }
</style>

<aside class="bs-sidebar">

  <div class="bs-sidebar-header">
    <div class="bs-store-card">
      <div class="bs-store-icon">
        <i class="fa-solid fa-store" style="font-size:14px;"></i>
      </div>
      <div class="bs-store-name">
        {{ auth()->user()->toko->nama_toko ?? 'Toko Saya' }}
      </div>
      <span class="bs-store-status">
        <span class="bs-store-status-dot"></span> Aktif
      </span>
    </div>
  </div>

  <nav class="bs-sidebar-nav">

    <div class="bs-nav-section-label">Menu Utama</div>

    <a href="{{ route('seller.dashboard') }}"
       class="bs-nav-item {{ request()->routeIs('seller.dashboard') ? 'active' : '' }}">
      <div class="nav-icon">
        <i class="fa-solid fa-gauge-high"></i>
      </div>
      Dashboard
    </a>

    <a href="{{ route('seller.produk.index') }}"
       class="bs-nav-item {{ request()->routeIs('seller.produk.*') ? 'active' : '' }}">
      <div class="nav-icon">
        <i class="fa-solid fa-box"></i>
      </div>
      Produk
    </a>

    <a href="{{ route('seller.pesanan') ?? '#' }}"
       class="bs-nav-item {{ request()->routeIs('seller.pesanan*') ? 'active' : '' }}">
      <div class="nav-icon">
        <i class="fa-solid fa-clipboard-list"></i>
      </div>
      Pesanan
      @php $pendingOrders = auth()->user()->toko->pesanan_pending_count ?? 0; @endphp
      @if($pendingOrders > 0)
        <span class="bs-nav-badge-count">{{ $pendingOrders }}</span>
      @endif
    </a>

    <div class="bs-nav-section-label" style="margin-top:8px;">Toko</div>

    <a href="#"
       class="bs-nav-item {{ request()->routeIs('seller.pengaturan*') ? 'active' : '' }}">
      <div class="nav-icon">
        <i class="fa-solid fa-gear"></i>
      </div>
      Pengaturan Toko
    </a>

    <a href="#"
       class="bs-nav-item {{ request()->routeIs('seller.keuangan*') ? 'active' : '' }}">
      <div class="nav-icon">
        <i class="fa-solid fa-wallet"></i>
      </div>
      Keuangan
    </a>

  </nav>

  <div class="bs-sidebar-footer">
    <form method="POST" action="{{ route('logout') }}">
      @csrf
      <button type="submit" class="bs-logout-btn">
        <i class="fa-solid fa-arrow-right-from-bracket"></i>
        Keluar
      </button>
    </form>
  </div>

</aside>