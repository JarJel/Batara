<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Detail Pesanan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-5">

  <h3>Detail Pesanan #{{ $order->id_pesanan }}</h3>
  <p>Status: <strong>{{ $order->status }}</strong></p>

  <table class="table table-bordered mt-3">
    <thead>
      <tr>
        <th>Produk</th>
        <th>Harga</th>
        <th>Jumlah</th>
        <th>Subtotal</th>
      </tr>
    </thead>

    <tbody>
      @foreach($items as $item)
      <tr>
        <td>{{ $item->nama_produk_snapshot }}</td>
        <td>Rp {{ number_format($item->harga_saat_pesan) }}</td>
        <td>{{ $item->jumlah }}</td>
        <td>Rp {{ number_format($item->harga_saat_pesan * $item->jumlah) }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>

  <h5 class="text-end">
    Total: Rp {{ number_format($order->total_harga_produk) }}
  </h5>

</div>

</body>
</html>