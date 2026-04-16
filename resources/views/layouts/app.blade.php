<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BataraShop</title>

    @vite(['resources/css/app.css', 'resources/js/app.jsx'])
</head>

<body>

    {{-- NAVBAR --}}
    @include('partials.navbar')

    {{-- KONTEN HALAMAN --}}
    <div class="container">
        @yield('content')
    </div>

</body>
</html>