<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BataraShop – Produk Unggulan Desa</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Fraunces:ital,wght@0,700;1,400&display=swap" rel="stylesheet">

    <style>
        /* ===== CSS VARIABLES ===== */
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

        /* ===== BASE ===== */
        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: var(--bg);
            color: var(--text);
            overflow-x: hidden;
        }

        /* ===== HERO ===== */
        .hero-section {
            background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary) 50%, #52B788 100%);
            padding: 72px 0 80px;
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            inset: 0;
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.04'%3E%3Ccircle cx='30' cy='30' r='4'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(255, 255, 255, .15);
            border: 1px solid rgba(255, 255, 255, .25);
            color: white;
            padding: 6px 14px;
            border-radius: 50px;
            font-size: .8rem;
            font-weight: 600;
            margin-bottom: 20px;
            backdrop-filter: blur(8px);
        }

        .hero-title {
            font-family: 'Fraunces', serif;
            font-size: clamp(2rem, 5vw, 3.5rem);
            font-weight: 700;
            color: white;
            line-height: 1.15;
            margin-bottom: 18px;
        }

        .hero-title em {
            font-style: italic;
            color: var(--accent);
        }

        .hero-desc {
            color: rgba(255, 255, 255, .8);
            font-size: 1.05rem;
            line-height: 1.7;
            margin-bottom: 32px;
            max-width: 480px;
        }

        .hero-cta {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
        }

        .btn-hero-primary {
            background: white;
            color: var(--primary-dark);
            border: none;
            border-radius: 50px;
            padding: 14px 32px;
            font-weight: 700;
            font-size: .95rem;
            transition: all .2s;
            text-decoration: none;
        }

        .btn-hero-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, .2);
            color: var(--primary-dark);
        }

        .btn-hero-outline {
            border: 2px solid rgba(255, 255, 255, .5);
            color: white;
            border-radius: 50px;
            padding: 13px 28px;
            font-weight: 600;
            font-size: .95rem;
            transition: all .2s;
            text-decoration: none;
        }

        .btn-hero-outline:hover {
            background: rgba(255, 255, 255, .1);
            color: white;
            border-color: white;
        }

        .hero-stats {
            display: flex;
            gap: 32px;
            margin-top: 40px;
        }

        .hero-stat-item {
            color: white;
        }

        .hero-stat-num {
            font-family: 'Fraunces', serif;
            font-size: 2rem;
            font-weight: 700;
            color: var(--accent);
            line-height: 1;
        }

        .hero-stat-label {
            font-size: .8rem;
            opacity: .75;
            margin-top: 4px;
        }

        .hero-image-wrap {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .hero-img-card {
            background: rgba(255, 255, 255, .12);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, .2);
            border-radius: var(--radius-lg);
            padding: 16px;
            position: relative;
        }

        .hero-img-card img {
            border-radius: var(--radius-md);
            width: 100%;
            max-width: 420px;
            object-fit: cover;
        }

        .hero-floating-badge {
            position: absolute;
            background: white;
            border-radius: var(--radius-md);
            padding: 10px 16px;
            box-shadow: var(--shadow-md);
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: .8rem;
            font-weight: 600;
            color: var(--text);
            animation: float 3s ease-in-out infinite;
        }

        .hero-floating-badge.badge-tl {
            top: -12px;
            left: -20px;
        }

        .hero-floating-badge.badge-br {
            bottom: -12px;
            right: -20px;
        }

        .hero-floating-badge .badge-icon {
            font-size: 1.2rem;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-8px);
            }
        }

        /* ===== SECTION COMMON ===== */
        .section-header {
            margin-bottom: 36px;
        }

        .section-tag {
            display: inline-block;
            background: rgba(45, 106, 79, .1);
            color: var(--primary);
            border-radius: 50px;
            padding: 4px 14px;
            font-size: .78rem;
            font-weight: 700;
            letter-spacing: .5px;
            text-transform: uppercase;
            margin-bottom: 10px;
        }

        .section-title {
            font-family: 'Fraunces', serif;
            font-size: clamp(1.5rem, 3vw, 2rem);
            font-weight: 700;
            color: var(--text);
            margin-bottom: 8px;
        }

        .section-subtitle {
            color: var(--text-muted);
            font-size: .95rem;
        }

        .btn-see-all {
            color: var(--primary);
            font-weight: 600;
            font-size: .875rem;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 8px 16px;
            border: 1.5px solid var(--border);
            border-radius: 50px;
            transition: all .2s;
        }

        .btn-see-all:hover {
            border-color: var(--primary);
            background: rgba(45, 106, 79, .04);
            color: var(--primary);
        }

        /* ===== PROMO BANNER ===== */
        .promo-section {
            padding: 40px 0;
        }

        .promo-card {
            border-radius: var(--radius-lg);
            padding: 32px;
            color: white;
            position: relative;
            overflow: hidden;
            min-height: 160px;
            display: flex;
            align-items: center;
            text-decoration: none;
            transition: transform .2s, box-shadow .2s;
        }

        .promo-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-lg);
        }

        .promo-card::after {
            content: '';
            position: absolute;
            right: -20px;
            top: -20px;
            width: 140px;
            height: 140px;
            border-radius: 50%;
            background: rgba(255, 255, 255, .1);
        }

        .promo-card-green {
            background: linear-gradient(135deg, var(--primary-dark), var(--primary-light));
        }

        .promo-card-orange {
            background: linear-gradient(135deg, #E76F51, #F4A261);
        }

        .promo-card-teal {
            background: linear-gradient(135deg, #1D6F6C, #52B6B2);
        }

        .promo-tag {
            background: rgba(255, 255, 255, .2);
            border-radius: 50px;
            padding: 3px 12px;
            font-size: .75rem;
            font-weight: 700;
            display: inline-block;
            margin-bottom: 10px;
        }

        .promo-title {
            font-family: 'Fraunces', serif;
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 6px;
            color: white;
        }

        .promo-desc {
            font-size: .85rem;
            opacity: .85;
        }

        /* ===== PRODUCT CARD ===== */
        .products-section {
            padding: 60px 0;
        }

        .product-card {
            background: white;
            border-radius: var(--radius-md);
            border: 1px solid var(--border);
            overflow: hidden;
            transition: transform .2s, box-shadow .2s;
            cursor: pointer;
            position: relative;
        }

        .product-card:hover {
            transform: translateY(-6px);
            box-shadow: var(--shadow-lg);
        }

        .product-card:hover .product-actions {
            opacity: 1;
            transform: translateY(0);
        }

        .product-img-wrap {
            position: relative;
            aspect-ratio: 1/1;
            overflow: hidden;
            background: var(--bg);
        }

        .product-img-wrap img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform .4s;
        }

        .product-card:hover .product-img-wrap img {
            transform: scale(1.06);
        }

        .product-badge {
            position: absolute;
            top: 10px;
            left: 10px;
            background: var(--accent-dark);
            color: white;
            font-size: .7rem;
            font-weight: 700;
            padding: 3px 10px;
            border-radius: 50px;
        }

        .product-badge.badge-new {
            background: var(--primary);
        }

        .product-wish {
            position: absolute;
            top: 10px;
            right: 10px;
            width: 32px;
            height: 32px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-muted);
            font-size: .85rem;
            box-shadow: var(--shadow-sm);
            border: none;
            cursor: pointer;
            transition: color .2s, transform .2s;
        }

        .product-wish:hover {
            color: #E76F51;
            transform: scale(1.1);
        }

        .product-actions {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 10px;
            display: flex;
            gap: 6px;
            opacity: 0;
            transform: translateY(8px);
            transition: all .2s;
        }

        .btn-cart {
            flex: 1;
            background: var(--primary);
            color: white;
            border: none;
            border-radius: var(--radius-sm);
            padding: 8px;
            font-size: .8rem;
            font-weight: 600;
            cursor: pointer;
            transition: background .2s;
        }

        .btn-cart:hover {
            background: var(--primary-dark);
        }

        .btn-buy {
            flex: 1;
            background: var(--accent-dark);
            color: white;
            border: none;
            border-radius: var(--radius-sm);
            padding: 8px;
            font-size: .8rem;
            font-weight: 600;
            cursor: pointer;
            transition: background .2s;
        }

        .btn-buy:hover {
            background: #c45c3e;
        }

        .product-info {
            padding: 14px;
        }

        .product-store {
            display: flex;
            align-items: center;
            gap: 4px;
            font-size: .75rem;
            color: var(--text-muted);
            margin-bottom: 4px;
        }

        .product-store i {
            color: var(--primary);
            font-size: .7rem;
        }

        .product-name {
            font-weight: 700;
            font-size: .9rem;
            color: var(--text);
            margin-bottom: 6px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            line-height: 1.4;
        }

        .product-price {
            font-family: 'Fraunces', serif;
            font-size: 1.05rem;
            font-weight: 700;
            color: var(--primary-dark);
        }

        .product-price-original {
            font-size: .78rem;
            font-weight: 400;
            color: var(--text-muted);
            text-decoration: line-through;
            font-family: 'Plus Jakarta Sans', sans-serif;
            margin-left: 4px;
        }

        .product-meta {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 8px;
        }

        .product-rating {
            display: flex;
            align-items: center;
            gap: 3px;
            font-size: .75rem;
            color: var(--text-muted);
        }

        .product-rating i {
            color: #F4A261;
        }

        .product-sold {
            font-size: .75rem;
            color: var(--text-muted);
        }

        /* ===== CATEGORIES GRID ===== */
        .categories-section {
            padding: 60px 0;
            background: white;
        }

        .cat-grid-card {
            border-radius: var(--radius-md);
            padding: 24px 16px;
            text-align: center;
            background: var(--bg);
            border: 1.5px solid var(--border);
            transition: all .2s;
            text-decoration: none;
            display: block;
        }

        .cat-grid-card:hover {
            border-color: var(--primary);
            background: rgba(45, 106, 79, .04);
            transform: translateY(-4px);
            box-shadow: var(--shadow-md);
        }

        .cat-grid-icon {
            width: 56px;
            height: 56px;
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 12px;
            font-size: 1.4rem;
        }

        .cat-grid-name {
            font-weight: 700;
            font-size: .875rem;
            color: var(--text);
            margin-bottom: 2px;
        }

        .cat-grid-count {
            font-size: .75rem;
            color: var(--text-muted);
        }

        /* ===== BUMDES SECTION ===== */
        .bumdes-section {
            padding: 60px 0;
        }

        .bumdes-card {
            background: white;
            border-radius: var(--radius-md);
            border: 1px solid var(--border);
            overflow: hidden;
            transition: transform .2s, box-shadow .2s;
            text-decoration: none;
            display: block;
        }

        .bumdes-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-lg);
        }

        .bumdes-cover {
            height: 100px;
            background: linear-gradient(135deg, var(--primary-dark), var(--primary-light));
            position: relative;
        }

        .bumdes-logo {
            width: 60px;
            height: 60px;
            border-radius: var(--radius-md);
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            position: absolute;
            bottom: -20px;
            left: 20px;
            box-shadow: var(--shadow-sm);
        }

        .bumdes-body {
            padding: 28px 20px 20px;
        }

        .bumdes-name {
            font-weight: 700;
            font-size: .95rem;
            color: var(--text);
            margin-bottom: 4px;
        }

        .bumdes-desa {
            font-size: .8rem;
            color: var(--text-muted);
            margin-bottom: 12px;
        }

        .bumdes-stats {
            display: flex;
            gap: 16px;
        }

        .bumdes-stat {
            font-size: .75rem;
            color: var(--text-muted);
        }

        .bumdes-stat strong {
            color: var(--text);
            font-size: .875rem;
            display: block;
        }

        .bumdes-rating {
            display: flex;
            align-items: center;
            gap: 4px;
            font-size: .78rem;
            color: var(--text-muted);
        }

        .bumdes-rating i {
            color: #F4A261;
        }

        /* ===== TESTIMONIAL ===== */
        .testimonial-section {
            padding: 60px 0;
            background: white;
        }

        .testi-card {
            background: var(--bg);
            border-radius: var(--radius-md);
            border: 1px solid var(--border);
            padding: 24px;
        }

        .testi-stars {
            color: #F4A261;
            font-size: .9rem;
            margin-bottom: 14px;
        }

        .testi-text {
            font-size: .9rem;
            color: var(--text);
            line-height: 1.7;
            margin-bottom: 16px;
            font-style: italic;
        }

        .testi-user {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .testi-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: .85rem;
        }

        .testi-name {
            font-weight: 700;
            font-size: .875rem;
        }

        .testi-loc {
            font-size: .75rem;
            color: var(--text-muted);
        }

        /* ===== FOOTER ===== */
        .site-footer {
            background: var(--primary-dark);
            color: rgba(255, 255, 255, .8);
            padding: 60px 0 24px;
        }

        .footer-brand-text {
            font-family: 'Fraunces', serif;
            font-size: 1.4rem;
            font-weight: 700;
            color: white;
        }

        .footer-desc {
            font-size: .875rem;
            line-height: 1.7;
            margin: 12px 0 20px;
        }

        .footer-socials {
            display: flex;
            gap: 10px;
        }

        .social-btn {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: rgba(255, 255, 255, .1);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            font-size: .9rem;
            transition: background .2s;
        }

        .social-btn:hover {
            background: var(--primary-light);
            color: white;
        }

        .footer-heading {
            font-weight: 700;
            font-size: .875rem;
            color: white;
            text-transform: uppercase;
            letter-spacing: .5px;
            margin-bottom: 16px;
        }

        .footer-links {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .footer-links li {
            margin-bottom: 10px;
        }

        .footer-links a {
            color: rgba(255, 255, 255, .65);
            text-decoration: none;
            font-size: .875rem;
            transition: color .2s;
        }

        .footer-links a:hover {
            color: var(--accent);
        }

        .footer-divider {
            border-color: rgba(255, 255, 255, .1);
            margin: 32px 0 20px;
        }

        .footer-bottom {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            align-items: center;
            justify-content: space-between;
            font-size: .8rem;
            color: rgba(255, 255, 255, .5);
        }

        /* ===== UTILITIES ===== */
        .gap-product {
            gap: 20px;
        }

        @media (max-width: 991.98px) {
            .search-wrapper {
                max-width: 100%;
                margin: 12px 0;
            }

            .hero-image-wrap {
                margin-top: 40px;
            }

            .hero-floating-badge.badge-tl {
                top: -8px;
                left: 0;
            }

            .hero-floating-badge.badge-br {
                bottom: -8px;
                right: 0;
            }
        }

        @media (max-width: 575.98px) {
            .hero-stats {
                gap: 20px;
            }

            .hero-stat-num {
                font-size: 1.5rem;
            }
        }
    </style>
</head>

<body>

    {{-- ===== NAVBAR ===== --}}
    @include('user.partials.navbar')
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif
    {{-- ===== HERO ===== --}}
    <section class="hero-section">
        <div class="container position-relative">
            <div class="row align-items-center">

                <div class="col-lg-6">
                    <div class="hero-badge">
                        <i class="fa-solid fa-leaf"></i>
                        Platform Produk Desa Indonesia
                    </div>
                    <h1 class="hero-title">
                        Temukan Produk <em>Asli Desa</em> Terbaik
                    </h1>
                    <p class="hero-desc">
                        Belanja langsung dari BUMDes dan pengusaha desa se-Indonesia.
                        Produk lokal berkualitas, pengiriman terpercaya.
                    </p>
                    <div class="hero-cta">
                        <a href="#produk" class="btn-hero-primary">
                            Belanja Sekarang
                        </a>
                        <a href="{{ url('/bumdes') }}" class="btn-hero-outline">
                            <i class="fa-solid fa-store me-1"></i> Jelajahi BUMDes
                        </a>
                    </div>
                    <div class="hero-stats">
                        <div class="hero-stat-item">
                            <div class="hero-stat-num">2.4K+</div>
                            <div class="hero-stat-label">Produk Aktif</div>
                        </div>
                        <div class="hero-stat-item">
                            <div class="hero-stat-num">380+</div>
                            <div class="hero-stat-label">BUMDes Bergabung</div>
                        </div>
                        <div class="hero-stat-item">
                            <div class="hero-stat-num">18K+</div>
                            <div class="hero-stat-label">Pembeli Puas</div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="hero-image-wrap">
                        <div class="hero-img-card">
                            <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=480&h=400&fit=crop"
                                alt="Produk Desa" loading="lazy">
                            <div class="hero-floating-badge badge-tl">
                                <span class="badge-icon">🌾</span>
                                <div>
                                    <div style="font-size:.65rem;opacity:.7">Produk Terlaris</div>
                                    <div style="font-size:.85rem">Kerajinan Lokal</div>
                                </div>
                            </div>
                            <div class="hero-floating-badge badge-br">
                                <span class="badge-icon">⭐</span>
                                <div>
                                    <div style="font-size:.65rem;opacity:.7">Rating Rata-rata</div>
                                    <div style="font-size:.85rem">4.9 / 5.0</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- ===== PROMO BANNER ===== --}}
    <section class="promo-section">
        <div class="container">
            <div class="row g-3">
                <div class="col-md-5">
                    <a href="#" class="promo-card promo-card-green h-100">
                        <div>
                            <div class="promo-tag">🎉 Promo Spesial</div>
                            <div class="promo-title">Diskon s/d 50%<br>Produk Pertanian</div>
                            <div class="promo-desc">Berlaku hingga akhir bulan ini</div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="#" class="promo-card promo-card-orange h-100">
                        <div>
                            <div class="promo-tag">🚚 Gratis Ongkir</div>
                            <div class="promo-title">Belanja min. Rp 100.000</div>
                            <div class="promo-desc">Ke seluruh Indonesia</div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="#" class="promo-card promo-card-teal h-100">
                        <div>
                            <div class="promo-tag">🏆 BUMDes Pilihan</div>
                            <div class="promo-title">Produk Unggulan Minggu Ini</div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- ===== KATEGORI ===== --}}
    <section class="categories-section">
        <div class="container">
            <div class="d-flex align-items-end justify-content-between section-header">
                <div>
                    <div class="section-tag">Kategori</div>
                    <h2 class="section-title mb-0">Belanja Sesuai Kebutuhan</h2>
                </div>
                <a href="{{ url('/kategori') }}" class="btn-see-all">
                    Lihat Semua <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
            <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-6 g-3">
                @php
                $categories = [
                ['icon' => '🍽️', 'color' => '#FFF3E0', 'name' => 'Makanan', 'count' => '320 produk'],
                ['icon' => '🥤', 'color' => '#E3F2FD', 'name' => 'Minuman', 'count' => '180 produk'],
                ['icon' => '🎨', 'color' => '#F3E5F5', 'name' => 'Kerajinan', 'count' => '540 produk'],
                ['icon' => '🌾', 'color' => '#E8F5E9', 'name' => 'Pertanian', 'count' => '290 produk'],
                ['icon' => '👗', 'color' => '#FCE4EC', 'name' => 'Fashion', 'count' => '210 produk'],
                ['icon' => '🎁', 'color' => '#FFF8E1', 'name' => 'Oleh-oleh', 'count' => '415 produk'],
                ];
                @endphp
                @foreach($categories as $cat)
                <div class="col">
                    <a href="{{ url('/produk?kategori='.strtolower($cat['name'])) }}" class="cat-grid-card">
                        <div class="cat-grid-icon" style="background: {{ $cat['color'] }}">
                            {{ $cat['icon'] }}
                        </div>
                        <div class="cat-grid-name">{{ $cat['name'] }}</div>
                        <div class="cat-grid-count">{{ $cat['count'] }}</div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ===== PRODUK TERLARIS ===== --}}
    <section id="produk" class="products-section">
        <div class="container">
            <div class="d-flex align-items-end justify-content-between section-header">
                <div>
                    <div class="section-tag">🔥 Terlaris</div>
                    <h2 class="section-title mb-1">Produk Pilihan Hari Ini</h2>
                    <p class="section-subtitle mb-0">Dipilih berdasarkan popularitas & rating pembeli</p>
                </div>
                <!-- <a href="{{ url('/produk') }}" class="btn-see-all d-none d-sm-flex">
                    Lihat Semua <i class="fa-solid fa-arrow-right"></i>
                </a> -->
            </div>

            <div class="row row-cols-2 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-3">

                @foreach($products as $p)
                <div class="col">
                    <div class="product-card"
                        onclick="window.location='{{ route('produk.show', $p->id_produk) }}'"
                        style="cursor:pointer;">

                        <div class="product-img-wrap">
                            <img src="https://via.placeholder.com/400" alt="{{ $p->nama_produk }}">

                            <div class="product-actions">
                                <button onclick="tambahKeranjang({{ $p->id_produk }})" class="btn-cart">
                                    🛒 Keranjang
                                </button>
                                <form action="{{ route('buy.now') }}" method="POST" onclick="event.stopPropagation();">
                                    @csrf
                                    <input type="hidden" name="id_produk" value="{{ $p->id_produk }}">
                                    <button class="btn-buy">
                                        Beli
                                    </button>
                                </form>
                            </div>
                        </div>

                        <div class="product-info">
                            <div class="product-name">
                                {{ $p->nama_produk }}
                            </div>

                            <span class="product-price">
                                Rp {{ number_format($p->harga_dasar) }}
                            </span>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>

            <div class="text-center mt-4 d-sm-none">
                <a href="{{ url('/produk') }}" class="btn-see-all">
                    Lihat Semua Produk <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </section>

    {{-- ===== BUMDES ===== --}}
    <section class="bumdes-section">
        <div class="container">
            <div class="d-flex align-items-end justify-content-between section-header">
                <div>
                    <div class="section-tag">🏡 BUMDes</div>
                    <h2 class="section-title mb-1">BUMDes Unggulan</h2>
                    <p class="section-subtitle mb-0">BUMDes terpercaya dengan produk berkualitas</p>
                </div>
                <a href="{{ url('/bumdes') }}" class="btn-see-all d-none d-sm-flex">
                    Lihat Semua <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 g-3">
                @php
                $bumdes = [
                ['name' => 'BUMDes Maju Sejahtera', 'desa' => 'Desa Sukamaju, Jawa Barat', 'icon' => '🌾', 'produk' => 48, 'terjual' => '2.3K', 'rating' => '4.9', 'cover' => '#2D6A4F'],
                ['name' => 'BUMDes Gayo Kopi', 'desa' => 'Desa Paya Tumpi, Aceh', 'icon' => '☕', 'produk' => 23, 'terjual' => '1.8K', 'rating' => '4.8', 'cover' => '#6B3F2A'],
                ['name' => 'BUMDes Rimba Madu', 'desa' => 'Desa Rimba Raya, Kalimantan', 'icon' => '🍯', 'produk' => 15, 'terjual' => '3.1K', 'rating' => '5.0', 'cover' => '#8B6914'],
                ['name' => 'Tenun Flores Heritage', 'desa' => 'Desa Sikka, NTT', 'icon' => '🧵', 'produk' => 37, 'terjual' => '980', 'rating' => '4.9', 'cover' => '#7B2D8B'],
                ];
                @endphp
                @foreach($bumdes as $b)
                <div class="col">
                    <a href="{{ url('/bumdes/detail') }}" class="bumdes-card">
                        <div class="bumdes-cover" style="background: linear-gradient(135deg, {{ $b['cover'] }}, {{ $b['cover'] }}aa);">
                            <div class="bumdes-logo">{{ $b['icon'] }}</div>
                        </div>
                        <div class="bumdes-body">
                            <div class="bumdes-name">{{ $b['name'] }}</div>
                            <div class="bumdes-desa"><i class="fa-solid fa-location-dot me-1" style="color:var(--primary)"></i>{{ $b['desa'] }}</div>
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="bumdes-stats">
                                    <div class="bumdes-stat">
                                        <strong>{{ $b['produk'] }}</strong>
                                        Produk
                                    </div>
                                    <div class="bumdes-stat">
                                        <strong>{{ $b['terjual'] }}</strong>
                                        Terjual
                                    </div>
                                </div>
                                <div class="bumdes-rating">
                                    <i class="fa-solid fa-star"></i> {{ $b['rating'] }}
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ===== TESTIMONIAL ===== --}}
    <section class="testimonial-section">
        <div class="container">
            <div class="text-center section-header">
                <div class="section-tag mx-auto">💬 Testimonial</div>
                <h2 class="section-title">Kata Mereka</h2>
                <p class="section-subtitle">Ribuan pembeli sudah merasakan manfaat belanja di BataraShop</p>
            </div>
            <div class="row g-3">
                @php
                $testimonials = [
                ['initial' => 'A', 'name' => 'Andi Pratama', 'loc' => 'Jakarta', 'stars' => 5, 'text' => '"Produk kopi dari BUMDes Gayo benar-benar autentik! Aromanya luar biasa dan pengiriman cepat. Saya sudah langganan setiap bulan."'],
                ['initial' => 'S', 'name' => 'Siti Rahayu', 'loc' => 'Surabaya', 'stars' => 5, 'text' => '"Tas anyaman yang saya beli kualitasnya bagus banget, jahitannya rapi. Senang bisa mendukung pengrajin desa langsung."'],
                ['initial' => 'B', 'name' => 'Budi Santoso', 'loc' => 'Bandung', 'stars' => 5, 'text' => '"Sambal bajak Bu Tini enak banget! Rasanya homemade dan original. Harganya juga terjangkau, worth it banget."'],
                ];
                @endphp
                @foreach($testimonials as $t)
                <div class="col-md-4">
                    <div class="testi-card">
                        <div class="testi-stars">
                            @for($i = 0; $i < $t['stars']; $i++) ★ @endfor
                                </div>
                                <div class="testi-text">{{ $t['text'] }}</div>
                                <div class="testi-user">
                                    <div class="testi-avatar">{{ $t['initial'] }}</div>
                                    <div>
                                        <div class="testi-name">{{ $t['name'] }}</div>
                                        <div class="testi-loc"><i class="fa-solid fa-location-dot me-1"></i>{{ $t['loc'] }}</div>
                                    </div>
                                </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
    </section>

    {{-- ===== FOOTER ===== --}}
    <footer class="site-footer">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <div class="brand-icon"><i class="fa-solid fa-leaf"></i></div>
                        <span class="footer-brand-text">Batara<span style="color:var(--accent)">Shop</span></span>
                    </div>
                    <p class="footer-desc">
                        Platform e-commerce untuk produk unggulan BUMDes dan UMKM desa se-Indonesia.
                        Mendukung ekonomi desa, mempertemukan pembeli dengan penjual lokal terpercaya.
                    </p>
                    <div class="footer-socials">
                        <a href="#" class="social-btn"><i class="fa-brands fa-instagram"></i></a>
                        <a href="#" class="social-btn"><i class="fa-brands fa-facebook"></i></a>
                        <a href="#" class="social-btn"><i class="fa-brands fa-tiktok"></i></a>
                        <a href="#" class="social-btn"><i class="fa-brands fa-whatsapp"></i></a>
                    </div>
                </div>
                <div class="col-6 col-lg-2">
                    <div class="footer-heading">Belanja</div>
                    <ul class="footer-links">
                        <li><a href="#">Semua Produk</a></li>
                        <li><a href="#">Produk Terlaris</a></li>
                        <li><a href="#">Promo & Diskon</a></li>
                        <li><a href="#">BUMDes Pilihan</a></li>
                    </ul>
                </div>
                <div class="col-6 col-lg-2">
                    <div class="footer-heading">Akun</div>
                    <ul class="footer-links">
                        <li><a href="#">Profil Saya</a></li>
                        <li><a href="#">Pesanan Saya</a></li>
                        <li><a href="#">Wishlist</a></li>
                        <li><a href="#">Daftar Toko</a></li>
                    </ul>
                </div>
                <div class="col-6 col-lg-2">
                    <div class="footer-heading">Bantuan</div>
                    <ul class="footer-links">
                        <li><a href="#">Cara Pembelian</a></li>
                        <li><a href="#">Kebijakan Return</a></li>
                        <li><a href="#">Hubungi Kami</a></li>
                        <li><a href="#">FAQ</a></li>
                    </ul>
                </div>
                <div class="col-6 col-lg-2">
                    <div class="footer-heading">Ikuti Kami</div>
                    <ul class="footer-links">
                        <li><a href="#">Blog BUMDes</a></li>
                        <li><a href="#">Tentang Kami</a></li>
                        <li><a href="#">Karir</a></li>
                        <li><a href="#">Privasi & Syarat</a></li>
                    </ul>
                </div>
            </div>
            <hr class="footer-divider">
            <div class="footer-bottom">
                <span>© 2025 BataraShop. Hak Cipta Dilindungi.</span>
                <span>Dibuat dengan ❤️ untuk desa Indonesia</span>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Navbar shadow on scroll
        window.addEventListener('scroll', () => {
            const nav = document.getElementById('mainNavbar');
            nav.classList.toggle('scrolled', window.scrollY > 20);
        });

        // Wishlist toggle
        document.querySelectorAll('.product-wish').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.stopPropagation();
                const icon = this.querySelector('i');
                if (icon.classList.contains('fa-regular')) {
                    icon.classList.replace('fa-regular', 'fa-solid');
                    this.style.color = '#E76F51';
                } else {
                    icon.classList.replace('fa-solid', 'fa-regular');
                    this.style.color = '';
                }
            });
        });

        

</body>

</html>