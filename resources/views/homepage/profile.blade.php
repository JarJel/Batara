<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Saya – BataraShop</title>

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

        /* LAYOUT */
        .profile-layout {
            display: grid;
            grid-template-columns: 300px 1fr;
            gap: 24px;
            align-items: start;
        }

        /* PROFILE SIDEBAR */
        .profile-sidebar-card {
            background: #fff;
            border-radius: var(--radius-md);
            border: 1px solid var(--border);
            overflow: hidden;
        }

        .profile-cover {
            height: 80px;
            background: linear-gradient(135deg, var(--primary-dark), var(--primary-light));
        }

        .profile-sidebar-body {
            padding: 0 20px 20px;
        }

        .avatar-wrap {
            margin-top: -30px;
            margin-bottom: 12px;
        }

        .avatar {
            width: 64px;
            height: 64px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            border: 3px solid #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-family: 'Fraunces', serif;
            font-size: 1.4rem;
            font-weight: 700;
        }

        .profile-name {
            font-family: 'Fraunces', serif;
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--text);
            margin-bottom: 2px;
        }

        .profile-username {
            font-size: .8rem;
            color: var(--text-muted);
            margin-bottom: 4px;
        }

        .profile-email {
            font-size: .8rem;
            color: var(--text-muted);
            display: flex;
            align-items: center;
            gap: 4px;
            margin-bottom: 16px;
        }

        .stat-chips {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 8px;
            margin-bottom: 16px;
        }

        .stat-chip {
            background: var(--bg);
            border-radius: 10px;
            padding: 10px 12px;
            text-align: center;
        }

        .stat-chip .num {
            font-family: 'Fraunces', serif;
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--primary-dark);
        }

        .stat-chip .lbl {
            font-size: .7rem;
            color: var(--text-muted);
        }

        .profile-nav {
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .profile-nav-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 9px 12px;
            border-radius: var(--radius-sm);
            font-size: .875rem;
            font-weight: 600;
            color: var(--text-muted);
            text-decoration: none;
            transition: all .2s;
        }

        .profile-nav-item:hover {
            background: var(--bg);
            color: var(--primary);
        }

        .profile-nav-item.active {
            background: rgba(45, 106, 79, .08);
            color: var(--primary);
        }

        /* RIGHT CARDS */
        .pro-card {
            background: #fff;
            border-radius: var(--radius-md);
            border: 1px solid var(--border);
            overflow: hidden;
            margin-bottom: 16px;
        }

        .pro-card:last-child {
            margin-bottom: 0;
        }

        .pro-card-header {
            padding: 16px 20px;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .pro-card-header h2 {
            font-family: 'Fraunces', serif;
            font-size: 1rem;
            font-weight: 700;
            color: var(--text);
            margin: 0;
        }

        .pro-card-body {
            padding: 20px;
        }

        .btn-edit-profil {
            background: none;
            border: 1.5px solid var(--border);
            color: var(--primary);
            border-radius: 50px;
            padding: 5px 14px;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: .78rem;
            font-weight: 700;
            cursor: pointer;
            transition: all .2s;
            text-decoration: none;
        }

        .btn-edit-profil:hover {
            border-color: var(--primary);
            background: rgba(45, 106, 79, .04);
            color: var(--primary);
        }

        /* INFO GRID */
        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
        }

        .info-item label {
            font-size: .75rem;
            font-weight: 700;
            color: var(--text-muted);
            display: block;
            margin-bottom: 3px;
        }

        .info-item .val {
            font-size: .875rem;
            font-weight: 600;
            color: var(--text);
            padding: 8px 12px;
            background: var(--bg);
            border-radius: var(--radius-sm);
            border: 1px solid var(--border);
        }

        /* ALAMAT */
        .alamat-item {
            border: 1.5px solid var(--border);
            border-radius: 10px;
            padding: 14px 16px;
            margin-bottom: 10px;
            transition: border-color .2s;
        }

        .alamat-item:last-child {
            margin-bottom: 0;
        }

        .alamat-item.default {
            border-color: var(--primary-light);
            background: rgba(45, 106, 79, .02);
        }

        .alamat-name {
            font-weight: 700;
            font-size: .9rem;
            color: var(--text);
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 2px;
        }

        .alamat-phone {
            font-size: .78rem;
            color: var(--text-muted);
            margin-bottom: 6px;
        }

        .alamat-addr {
            font-size: .82rem;
            color: var(--text);
            line-height: 1.55;
        }

        .alamat-actions {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-top: 10px;
        }

        .badge-utama {
            background: rgba(45, 106, 79, .1);
            color: var(--primary);
            border-radius: 50px;
            padding: 2px 10px;
            font-size: .7rem;
            font-weight: 700;
        }

        .btn-jadikan-utama {
            background: none;
            border: 1.5px solid var(--border);
            color: var(--primary);
            border-radius: 50px;
            padding: 4px 12px;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: .72rem;
            font-weight: 700;
            cursor: pointer;
            transition: all .2s;
        }

        .btn-jadikan-utama:hover {
            border-color: var(--primary);
            background: rgba(45, 106, 79, .04);
        }

        .btn-hapus-alamat {
            background: none;
            border: 1.5px solid #FECDD3;
            color: var(--accent-dark);
            border-radius: 50px;
            padding: 4px 12px;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: .72rem;
            font-weight: 700;
            cursor: pointer;
            transition: all .2s;
        }

        .btn-hapus-alamat:hover {
            background: #FFF1F2;
            border-color: var(--accent-dark);
        }

        /* FORM */
        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .form-group.full {
            grid-column: 1 / -1;
        }

        .form-group label {
            font-size: .78rem;
            font-weight: 600;
            color: var(--text-muted);
        }

        .form-group input,
        .form-group textarea {
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

        .form-group input:focus,
        .form-group textarea:focus {
            border-color: var(--primary-light);
            box-shadow: 0 0 0 3px rgba(64, 145, 108, .08);
        }

        .form-group textarea {
            resize: none;
            height: 70px;
        }

        .btn-save-alamat {
            background: linear-gradient(135deg, var(--primary), var(--primary-light));
            color: #fff;
            border: none;
            border-radius: 50px;
            padding: 11px 28px;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 700;
            font-size: .875rem;
            cursor: pointer;
            margin-top: 16px;
        }

        .btn-save-alamat:hover {
            opacity: .9;
        }

        @media (max-width: 991.98px) {
            .profile-layout {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 575.98px) {

            .info-grid,
            .form-grid {
                grid-template-columns: 1fr;
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
                <span>Profil Saya</span>
            </div>
            <div class="section-tag">Akun</div>
            <h1><i class="fa-regular fa-user me-2"></i>Profil Saya</h1>
            <p>Kelola informasi akun dan alamat pengiriman</p>
        </div>
    </div>

    {{-- MAIN --}}
    <div class="container py-4">
        <div class="profile-layout">

            {{-- SIDEBAR --}}
            <div>
                <div class="profile-sidebar-card">
                    <div class="profile-cover"></div>
                    <div class="profile-sidebar-body">
                        <div class="avatar-wrap">
                            <div class="avatar">
                                {{ strtoupper(substr($user->nama_lengkap ?? $user->nama_pengguna, 0, 1)) }}
                            </div>
                        </div>
                        <div class="profile-name">{{ $user->nama_lengkap ?? $user->nama_pengguna }}</div>
                        <div class="profile-username">{{ $user->nama_pengguna }}</div>
                        <div class="profile-email">
                            <i class="fa-regular fa-envelope" style="font-size:.75rem"></i>
                            {{ $user->email }}
                        </div>
                        <div class="stat-chips">
                            <div class="stat-chip">
                                <div class="num">{{ $user->pesanan_count ?? 0 }}</div>
                                <div class="lbl">Pesanan</div>
                            </div>
                            <div class="stat-chip">
                                <div class="num">{{ $alamat->count() }}</div>
                                <div class="lbl">Alamat</div>
                            </div>
                        </div>
                        <hr style="border:none;border-top:1px solid var(--border);margin:0 0 14px;">
                        <nav class="profile-nav">
                            <a href="{{ url('/profil') }}" class="profile-nav-item active">
                                <i class="fa-regular fa-user" style="width:15px;text-align:center"></i>
                                Profil Saya
                            </a>
                            <a href="{{ url('/pesanan') }}" class="profile-nav-item">
                                <i class="fa-regular fa-clipboard" style="width:15px;text-align:center"></i>
                                Pesanan Saya
                            </a>
                            <a href="{{ url('/wishlist') }}" class="profile-nav-item">
                                <i class="fa-regular fa-heart" style="width:15px;text-align:center"></i>
                                Wishlist
                            </a>
                            <a href="{{ url('/pengaturan') }}" class="profile-nav-item">
                                <i class="fa-solid fa-gear" style="width:15px;text-align:center"></i>
                                Pengaturan
                            </a>
                        </nav>
                    </div>
                </div>
            </div>

            {{-- KONTEN KANAN --}}
            <div>

                {{-- INFO AKUN --}}
                <div class="pro-card">
                    <div class="pro-card-header">
                        <h2>
                            <i class="fa-regular fa-user me-2" style="color:var(--primary)"></i>
                            Informasi Akun
                        </h2>

                        <button class="btn-edit-profil"
                            data-bs-toggle="modal"
                            data-bs-target="#editProfileModal">
                            <i class="fa-solid fa-pen me-1"></i> Edit Profil
                        </button>
                    </div>
                    <div class="pro-card-body">
                        <div class="info-grid">
                            <div class="info-item">
                                <label>Nama Lengkap</label>
                                <div class="val">{{ $user->nama_lengkap ?? '-' }}</div>
                            </div>
                            <div class="info-item">
                                <label>Username</label>
                                <div class="val">{{ $user->nama_pengguna }}</div>
                            </div>
                            <div class="info-item">
                                <label>Email</label>
                                <div class="val">{{ $user->email }}</div>
                            </div>
                            <div class="info-item">
                                <label>No. Telepon</label>
                                <div class="val">{{ $user->nomor_telepon ?? '-' }}</div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- ALAMAT --}}
                <div class="pro-card">
                    <div class="pro-card-header">
                        <h2><i class="fa-solid fa-location-dot me-2" style="color:var(--primary)"></i>Alamat Saya</h2>
                        <span style="font-size:.8rem;color:var(--text-muted)">{{ $alamat->count() }} alamat tersimpan</span>
                    </div>
                    <div class="pro-card-body">

                        @forelse($alamat as $a)
                        <div class="alamat-item {{ $a->is_default ? 'default' : '' }}">
                            <div class="alamat-name">
                                {{ $a->nama_penerima }}
                                @if($a->is_default)
                                <span class="badge-utama">Utama</span>
                                @endif
                            </div>
                            <div class="alamat-phone">
                                <i class="fa-solid fa-phone" style="font-size:.65rem;color:var(--primary);margin-right:4px"></i>
                                {{ $a->no_hp }}
                            </div>
                            <div class="alamat-addr">
                                {{ $a->alamat_lengkap }}, {{ $a->kota }}
                                @if($a->kode_pos), {{ $a->kode_pos }}@endif
                            </div>
                            <div class="alamat-actions">
                                @if(!$a->is_default)
                                <a href="{{ route('profile.alamat.default', $a->id_alamat) }}" class="btn-jadikan-utama">
                                    <i class="fa-regular fa-star me-1"></i> Jadikan Utama
                                </a>
                                @endif
                                <form action="{{ route('profile.alamat.delete', $a->id_alamat) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger"
                                        onclick="return confirm('Hapus alamat ini?')">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                        @empty
                        <p style="color:var(--text-muted);font-size:.875rem;text-align:center;padding:20px 0">
                            Belum ada alamat tersimpan.
                        </p>
                        @endforelse

                    </div>
                </div>

                {{-- TAMBAH ALAMAT --}}
                <div class="pro-card">
                    <div class="pro-card-header">
                        <h2><i class="fa-solid fa-plus me-2" style="color:var(--primary)"></i>Tambah Alamat Baru</h2>
                    </div>
                    <div class="pro-card-body">
                        <form method="POST" action="{{ route('profile.alamat.store') }}">
                            @csrf
                            <div class="form-grid">
                                <div class="form-group">
                                    <label>Nama Penerima</label>
                                    <input type="text" name="nama_penerima" placeholder="Nama lengkap penerima" required>
                                </div>
                                <div class="form-group">
                                    <label>No. HP</label>
                                    <input type="text" name="no_hp" placeholder="08xx-xxxx-xxxx" required>
                                </div>
                                <div class="form-group">
                                    <label>Kota / Kabupaten</label>
                                    <input type="text" name="kota" placeholder="Kota atau kabupaten" required>
                                </div>
                                <div class="form-group">
                                    <label>Kode Pos</label>
                                    <input type="text" name="kode_pos" placeholder="xxxxx">
                                </div>
                                <div class="form-group full">
                                    <label>Alamat Lengkap</label>
                                    <textarea name="alamat_lengkap" placeholder="Nama jalan, nomor rumah, RT/RW, kelurahan, kecamatan..." required></textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn-save-alamat">
                                <i class="fa-solid fa-check me-2"></i> Simpan Alamat
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="editProfileModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Edit Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <form method="POST" action="{{ route('profile.update') }}">
                    @csrf
                    @method('PUT')

                    <div class="modal-body">

                        <div class="mb-3">
                            <label>Nama Lengkap</label>
                            <input type="text" name="nama_lengkap"
                                class="form-control"
                                value="{{ $user->nama_lengkap }}" required>
                        </div>

                        <div class="mb-3">
                            <label>Username</label>
                            <input type="text" name="nama_pengguna"
                                class="form-control"
                                value="{{ $user->nama_pengguna }}" required>
                        </div>

                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" name="email"
                                class="form-control"
                                value="{{ $user->email }}" required>
                        </div>

                        <div class="mb-3">
                            <label>No HP</label>
                            <input type="text" name="nomor_telepon"
                                class="form-control"
                                value="{{ $user->nomor_telepon }}"
                                placeholder="08xxxxxxxxxx">
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Batal
                        </button>
                        <button type="submit" class="btn btn-primary">
                            Simpan Perubahan
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>