<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Seller Panel') – BataraShop</title>

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

    /* LAYOUT */
    .seller-layout {
      display: flex;
      min-height: calc(100vh - 57px);
    }

    .seller-content {
      margin-left: 248px;
      flex: 1;
      padding: 28px;
      min-width: 0;
    }

    @media (max-width: 991.98px) {
      .seller-content { margin-left: 0; }
    }
  </style>

  @stack('styles')
</head>
<body>

  <div class="seller-layout">
    @include('seller.partials.sidebar')

    <main class="seller-content">
      @yield('content')
    </main>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  @stack('scripts')
</body>
</html>