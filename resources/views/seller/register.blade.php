<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Seller – BataraShop</title>

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

        /* BENEFITS */
        .benefits-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 12px;
            margin-bottom: 28px;
        }

        .benefit-card {
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 16px;
            text-align: center;
        }

        .benefit-icon {
            width: 40px;
            height: 40px;
            background: #E8F5E9;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            font-size: 16px;
            margin: 0 auto 8px;
        }

        .benefit-title {
            font-weight: 700;
            font-size: .82rem;
            color: var(--text);
            margin-bottom: 3px;
        }

        .benefit-desc {
            font-size: .72rem;
            color: var(--text-muted);
            line-height: 1.4;
        }

        /* FORM CARD */
        .form-card {
            background: #fff;
            border-radius: var(--radius-md);
            border: 1px solid var(--border);
            overflow: hidden;
        }

        .form-card-header {
            padding: 16px 20px;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .form-card-header h2 {
            font-family: 'Fraunces', serif;
            font-size: 1rem;
            font-weight: 700;
            color: var(--text);
            margin: 0;
        }

        .step-badge {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            background: var(--primary);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: .8rem;
            flex-shrink: 0;
        }

        .form-card-body {
            padding: 24px;
        }

        /* ALERT */
        .alert-error {
            background: #FFF1F2;
            border: 1px solid #FECDD3;
            color: #9F1239;
            border-radius: 10px;
            padding: 12px 16px;
            font-size: .875rem;
            font-weight: 600;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        /* FORM FIELDS */
        .seller-form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }

        .seller-form-group {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .seller-form-group.full {
            grid-column: 1 / -1;
        }

        .seller-form-group label {
            font-size: .78rem;
            font-weight: 700;
            color: var(--text-muted);
        }

        .seller-form-group input,
        .seller-form-group textarea,
        .seller-form-group select {
            border: 1.5px solid var(--border);
            border-radius: var(--radius-sm);
            padding: 10px 13px;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: .875rem;
            color: var(--text);
            outline: none;
            background: #fff;
            transition: border-color .2s;
        }

        .seller-form-group input:focus,
        .seller-form-group textarea:focus,
        .seller-form-group select:focus {
            border-color: var(--primary-light);
            box-shadow: 0 0 0 3px rgba(64, 145, 108, .08);
        }

        .seller-form-group textarea {
            resize: none;
            height: 80px;
        }

        .form-hint {
            font-size: .7rem;
            color: var(--text-muted);
            margin-top: 2px;
        }

        /* SUBMIT AREA */
        .form-submit {
            padding: 20px 24px;
            border-top: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            flex-wrap: wrap;
        }

        .submit-note {
            font-size: .75rem;
            color: var(--text-muted);
            line-height: 1.6;
        }

        .submit-note a {
            color: var(--primary);
            font-weight: 600;
            text-decoration: none;
        }

        .btn-daftar-seller {
            background: linear-gradient(135deg, var(--primary), var(--primary-light));
            color: #fff;
            border: none;
            border-radius: 50px;
            padding: 13px 32px;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 700;
            font-size: .95rem;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
            white-space: nowrap;
        }

        .btn-daftar-seller:hover {
            opacity: .9;
        }

        @media (max-width: 767.98px) {
            .benefits-grid {
                grid-template-columns: 1fr;
            }

            .seller-form-grid {
                grid-template-columns: 1fr;
            }

            .form-submit {
                flex-direction: column;
                align-items: stretch;
            }

            .btn-daftar-seller {
                justify-content: center;
            }
        }
    </style>
</head>

<body>
    @if(session('success'))
    <p style="color:green;">{{ session('success') }}</p>
    @endif

    {{-- PAGE HEADER --}}
    <div class="page-header">
        <div class="container">
            <div class="bs-breadcrumb">
                <a href="{{ url('/') }}">Beranda</a>
                <i class="fa-solid fa-chevron-right mx-1" style="font-size:.6rem"></i>
                <span>Daftar Seller</span>
            </div>
            <div class="section-tag">Seller</div>
            <h1><i class="fa-solid fa-store me-2"></i>Daftar Menjadi Seller</h1>
            <p>Mulai jual produk desa kamu dan jangkau pembeli se-Indonesia</p>
        </div>
    </div>

    <div class="container py-4" style="max-width:800px">

        {{-- ERROR ALERT --}}
        @if(session('error'))
        <div class="alert-error">
            <i class="fa-solid fa-circle-exclamation"></i>
            {{ session('error') }}
        </div>
        @endif

        @if($errors->any())
        <div class="alert-error">
            <i class="fa-solid fa-circle-exclamation"></i>
            <div>
                @foreach($errors->all() as $e)
                <div>{{ $e }}</div>
                @endforeach
            </div>
        </div>
        @endif

        {{-- BENEFITS --}}
        <div class="benefits-grid">
            <div class="benefit-card">
                <div class="benefit-icon">
                    <i class="fa-solid fa-circle-check"></i>
                </div>
                <div class="benefit-title">Gratis Daftar</div>
                <div class="benefit-desc">Tidak ada biaya pendaftaran maupun biaya bulanan</div>
            </div>
            <div class="benefit-card">
                <div class="benefit-icon">
                    <i class="fa-solid fa-truck"></i>
                </div>
                <div class="benefit-title">Jangkauan Luas</div>
                <div class="benefit-desc">Produkmu bisa dilihat pembeli di seluruh Indonesia</div>
            </div>
            <div class="benefit-card">
                <div class="benefit-icon">
                    <i class="fa-solid fa-wallet"></i>
                </div>
                <div class="benefit-title">Pembayaran Aman</div>
                <div class="benefit-desc">Dana masuk langsung ke rekeningmu secara otomatis</div>
            </div>
        </div>

        {{-- FORM CARD --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="step-badge">
                    <i class="fa-solid fa-store" style="font-size:.65rem"></i>
                </div>
                <h2>Informasi Toko</h2>
            </div>

            <form action="{{ route('seller.store') }}" method="POST">
                @csrf

                <div class="form-card-body">
                    <div class="seller-form-grid">

                        <div class="seller-form-group full">
                            <label>Nama Toko <span style="color:var(--accent-dark)">*</span></label>
                            <input type="text" name="nama_toko"
                                value="{{ old('nama_toko') }}"
                                placeholder="cth: BUMDes Maju Sejahtera" required>
                            <span class="form-hint">Nama toko akan ditampilkan ke pembeli</span>
                        </div>

                        <div class="seller-form-group full">
                            <label>Deskripsi Toko</label>
                            <textarea name="deskripsi"
                                placeholder="Ceritakan tentang toko dan produk yang kamu jual...">{{ old('deskripsi') }}</textarea>
                        </div>

                        <div class="seller-form-group full">
                            <label>Alamat Toko <span style="color:var(--accent-dark)">*</span></label>
                            <textarea name="alamat_toko"
                                placeholder="Nama jalan, desa/kelurahan, kecamatan, kota, provinsi..."
                                required>{{ old('alamat_toko') }}</textarea>
                        </div>

                        <div class="seller-form-group">
                            <label>No. Telepon <span style="color:var(--accent-dark)">*</span></label>
                            <input type="text" name="nomor_telepon"
                                value="{{ old('nomor_telepon') }}"
                                placeholder="08xx-xxxx-xxxx" required>
                            <span class="form-hint">Untuk koordinasi pesanan dari pembeli</span>
                        </div>

                        <!-- <div class="seller-form-group">
              <label>Kategori Produk Utama</label>
              <select name="kategori">
                <option value="">Pilih kategori</option>
                <option value="makanan"   {{ old('kategori') == 'makanan'   ? 'selected' : '' }}>Makanan</option>
                <option value="minuman"   {{ old('kategori') == 'minuman'   ? 'selected' : '' }}>Minuman</option>
                <option value="kerajinan" {{ old('kategori') == 'kerajinan' ? 'selected' : '' }}>Kerajinan</option>
                <option value="pertanian" {{ old('kategori') == 'pertanian' ? 'selected' : '' }}>Pertanian</option>
                <option value="fashion"   {{ old('kategori') == 'fashion'   ? 'selected' : '' }}>Fashion</option>
                <option value="oleholeh"  {{ old('kategori') == 'oleholeh'  ? 'selected' : '' }}>Oleh-oleh</option>
              </select>
            </div> -->

                    </div>
                </div>

                <div class="form-submit">
                    <div class="submit-note">
                        Dengan mendaftar, kamu menyetujui<br>
                        <a href="#">Syarat &amp; Ketentuan</a> BataraShop untuk Seller.
                    </div>
                    <button type="submit" class="btn-daftar-seller">
                        <i class="fa-solid fa-store"></i>
                        Daftar Jadi Seller
                    </button>
                </div>

            </form>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>