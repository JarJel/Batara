<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register Page</title>

  <!-- Bootstrap CSS -->
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
        <h1 class="display-4 fw-bold mb-3">
          Grow Your Business 🚀
        </h1>
        <p class="lead">
          Kelola bisnis cafe kamu dengan lebih mudah dan modern.
        </p>
      </div>

      <!-- FORM -->
      <div class="col-lg-6">
        <div class="card shadow-lg p-4">
          <div class="card-body">

            <h3 class="text-center mb-4 fw-bold">Create Account</h3>

            {{-- ALERT SUCCESS --}}
            @if(session('success'))
              <div class="alert alert-success">
                {{ session('success') }}
              </div>
            @endif

            {{-- ERROR VALIDATION --}}
            @if($errors->any())
              <div class="alert alert-danger">
                <ul class="mb-0">
                  @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif

            <form method="POST" action="{{ route('register.store') }}">
              @csrf

              <div class="row">
                <div class="col-md-6 mb-3">
                  <input type="text" name="nama_lengkap" class="form-control" placeholder="Full name" required>
                </div>
                <div class="col-md-6 mb-3">
                  <input type="text" name="nama pengguna" class="form-control" placeholder="Username" required>
                </div>
              </div>

              <div class="mb-3">
                <input type="email" name="email" class="form-control mb-3" placeholder="Email Address" required>
                <input type="password" name="kata_sandi" class="form-control" placeholder="Password" required>
              </div>

              <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox">
                <label class="form-check-label">
                  Remember me
                </label>
              </div>

              <button type="submit" class="btn btn-gradient w-100 py-2 mb-3">
                Sign Up
              </button>

              <div class="text-center">
                <p class="text-muted">Sudah punya akun?</p>
                <a href="{{ route('login') }}" class="btn btn-outline-secondary btn-sm">
                  Login di sini
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