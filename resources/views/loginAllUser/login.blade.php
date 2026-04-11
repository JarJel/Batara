<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

  <style>
    body {
      background: linear-gradient(135deg, #667eea, #764ba2);
    }
    .card {
      border-radius: 20px;
    }
    .form-control {
      border-radius: 12px;
      padding: 12px;
    }
    .btn-gradient {
      background: linear-gradient(135deg, #667eea, #764ba2);
      border: none;
      color: white;
      font-weight: bold;
      border-radius: 12px;
    }
  </style>
</head>

<body>

<section class="d-flex align-items-center" style="min-height: 100vh;">
  <div class="container">
    <div class="row align-items-center">

      <!-- TEXT -->
      <div class="col-lg-6 text-white mb-5 mb-lg-0">
        <h1 class="display-4 fw-bold mb-3">Welcome Back! 👋</h1>
        <p class="lead">
          Masuk ke akun kamu dan kelola bisnis cafe dengan lebih mudah.
        </p>
      </div>

      <!-- FORM -->
      <div class="col-lg-6">
        <div class="card shadow-lg p-4">
          <div class="card-body">

            <h3 class="text-center mb-4 fw-bold">Login</h3>

            {{-- SUCCESS --}}
            @if(session('success'))
              <div class="alert alert-success">
                {{ session('success') }}
              </div>
            @endif

            {{-- ERROR --}}
            @if(session('error'))
              <div class="alert alert-danger">
                {{ session('error') }}
              </div>
            @endif

            <form method="POST" action="{{ route('login.store') }}">
              @csrf

              <!-- EMAIL -->
              <div class="mb-3">
                <input
                  type="email"
                  name="email"
                  class="form-control"
                  placeholder="Email Address"
                  required
                >
              </div>

              <!-- PASSWORD -->
              <div class="mb-3">
                <input
                  type="password"
                  name="password"
                  class="form-control"
                  placeholder="Password"
                  required
                >
              </div>

              <!-- REMEMBER -->
              <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox">
                <label class="form-check-label">
                  Remember me
                </label>
              </div>

              <!-- BUTTON -->
              <button type="submit" class="btn btn-gradient w-100 py-2 mb-3">
                Login
              </button>

              <div class="text-center">
                <p class="text-muted">Belum punya akun?</p>
                <a href="{{ route('register') }}" class="btn btn-outline-secondary btn-sm">
                  Daftar di sini
                </a>
              </div>

            </form>

          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>