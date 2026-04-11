<!-- resources/views/partials/navbar.blade.php -->

<style>
    /* ===== NAVBAR ===== */
    #mainNavbar {
        background: rgba(255, 255, 255, .95);
        backdrop-filter: blur(12px);
        border-bottom: 1px solid var(--border);
        padding: 12px 0;
        transition: box-shadow .3s;
        z-index: 1000;
    }

    #mainNavbar.scrolled {
        box-shadow: var(--shadow-md);
    }

    .brand-icon {
        width: 36px;
        height: 36px;
        background: linear-gradient(135deg, var(--primary), var(--primary-light));
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 16px;
    }

    .brand-text {
        font-family: 'Fraunces', serif;
        font-size: 1.25rem;
        font-weight: 700;
        color: var(--primary-dark);
        letter-spacing: -.5px;
    }

    .brand-accent {
        color: var(--accent-dark);
    }

    /* SEARCH */
    .search-wrapper {
        flex: 1;
        max-width: 480px;
    }

    .search-form {
        display: flex;
        border: 1.5px solid var(--border);
        border-radius: 50px;
        overflow: hidden;
        background: var(--bg);
        transition: border-color .2s, box-shadow .2s;
    }

    .search-form:focus-within {
        border-color: var(--primary-light);
        box-shadow: 0 0 0 3px rgba(64, 145, 108, .12);
    }

    .search-select {
        border: none;
        background: transparent;
        padding: 8px 12px;
        font-size: .8rem;
        color: var(--text-muted);
        outline: none;
        border-right: 1px solid var(--border);
        cursor: pointer;
    }

    .search-input {
        flex: 1;
        border: none;
        background: transparent;
        padding: 8px 14px;
        font-size: .9rem;
        outline: none;
        color: var(--text);
    }

    .search-btn {
        border: none;
        background: var(--primary);
        color: white;
        padding: 8px 18px;
        cursor: pointer;
        transition: background .2s;
    }

    .search-btn:hover {
        background: var(--primary-dark);
    }

    /* NAV BUTTONS */
    .btn-nav-outline {
        border: 1.5px solid var(--border);
        color: var(--text);
        border-radius: 50px;
        padding: 7px 18px;
        font-size: .875rem;
        font-weight: 600;
        transition: all .2s;
    }

    .btn-nav-outline:hover {
        border-color: var(--primary);
        color: var(--primary);
    }

    .btn-nav-fill {
        background: linear-gradient(135deg, var(--primary), var(--primary-light));
        color: white !important;
        border-radius: 50px;
        padding: 7px 20px;
        font-size: .875rem;
        font-weight: 600;
        border: none;
        transition: opacity .2s, transform .2s;
    }

    .btn-nav-fill:hover {
        opacity: .9;
        transform: translateY(-1px);
    }

    .nav-icon-btn {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 38px;
        height: 38px;
        border-radius: 50%;
        color: var(--text-muted);
        font-size: 1.1rem;
        transition: all .2s;
        text-decoration: none;
    }

    .nav-icon-btn:hover {
        background: var(--bg);
        color: var(--primary);
    }

    .cart-badge {
        position: absolute;
        top: -4px;
        right: -4px;
        background: var(--accent-dark);
        color: white;
        font-size: .65rem;
        font-weight: 700;
        width: 18px;
        height: 18px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .notif-badge {
        position: absolute;
        top: 4px;
        right: 4px;
        width: 8px;
        height: 8px;
        background: var(--accent-dark);
        border-radius: 50%;
        border: 2px solid white;
    }

    .avatar-circle {
        width: 34px;
        height: 34px;
        background: linear-gradient(135deg, var(--primary), var(--accent));
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: 700;
        font-size: .85rem;
    }

    .avatar-circle-lg {
        width: 44px;
        height: 44px;
        background: linear-gradient(135deg, var(--primary), var(--accent));
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: 700;
        font-size: 1rem;
        flex-shrink: 0;
    }

    .nav-user-btn {
        display: flex;
        align-items: center;
        gap: 6px;
        text-decoration: none;
        color: var(--text);
        padding: 4px 10px 4px 4px;
        border: 1.5px solid var(--border);
        border-radius: 50px;
        transition: border-color .2s;
    }

    .nav-user-btn:hover {
        border-color: var(--primary);
    }

    .nav-user-btn::after {
        display: none;
    }

    .nav-user-btn .dropdown-toggle-icon {
        font-size: .7rem;
        color: var(--text-muted);
    }

    .user-name {
        font-size: .85rem;
        font-weight: 600;
    }

    .user-dropdown {
        border: 1px solid var(--border);
        border-radius: var(--radius-md);
        min-width: 220px;
        padding: 8px;
    }

    .dropdown-header-info {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 8px 12px 12px;
    }

    .user-dropdown .dropdown-item {
        border-radius: var(--radius-sm);
        padding: 9px 12px;
        font-size: .875rem;
        color: var(--text);
        transition: background .15s;
    }

    .user-dropdown .dropdown-item:hover {
        background: var(--bg);
        color: var(--primary);
    }

    .toggler-icon {
        font-size: 1.2rem;
        color: var(--text);
    }

    .navbar-toggler:focus {
        box-shadow: none;
    }

    /* CATEGORY BAR */
    .category-bar {
        background: white;
        border-bottom: 1px solid var(--border);
        padding: 0;
    }

    .category-scroll {
        display: flex;
        gap: 4px;
        overflow-x: auto;
        padding: 10px 0;
        scrollbar-width: none;
    }

    .category-scroll::-webkit-scrollbar {
        display: none;
    }

    .category-pill {
        display: inline-flex;
        align-items: center;
        white-space: nowrap;
        padding: 6px 16px;
        border-radius: 50px;
        font-size: .8rem;
        font-weight: 600;
        color: var(--text-muted);
        text-decoration: none;
        transition: all .2s;
        border: 1.5px solid transparent;
    }

    .category-pill:hover,
    .category-pill.active {
        background: var(--primary);
        color: white;
    }

    /* RESPONSIVE */
    @media (max-width: 991.98px) {
        .search-wrapper {
            max-width: 100%;
            margin: 12px 0;
        }
    }
</style>

<nav class="navbar navbar-expand-lg sticky-top" id="mainNavbar">
    <div class="container">

        <!-- BRAND -->
        <a class="navbar-brand d-flex align-items-center gap-2" href="{{ url('/') }}">
            <div class="brand-icon">
                <i class="fa-solid fa-leaf"></i>
            </div>
            <span class="brand-text">Batara<span class="brand-accent">Shop</span></span>
        </a>

        <!-- TOGGLER -->
        <button class="navbar-toggler border-0 shadow-none" type="button"
            data-bs-toggle="collapse" data-bs-target="#navMenu"
            aria-controls="navMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="toggler-icon"><i class="fa-solid fa-bars"></i></span>
        </button>

        <!-- MENU -->
        <div class="collapse navbar-collapse" id="navMenu">

            <!-- SEARCH BAR (center) -->
            <div class="mx-auto my-3 my-lg-0 search-wrapper">
                <form action="{{ url('/produk') }}" method="GET" class="d-flex align-items-center search-form">
                    <select name="kategori" class="search-select">
                        <option value="">Semua</option>
                        <option value="makanan">Makanan</option>
                        <option value="minuman">Minuman</option>
                        <option value="kerajinan">Kerajinan</option>
                    </select>
                    <input type="text" name="q" class="search-input" placeholder="Cari produk desa...">
                    <button type="submit" class="search-btn">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </form>
            </div>

            <!-- RIGHT ICONS -->
            <ul class="navbar-nav align-items-center gap-1 gap-lg-2 ms-lg-2">

                @guest
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="btn btn-nav-outline">
                            <i class="fa-regular fa-user me-1"></i> Masuk
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('register') }}" class="btn btn-nav-fill">
                            Daftar
                        </a>
                    </li>
                @else
                    <!-- WISHLIST -->
                    <li class="nav-item">
                        <a href="{{ url('/wishlist') }}" class="nav-icon-btn" title="Wishlist">
                            <i class="fa-regular fa-heart"></i>
                        </a>
                    </li>

                    <!-- KERANJANG -->
                    <li class="nav-item">
                        <a href="{{ route('cart.index') }}" class="nav-icon-btn position-relative" title="Keranjang">
                            <i class="fa-solid fa-bag-shopping"></i>
                            <span class="cart-badge">3</span>
                        </a>
                    </li>

                    <!-- NOTIFIKASI -->
                    <li class="nav-item">
                        <a href="{{ route('orders.history') }}" class="nav-icon-btn position-relative" title="Notifikasi">
                            <i class="fa-regular fa-bell"></i>
                            <span class="notif-badge"></span>
                        </a>
                    </li>

                    <!-- USER DROPDOWN -->
                    <li class="nav-item dropdown">
                        <a class="nav-user-btn dropdown-toggle" href="#"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="avatar-circle">
                                {{ strtoupper(substr(auth()->user()->nama_pengguna, 0, 1)) }}
                            </div>
                            <span class="d-none d-lg-inline ms-1 user-name">{{ auth()->user()->nama_pengguna }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end user-dropdown shadow">
                            <li>
                                <div class="dropdown-header-info">
                                    <div class="avatar-circle-lg">
                                        {{ strtoupper(substr(auth()->user()->nama_pengguna, 0, 1)) }}
                                    </div>
                                    <div>
                                        <div class="fw-semibold">{{ auth()->user()->nama_lengkap ?? auth()->user()->nama_pengguna }}</div>
                                        <small class="text-muted">{{ auth()->user()->email }}</small>
                                    </div>
                                </div>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item" href="{{ url('/profil') }}">
                                    <i class="fa-regular fa-user me-2"></i> Profil Saya
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ url('/pesanan') }}">
                                    <i class="fa-regular fa-clipboard me-2"></i> Pesanan Saya
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ url('/toko') }}">
                                    <i class="fa-solid fa-store me-2"></i> Toko Saya
                                </a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">
                                        <i class="fa-solid fa-arrow-right-from-bracket me-2"></i> Keluar
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @endguest

            </ul>
        </div><!-- /.collapse -->
    </div><!-- /.container -->
</nav>

<!-- CATEGORY BAR -->
<div class="category-bar">
    <div class="container">
        <div class="category-scroll">
            <a href="{{ url('/produk') }}"
                class="category-pill {{ request()->is('produk') && !request('kategori') ? 'active' : '' }}">
                <i class="fa-solid fa-border-all me-1"></i> Semua
            </a>
            <a href="{{ url('/produk?kategori=makanan') }}" class="category-pill {{ request('kategori') == 'makanan' ? 'active' : '' }}">
                <i class="fa-solid fa-utensils me-1"></i> Makanan
            </a>
            <a href="{{ url('/produk?kategori=minuman') }}" class="category-pill {{ request('kategori') == 'minuman' ? 'active' : '' }}">
                <i class="fa-solid fa-mug-hot me-1"></i> Minuman
            </a>
            <a href="{{ url('/produk?kategori=kerajinan') }}" class="category-pill {{ request('kategori') == 'kerajinan' ? 'active' : '' }}">
                <i class="fa-solid fa-paintbrush me-1"></i> Kerajinan
            </a>
            <a href="{{ url('/produk?kategori=pertanian') }}" class="category-pill {{ request('kategori') == 'pertanian' ? 'active' : '' }}">
                <i class="fa-solid fa-seedling me-1"></i> Pertanian
            </a>
            <a href="{{ url('/produk?kategori=fashion') }}" class="category-pill {{ request('kategori') == 'fashion' ? 'active' : '' }}">
                <i class="fa-solid fa-shirt me-1"></i> Fashion
            </a>
            <a href="{{ url('/produk?kategori=oleholeh') }}" class="category-pill {{ request('kategori') == 'oleholeh' ? 'active' : '' }}">
                <i class="fa-solid fa-gift me-1"></i> Oleh-oleh
            </a>
            <a href="{{ url('/bumdes') }}" class="category-pill {{ request()->is('bumdes*') ? 'active' : '' }}">
                <i class="fa-solid fa-building me-1"></i> BUMDes
            </a>
        </div>
    </div>
</div>

<script>
    window.addEventListener('scroll', () => {
        const nav = document.getElementById('mainNavbar');
        if (nav) nav.classList.toggle('scrolled', window.scrollY > 20);
    });
</script>