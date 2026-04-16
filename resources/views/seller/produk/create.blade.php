@extends('seller.layouts.app')

@section('title', 'Tambah Produk')

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

    /* BREADCRUMB */
    .bs-breadcrumb {
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: .8rem;
        color: var(--text-muted);
        margin-bottom: 20px;
    }

    .bs-breadcrumb a {
        color: var(--primary);
        text-decoration: none;
        font-weight: 600;
    }

    .bs-breadcrumb a:hover {
        color: var(--primary-dark);
    }

    /* CARD */
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
        gap: 10px;
    }

    .pro-card-header h2 {
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
        font-size: .72rem;
        font-weight: 700;
        flex-shrink: 0;
    }

    .pro-card-body {
        padding: 20px;
    }

    /* FORM */
    .form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 16px;
    }

    .form-group {
        display: flex;
        flex-direction: column;
        gap: 5px;
    }

    .form-group.full {
        grid-column: 1 / -1;
    }

    .form-group label {
        font-size: .78rem;
        font-weight: 700;
        color: var(--text-muted);
    }

    .form-group label .req {
        color: var(--accent-dark);
    }

    .form-group input,
    .form-group textarea,
    .form-group select {
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

    .form-group input:focus,
    .form-group textarea:focus,
    .form-group select:focus {
        border-color: var(--primary-light);
        box-shadow: 0 0 0 3px rgba(64, 145, 108, .08);
    }

    .form-group textarea {
        resize: vertical;
        min-height: 90px;
    }

    .form-hint {
        font-size: .7rem;
        color: var(--text-muted);
        margin-top: 2px;
    }

    /* VARIAN */
    .varian-item {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr auto;
        gap: 10px;
        align-items: center;
        padding: 12px 14px;
        background: var(--bg);
        border: 1.5px solid var(--border);
        border-radius: 10px;
        margin-bottom: 8px;
        transition: border-color .2s;
    }

    .varian-item:hover {
        border-color: var(--primary-light);
    }

    .varian-item input {
        border: 1.5px solid var(--border);
        border-radius: var(--radius-sm);
        padding: 8px 12px;
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-size: .85rem;
        color: var(--text);
        outline: none;
        background: #fff;
        transition: border-color .2s;
        width: 100%;
    }

    .varian-item input:focus {
        border-color: var(--primary-light);
        box-shadow: 0 0 0 3px rgba(64, 145, 108, .08);
    }

    .btn-hapus-varian {
        width: 32px;
        height: 32px;
        border: 1.5px solid #FECDD3;
        background: none;
        color: var(--accent-dark);
        border-radius: 50%;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        transition: all .2s;
        font-size: .8rem;
    }

    .btn-hapus-varian:hover {
        background: #FFF1F2;
        border-color: var(--accent-dark);
    }

    .btn-tambah-varian {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        border: 1.5px dashed var(--border);
        background: none;
        color: var(--primary);
        border-radius: 10px;
        padding: 9px 16px;
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-size: .82rem;
        font-weight: 700;
        cursor: pointer;
        transition: all .2s;
        margin-top: 4px;
        width: 100%;
        justify-content: center;
    }

    .btn-tambah-varian:hover {
        border-color: var(--primary);
        background: rgba(45, 106, 79, .03);
    }

    /* SUBMIT */
    .form-actions {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        padding: 20px 20px;
        border-top: 1px solid var(--border);
        background: #fff;
    }

    .btn-simpan {
        background: linear-gradient(135deg, var(--primary), var(--primary-light));
        color: #fff;
        border: none;
        border-radius: 50px;
        padding: 12px 32px;
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-weight: 700;
        font-size: .95rem;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: opacity .2s;
    }

    .btn-simpan:hover {
        opacity: .9;
    }

    .btn-batal {
        border: 1.5px solid var(--border);
        background: none;
        color: var(--text-muted);
        border-radius: 50px;
        padding: 11px 24px;
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-weight: 600;
        font-size: .875rem;
        text-decoration: none;
        transition: all .2s;
    }

    .btn-batal:hover {
        border-color: var(--text-muted);
        color: var(--text);
    }

    /* ALERT */
    .bs-alert-error {
        background: #FFF1F2;
        border: 1px solid #FECDD3;
        color: #9F1239;
        border-radius: 10px;
        padding: 11px 16px;
        font-size: .875rem;
        font-weight: 600;
        margin-bottom: 20px;
        display: flex;
        align-items: flex-start;
        gap: 8px;
    }

    @media (max-width: 575.98px) {
        .form-grid {
            grid-template-columns: 1fr;
        }

        .varian-item {
            grid-template-columns: 1fr;
        }
    }
</style>
@endpush

@section('content')

{{-- BREADCRUMB --}}
<div class="bs-breadcrumb">
    <a href="{{ route('seller.dashboard') }}">Dashboard</a>
    <i class="fa-solid fa-chevron-right" style="font-size:.6rem"></i>
    <a href="{{ route('seller.produk.index') }}">Produk</a>
    <i class="fa-solid fa-chevron-right" style="font-size:.6rem"></i>
    <span>Tambah Produk</span>
</div>

<div class="page-title">Tambah Produk</div>
<div class="page-sub">Isi detail produk yang ingin kamu jual di toko</div>

@if($errors->any())
<div class="bs-alert-error">
    <i class="fa-solid fa-circle-exclamation" style="margin-top:2px;flex-shrink:0"></i>
    <div>
        @foreach($errors->all() as $error)
        <div>{{ $error }}</div>
        @endforeach
    </div>
</div>
@endif

<form action="{{ route('seller.produk.store') }}" method="POST">
    @csrf

    {{-- INFORMASI DASAR --}}
    <div class="pro-card">
        <div class="pro-card-header">
            <div class="step-badge">1</div>
            <h2>Informasi Dasar</h2>
        </div>
        <div class="pro-card-body">
            <div class="form-grid">

                <div class="form-group full">
                    <label>Nama Produk <span class="req">*</span></label>
                    <input type="text" name="nama_produk"
                        value="{{ old('nama_produk') }}"
                        placeholder="cth: Madu Hutan Liar Kalimantan 500ml" required>
                </div>

                <div class="form-group">
                    <label>Harga Dasar <span class="req">*</span></label>
                    <input type="number" name="harga_dasar"
                        value="{{ old('harga_dasar') }}"
                        placeholder="0" min="0" required>
                    <span class="form-hint">Harga sebelum diskon dalam Rupiah</span>
                </div>

                <div class="form-group">
                    <label>Kategori</label>

                    <select name="id_kategori" required>
                        <option value="">Pilih Kategori</option>

                        @foreach($kategori as $k)
                        <option value="{{ $k->id_kategori }}"
                            {{ old('id_kategori') == $k->id_kategori ? 'selected' : '' }}>
                            {{ $k->nama_kategori }}
                        </option>
                        @endforeach

                    </select>
                </div>

                <div class="form-group">
                    <label>Berat (gram)</label>
                    <input type="number" name="berat"
                        value="{{ old('berat') }}"
                        placeholder="cth: 500">
                    <span class="form-hint">Untuk kalkulasi ongkos kirim</span>
                </div>

                <div class="form-group full">
                    <label>Deskripsi Produk</label>
                    <textarea name="deskripsi"
                        placeholder="Ceritakan tentang produk kamu — bahan, keunggulan, cara penggunaan...">{{ old('deskripsi') }}</textarea>
                </div>

            </div>
        </div>
    </div>

    {{-- VARIAN --}}
    <div class="pro-card">
        <div class="pro-card-header">
            <div class="step-badge">2</div>
            <h2>Varian Produk <span style="font-family:'Plus Jakarta Sans',sans-serif;font-size:.75rem;font-weight:400;color:var(--text-muted);margin-left:4px;">(Opsional)</span></h2>
        </div>
        <div class="pro-card-body">

            <div style="display:grid;grid-template-columns:1fr 1fr 1fr auto;gap:10px;padding:0 0 8px;margin-bottom:4px;">
                <span style="font-size:.72rem;font-weight:700;color:var(--text-muted);text-transform:uppercase;letter-spacing:.4px;">Nama Varian</span>
                <span style="font-size:.72rem;font-weight:700;color:var(--text-muted);text-transform:uppercase;letter-spacing:.4px;">Harga Tambahan</span>
                <span style="font-size:.72rem;font-weight:700;color:var(--text-muted);text-transform:uppercase;letter-spacing:.4px;">Stok</span>
                <span></span>
            </div>

            <div id="varian-wrapper">
                <div class="varian-item">
                    <input type="text" name="varian_nama[]" placeholder="cth: Ukuran S, Rasa Manis...">
                    <input type="number" name="varian_harga[]" placeholder="0" min="0">
                    <input type="number" name="varian_stok[]" placeholder="0" min="0">
                    <button type="button" class="btn-hapus-varian" onclick="hapusVarian(this)" title="Hapus varian">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
            </div>

            <button type="button" class="btn-tambah-varian" onclick="tambahVarian()">
                <i class="fa-solid fa-plus"></i>
                Tambah Varian
            </button>

        </div>
    </div>

    {{-- FORM ACTIONS --}}
    <div class="pro-card" style="overflow:visible;">
        <div class="form-actions">
            <a href="{{ route('seller.produk.index') }}" class="btn-batal">
                Batal
            </a>
            <button type="submit" class="btn-simpan">
                <i class="fa-solid fa-check"></i>
                Simpan Produk
            </button>
        </div>
    </div>

</form>

@endsection

@push('scripts')
<script>
    function tambahVarian() {
        const html = `
      <div class="varian-item">
        <input type="text"   name="varian_nama[]"  placeholder="cth: Ukuran S, Rasa Manis...">
        <input type="number" name="varian_harga[]" placeholder="0" min="0">
        <input type="number" name="varian_stok[]"  placeholder="0" min="0">
        <button type="button" class="btn-hapus-varian" onclick="hapusVarian(this)" title="Hapus varian">
          <i class="fa-solid fa-xmark"></i>
        </button>
      </div>`;
        document.getElementById('varian-wrapper').insertAdjacentHTML('beforeend', html);
    }

    function hapusVarian(btn) {
        const items = document.querySelectorAll('.varian-item');
        if (items.length > 1) {
            btn.closest('.varian-item').remove();
        }
    }
</script>
@endpush