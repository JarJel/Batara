<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar – BataraShop</title>

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
      --text: #1A2E1A;
      --text-muted: #6B7C6B;
      --border: #E2EBE2;
    }

    *,
    *::before,
    *::after {
      box-sizing: border-box;
    }

    body {
      font-family: 'Plus Jakarta Sans', sans-serif;
      margin: 0;
      min-height: 100vh;
      background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary) 50%, #52B788 100%);
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 32px 16px;
      position: relative;
      overflow-x: hidden;
    }

    body::before {
      content: '';
      position: absolute;
      inset: 0;
      background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none'%3E%3Cg fill='%23ffffff' fill-opacity='0.04'%3E%3Ccircle cx='30' cy='30' r='4'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
    }

    .auth-inner {
      position: relative;
      width: 100%;
      max-width: 960px;
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 48px;
      align-items: center;
    }

    /* LEFT */
    .auth-badge {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      background: rgba(255, 255, 255, .15);
      border: 1px solid rgba(255, 255, 255, .25);
      color: #fff;
      padding: 5px 14px;
      border-radius: 50px;
      font-size: .78rem;
      font-weight: 600;
      margin-bottom: 20px;
    }

    .auth-title {
      font-family: 'Fraunces', serif;
      font-size: clamp(1.8rem, 4vw, 2.8rem);
      font-weight: 700;
      color: #fff;
      line-height: 1.15;
      margin-bottom: 14px;
    }

    .auth-title em {
      font-style: italic;
      color: var(--accent);
    }

    .auth-desc {
      color: rgba(255, 255, 255, .8);
      font-size: .95rem;
      line-height: 1.7;
      margin-bottom: 28px;
    }

    .auth-stats {
      display: flex;
      gap: 24px;
    }

    .auth-stat-num {
      font-family: 'Fraunces', serif;
      font-size: 1.6rem;
      font-weight: 700;
      color: var(--accent);
      line-height: 1;
    }

    .auth-stat-lbl {
      font-size: .75rem;
      opacity: .75;
      margin-top: 3px;
      color: #fff;
    }

    /* CARD */
    .auth-card {
      background: #fff;
      border-radius: 20px;
      padding: 36px 32px;
      box-shadow: 0 24px 64px rgba(0, 0, 0, .18);
    }

    .auth-card-brand {
      display: flex;
      align-items: center;
      gap: 8px;
      justify-content: center;
      margin-bottom: 24px;
    }

    .auth-card-brand-icon {
      width: 32px;
      height: 32px;
      background: var(--primary);
      border-radius: 8px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #fff;
      font-size: 14px;
    }

    .auth-card-brand-name {
      font-family: 'Fraunces', serif;
      font-size: 1.2rem;
      font-weight: 700;
      color: var(--primary-dark);
    }

    .auth-card-brand-name span {
      color: var(--accent-dark);
    }

    .auth-card-title {
      font-family: 'Fraunces', serif;
      font-size: 1.3rem;
      font-weight: 700;
      color: var(--text);
      margin-bottom: 4px;
      text-align: center;
    }

    .auth-card-sub {
      font-size: .82rem;
      color: var(--text-muted);
      text-align: center;
      margin-bottom: 24px;
    }

    .auth-card-sub a {
      color: var(--primary);
      font-weight: 700;
      text-decoration: none;
    }

    /* ALERTS */
    .auth-alert-success {
      background: #E8F5E9;
      border: 1px solid #A5D6A7;
      color: #1B5E20;
      border-radius: 10px;
      padding: 10px 14px;
      font-size: .82rem;
      font-weight: 600;
      margin-bottom: 16px;
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .auth-alert-error {
      background: #FFF1F2;
      border: 1px solid #FECDD3;
      color: #9F1239;
      border-radius: 10px;
      padding: 10px 14px;
      font-size: .82rem;
      font-weight: 600;
      margin-bottom: 16px;
      display: flex;
      align-items: flex-start;
      gap: 8px;
    }

    /* FORM */
    .auth-form-group {
      display: flex;
      flex-direction: column;
      gap: 4px;
      margin-bottom: 14px;
    }

    .auth-form-group label {
      font-size: .75rem;
      font-weight: 700;
      color: var(--text-muted);
    }

    .auth-input-wrap {
      position: relative;
    }

    .auth-input {
      width: 100%;
      border: 1.5px solid var(--border);
      border-radius: 10px;
      padding: 10px 12px 10px 38px;
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-size: .875rem;
      color: var(--text);
      outline: none;
      background: #fff;
      transition: border-color .2s;
    }

    .auth-input:focus {
      border-color: var(--primary-light);
      box-shadow: 0 0 0 3px rgba(64, 145, 108, .08);
    }

    .auth-input-icon {
      position: absolute;
      left: 12px;
      top: 50%;
      transform: translateY(-50%);
      color: var(--text-muted);
      font-size: .8rem;
      pointer-events: none;
    }

    .auth-remember {
      display: flex;
      align-items: center;
      gap: 8px;
      margin-bottom: 20px;
    }

    .auth-remember input {
      accent-color: var(--primary);
      width: 15px;
      height: 15px;
      cursor: pointer;
    }

    .auth-remember label {
      font-size: .8rem;
      color: var(--text-muted);
      cursor: pointer;
    }

    .auth-btn {
      width: 100%;
      background: linear-gradient(135deg, var(--primary), var(--primary-light));
      color: #fff;
      border: none;
      border-radius: 50px;
      padding: 13px;
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-weight: 700;
      font-size: .95rem;
      cursor: pointer;
      margin-bottom: 16px;
      transition: opacity .2s;
    }

    .auth-btn:hover {
      opacity: .9;
    }

    .auth-footer {
      text-align: center;
      font-size: .8rem;
      color: var(--text-muted);
    }

    .auth-footer a {
      color: var(--primary);
      font-weight: 700;
      text-decoration: none;
    }

    @media (max-width: 767.98px) {
      .auth-inner {
        grid-template-columns: 1fr;
      }

      .auth-left {
        display: none;
      }

      .auth-card {
        padding: 28px 20px;
      }
    }
  </style>
</head>

<body>
  <div class="auth-inner">

    {{-- KIRI --}}
    <div class="auth-left">
      <div class="auth-badge">
        <i class="fa-solid fa-leaf"></i>
        Platform Produk Desa Indonesia
      </div>
      <h1 class="auth-title">
        Bergabung &<br><em>Mulai Belanja</em>
      </h1>
      <p class="auth-desc">
        Daftar gratis dan nikmati kemudahan belanja produk desa
        berkualitas langsung dari seluruh Indonesia.
      </p>
      <div class="auth-stats">
        <div>
          <div class="auth-stat-num">Gratis</div>
          <div class="auth-stat-lbl">Daftar akun</div>
        </div>
        <div>
          <div class="auth-stat-num">Aman</div>
          <div class="auth-stat-lbl">Data terlindungi</div>
        </div>
        <div>
          <div class="auth-stat-num">Cepat</div>
          <div class="auth-stat-lbl">Proses mudah</div>
        </div>
      </div>
    </div>

    {{-- KANAN: CARD --}}
    <div>
      <div class="auth-card">

        <div class="auth-card-brand">
          <div class="auth-card-brand-icon">
            <i class="fa-solid fa-leaf"></i>
          </div>
          <span class="auth-card-brand-name">
            Batara<span>Shop</span>
          </span>
        </div>

        <div class="auth-card-title">Buat Akun Baru</div>
        <div class="auth-card-sub">
          Sudah punya akun?
          <a href="{{ route('login') }}">Masuk di sini</a>
        </div>

        @if(session('success'))
        <div class="auth-alert-success">
          <i class="fa-solid fa-circle-check"></i>
          {{ session('success') }}
        </div>
        @endif

        @if($errors->any())
        <div class="auth-alert-error">
          <i class="fa-solid fa-circle-exclamation" style="margin-top:2px;flex-shrink:0"></i>
          <div>
            @foreach($errors->all() as $error)
            <div>{{ $error }}</div>
            @endforeach
          </div>
        </div>
        @endif

        <form method="POST" action="{{ route('register.store') }}">
          @csrf

          <div class="auth-form-row">
            <div class="auth-form-group">
              <label>Nama Lengkap</label>
              <div class="auth-input-wrap">
                <i class="fa-regular fa-user auth-input-icon"></i>
                <input type="text" name="nama_lengkap" class="auth-input"
                  placeholder="Nama lengkap"
                  value="{{ old('nama_lengkap') }}" required>
              </div>
            </div>
            <div class="auth-form-group">
              <label>Username</label>
              <div class="auth-input-wrap">
                <i class="fa-solid fa-at auth-input-icon"></i>
                <input type="text" name="nama_pengguna" class="auth-input"
                  placeholder="Username unik"
                  value="{{ old('nama_pengguna') }}" required>
              </div>
            </div>
          </div>

          <div class="auth-form-group">
            <label>Email</label>
            <div class="auth-input-wrap">
              <i class="fa-regular fa-envelope auth-input-icon"></i>
              <input type="email" name="email" class="auth-input"
                placeholder="nama@email.com"
                value="{{ old('email') }}" required>
            </div>
          </div>

          <div class="auth-form-group">
            <label>Kata Sandi</label>
            <div class="auth-input-wrap">
              <i class="fa-solid fa-lock auth-input-icon"></i>
              <input type="password" name="kata_sandi" class="auth-input"
                placeholder="Minimal 8 karakter" required>
            </div>
          </div>

          <div class="auth-remember">
            <input type="checkbox" id="agree" required>
            <label for="agree">
              Saya setuju dengan
              <a href="#" style="color:var(--primary);font-weight:700;text-decoration:none;">
                Syarat &amp; Ketentuan
              </a>
            </label>
          </div>

          <button type="submit" class="auth-btn">
            <i class="fa-solid fa-user-plus me-2"></i>
            Daftar Sekarang
          </button>

          <div class="auth-footer">
            Sudah punya akun?
            <a href="{{ route('login') }}">Masuk di sini</a>
          </div>

        </form>
      </div>
    </div>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>