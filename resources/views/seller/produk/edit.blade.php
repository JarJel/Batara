@include('seller.partials.sidebar')

<div style="margin-left:270px; padding:20px;">
    <h2>Edit Produk</h2>

    <form action="{{ route('seller.produk.update', $produk->id_produk) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label>Nama Produk</label><br>
            <input type="text" name="nama_produk" value="{{ $produk->nama_produk }}">
        </div>

        <div>
            <label>Harga</label><br>
            <input type="number" name="harga_dasar" value="{{ $produk->harga_dasar }}">
        </div>

        <div>
            <label>Deskripsi</label><br>
            <textarea name="deskripsi">{{ $produk->deskripsi }}</textarea>
        </div>

        <br>
        <button type="submit">Update</button>
    </form>
</div>