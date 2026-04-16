@extends('seller.layouts.app')

@section('title', 'Produk Saya')

@push('styles')
<style>
    .page-title {
        font-family: 'Fraunces', serif;
        font-size: 1.4rem;
        font-weight: 700;
        color: var(--text);
        margin-bottom: 4px;
    }

    .page-sub {
        font-size: .82rem;
        color: var(--text-muted);
        margin-bottom: 24px;
    }

    /* ALERT */
    .bs-alert-success {
        background: #E8F5E9;
        border: 1px solid #A5D6A7;
        color: #1B5E20;
        border-radius: 10px;
        padding: 11px 16px;
        font-size: .875rem;
        font-weight: 600;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    /* HEADER ROW */
    .produk-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 20px;
    }

    .btn-tambah-produk {
        background: linear-gradient(135deg, var(--primary), var(--primary-light));
        color: #fff;
        border: none;
        border-radius: 50px;
        padding: 10px 22px;
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-weight: 700;
        font-size: .875rem;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 7px;
        transition: opacity .2s;
    }

    .btn-tambah-produk:hover {
        opacity: .9;
        color: #fff;
    }

    /* TABLE CARD */
    .table-card {
        background: #fff;
        border-radius: var(--radius-md);
        border: 1px solid var(--border);
        overflow: hidden;
    }

    .bs-table {
        width: 100%;
        border-collapse: collapse;
    }

    .bs-table th {
        padding: 11px 16px;
        font-size: .72rem;
        font-weight: 700;
        color: var(--text-muted);
        text-transform: uppercase;
        letter-spacing: .4px;
        border-bottom: 1px solid var(--border);
        text-align: left;
        background: var(--bg);
    }

    .bs-table td {
        padding: 13px 16px;
        font-size: .875rem;
        color: var(--text);
        border-bottom: 1px solid var(--border);
        vertical-align: middle;
    }

    .bs-table tr:last-child td {
        border-bottom: none;
    }

    .bs-table tr:hover td {
        background: rgba(45, 106, 79, .02);
    }

    /* PRODUCT CELL */
    .product-cell {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .product-thumb {
        width: 44px;
        height: 44px;
        border-radius: 8px;
        background: var(--bg);
        border: 1px solid var(--border);
        object-fit: cover;
        flex-shrink: 0;
    }

    .product-name {
        font-weight: 700;
        font-size: .875rem;
        color: var(--text);
    }

    /* PRICE */
    .product-price {
        font-family: 'Fraunces', serif;
        font-weight: 700;
        color: var(--primary-dark);
    }

    /* ACTION BUTTONS */
    .btn-edit {
        border: 1.5px solid var(--border);
        color: var(--primary);
        background: none;
        border-radius: 50px;
        padding: 5px 14px;
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-size: .75rem;
        font-weight: 700;
        text-decoration: none;
        transition: all .2s;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 4px;
    }

    .btn-edit:hover {
        border-color: var(--primary);
        background: rgba(45, 106, 79, .04);
        color: var(--primary);
    }

    .btn-hapus {
        border: 1.5px solid #FECDD3;
        color: var(--accent-dark);
        background: none;
        border-radius: 50px;
        padding: 5px 14px;
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-size: .75rem;
        font-weight: 700;
        cursor: pointer;
        transition: all .2s;
        display: inline-flex;
        align-items: center;
        gap: 4px;
    }

    .btn-hapus:hover {
        background: #FFF1F2;
        border-color: var(--accent-dark);
    }

    /* EMPTY STATE */
    .empty-state {
        text-align: center;
        padding: 48px 24px;
    }

    .empty-state i {
        font-size: 2.5rem;
        color: var(--border);
        margin-bottom: 12px;
        display: block;
    }

    .empty-state h3 {
        font-family: 'Fraunces', serif;
        font-size: 1rem;
        color: var(--text);
        margin-bottom: 6px;
    }

    .empty-state p {
        font-size: .82rem;
        color: var(--text-muted);
        margin-bottom: 16px;
    }

    /* Tombol Lihat Varian */
    .btn-lihat-varian {
        background: var(--bg);
        border: 1px solid var(--border);
        color: var(--primary);
        padding: 4px 10px;
        border-radius: 6px;
        font-size: .75rem;
        font-weight: 700;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        transition: all 0.2s;
    }

    .btn-lihat-varian:hover {
        background: var(--primary);
        color: #fff;
        border-color: var(--primary);
    }

    /* Modal Custom Styling */
    .modal-content {
        border-radius: 15px;
        border: none;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    .modal-header {
        border-bottom: 1px solid var(--border);
        padding: 20px;
    }

    .modal-title {
        font-family: 'Fraunces', serif;
        font-weight: 700;
        color: var(--text);
    }

    .variant-table {
        width: 100%;
        font-size: 0.85rem;
    }

    .variant-table th {
        background: var(--bg);
        color: var(--text-muted);
        text-transform: uppercase;
        font-size: 0.65rem;
        letter-spacing: 0.5px;
        padding: 10px;
    }

    .variant-table td {
        padding: 10px;
        border-bottom: 1px solid var(--border);
    }
</style>
@endpush

@section('content')

<div class="produk-header">
    <div>
        <div class="page-title">Produk Saya</div>
        <div class="page-sub">Kelola semua produk yang kamu jual di toko ini</div>
    </div>
    <a href="{{ route('seller.produk.create') }}" class="btn-tambah-produk">
        <i class="fa-solid fa-plus"></i>
        Tambah Produk
    </a>
</div>

@if(session('success'))
<div class="bs-alert-success">
    <i class="fa-solid fa-circle-check"></i>
    {{ session('success') }}
</div>
@endif

<div class="table-card">
    <table class="bs-table">
        <thead>
            <tr>
                <th>Produk</th>
                <th>Varian</th>
                <th>Harga</th>
                <th>Berat</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($produk as $p)
            <tr>
                <td>
                    <div class="product-cell">
                        <img src="https://via.placeholder.com/44"
                            alt="{{ $p->nama_produk }}"
                            class="product-thumb">
                        <span class="product-name">{{ $p->nama_produk }}</span>
                    </div>
                </td>
                <td>
                    @if($p->varian->count())
                    <button class="btn-lihat-varian"
                        onclick="openModalVarian({{ $p->id_produk }})">

                        {{ $p->varian->count() }} varian
                    </button>
                    @else
                    <span style="color:var(--text-muted);font-size:.75rem;">—</span>
                    @endif
                </td>
                <td>
                    <span class="product-price">Rp {{ number_format($p->harga_dasar) }}</span>
                </td>
                <td>
                    <span class="product-price">Rp {{ number_format($p->berat) }}</span>
                </td>
                <td style="color:var(--text-muted);font-weight:600;">
                    {{ $p->stok ?? '-' }}
                </td>
                <td>
                    <div style="display:flex;gap:6px;align-items:center;">
                        <a href="{{ route('seller.produk.edit', $p->id_produk) }}" class="btn-edit">
                            <i class="fa-solid fa-pen" style="font-size:.65rem"></i> Edit
                        </a>
                        <form action="{{ route('seller.produk.destroy', $p->id_produk) }}"
                            method="POST" style="display:inline;"
                            onsubmit="return confirm('Hapus produk ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-hapus">
                                <i class="fa-solid fa-trash-can" style="font-size:.65rem"></i> Hapus
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4">
                    <div class="empty-state">
                        <i class="fa-solid fa-box-open"></i>
                        <h3>Belum Ada Produk</h3>
                        <p>Kamu belum menambahkan produk apapun ke toko ini.</p>
                        <a href="{{ route('seller.produk.create') }}" class="btn-tambah-produk">
                            <i class="fa-solid fa-plus"></i> Tambah Produk Pertama
                        </a>
                    </div>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="modal fade" id="modalVarian" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="modalVarianTitle">Varian Produk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body p-0">

                <div id="loadingVarian" class="text-center py-4">
                    Loading...
                </div>

                <table class="variant-table" id="tableVarianContent" style="display:none;">
                    <thead>
                        <tr>
                            <th>Nama Varian</th>
                            <th>Harga</th>
                            <th>Stok</th>
                        </tr>
                    </thead>
                    <tbody id="listVarian"></tbody>
                </table>

            </div>

        </div>
    </div>
</div>
<script>
function openModalVarian(id) {

    const modal = new bootstrap.Modal(document.getElementById('modalVarian'));
    modal.show();

    // tampilkan loading
    document.getElementById('loadingVarian').style.display = 'block';
    document.getElementById('tableVarianContent').style.display = 'none';

    fetch(`/seller/produk/${id}/varian`)
        .then(response => response.json())
        .then(data => {

            if (!data.status) {
                alert('Data tidak ditemukan');
                return;
            }

            // set title
            document.getElementById('modalVarianTitle').innerText = 'Varian: ' + data.nama_produk;

            const list = document.getElementById('listVarian');
            list.innerHTML = '';

            if (data.varian.length > 0) {
                data.varian.forEach(v => {
                    list.innerHTML += `
                        <tr>
                            <td style="font-weight:600;">${v.nama_varian}</td>
                            <td>Rp ${new Intl.NumberFormat('id-ID').format(v.harga_varian)}</td>
                            <td>${v.stok_varian}</td>
                        </tr>
                    `;
                });
            } else {
                list.innerHTML = `
                    <tr>
                        <td colspan="3" style="text-align:center;color:gray;">
                            Tidak ada varian
                        </td>
                    </tr>
                `;
            }

            // tampilkan tabel
            document.getElementById('loadingVarian').style.display = 'none';
            document.getElementById('tableVarianContent').style.display = 'table';
        })
        .catch(err => {
            console.error(err);
            alert('Terjadi error');
        });
}
</script>
@endsection