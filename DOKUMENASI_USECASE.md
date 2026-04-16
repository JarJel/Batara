# 📋 Dokumentasi Lengkap - Marketplace BUMDes
> Database: `batara` | Framework: Laravel | Payment: Midtrans | Logistik: RajaOngkir

---

## 👥 Use Case Diagram

### UC-01: SuperAdmin

```mermaid
graph TD
    SA([👤 SuperAdmin])

    SA --> UC001[UC-001\nDashboard Analytics]
    SA --> UC002[UC-002\nKelola Komisi Global]
    SA --> UC003[UC-003\nMonitor Aktivitas Sistem]
    SA --> UC004[UC-004\nVerifikasi BUMDes Baru]
    SA --> UC005[UC-005\nKelola Role & Pengguna]
    SA --> UC006[UC-006\nExport Laporan Keuangan]
    SA --> UC007[UC-007\nSuspend / Aktifkan BUMDes]

    UC001 -. include .-> UC001a[Generate PDF / Excel]
    UC004 -. include .-> UC004a[Kirim Notifikasi Approve/Reject]
    UC006 -. include .-> UC006a[Filter Periode & Wilayah]

    style SA fill:#1a1a2e,color:#fff
    style UC001 fill:#16213e,color:#eee,stroke:#0f3460
    style UC002 fill:#16213e,color:#eee,stroke:#0f3460
    style UC003 fill:#16213e,color:#eee,stroke:#0f3460
    style UC004 fill:#16213e,color:#eee,stroke:#0f3460
    style UC005 fill:#16213e,color:#eee,stroke:#0f3460
    style UC006 fill:#16213e,color:#eee,stroke:#0f3460
    style UC007 fill:#16213e,color:#eee,stroke:#0f3460
```

---

### UC-02: BUMDes Admin

```mermaid
graph TD
    BA([👤 BUMDes Admin])

    BA --> UC010[UC-010\nDashboard BUMDes]
    BA --> UC011[UC-011\nVerifikasi Toko Baru]
    BA --> UC012[UC-012\nSet Komisi Per Toko]
    BA --> UC013[UC-013\nMonitor Performa Toko]
    BA --> UC014[UC-014\nSuspend / Aktifkan Toko]
    BA --> UC015[UC-015\nLihat Laporan Penjualan Wilayah]
    BA --> UC016[UC-016\nKelola Laporan Pajak]

    UC011 -. include .-> UC011a[Kirim Notifikasi ke Toko]
    UC012 -. include .-> UC012a[Validasi Batas Komisi Global]
    UC013 -. extend .-> UC014

    style BA fill:#0d3b66,color:#fff
    style UC010 fill:#0a2a4a,color:#eee,stroke:#1e6091
    style UC011 fill:#0a2a4a,color:#eee,stroke:#1e6091
    style UC012 fill:#0a2a4a,color:#eee,stroke:#1e6091
    style UC013 fill:#0a2a4a,color:#eee,stroke:#1e6091
    style UC014 fill:#0a2a4a,color:#eee,stroke:#1e6091
    style UC015 fill:#0a2a4a,color:#eee,stroke:#1e6091
    style UC016 fill:#0a2a4a,color:#eee,stroke:#1e6091
```

---

### UC-03: Toko Owner

```mermaid
graph TD
    TO([👤 Toko Owner])

    TO --> UC020[UC-020\nDashboard Toko]
    TO --> UC021[UC-021\nKelola Produk]
    TO --> UC022[UC-022\nKelola Pesanan]
    TO --> UC023[UC-023\nLaporan Keuangan Toko]
    TO --> UC024[UC-024\nBuat Promo / Diskon]
    TO --> UC025[UC-025\nKelola Profil Toko]
    TO --> UC026[UC-026\nRequest Penarikan Saldo]

    UC021 -. include .-> UC021a[Tambah Atribut & Varian]
    UC021 -. include .-> UC021b[Upload Foto Produk]
    UC021 -. include .-> UC021c[Set Stok per Varian]

    UC022 -. include .-> UC022a[Update Status Pesanan]
    UC022 -. include .-> UC022b[Input Nomor Resi]
    UC022 -. extend .-> UC022c[Batalkan Pesanan]

    UC024 -. include .-> UC024a[Set Diskon % atau Harga Promo]

    style TO fill:#1b4332,color:#fff
    style UC020 fill:#081c15,color:#eee,stroke:#2d6a4f
    style UC021 fill:#081c15,color:#eee,stroke:#2d6a4f
    style UC022 fill:#081c15,color:#eee,stroke:#2d6a4f
    style UC023 fill:#081c15,color:#eee,stroke:#2d6a4f
    style UC024 fill:#081c15,color:#eee,stroke:#2d6a4f
    style UC025 fill:#081c15,color:#eee,stroke:#2d6a4f
    style UC026 fill:#081c15,color:#eee,stroke:#2d6a4f
```

---

### UC-04: Pembeli

```mermaid
graph TD
    PB([👤 Pembeli])

    PB --> UC030[UC-030\nRegistrasi & Login]
    PB --> UC031[UC-031\nCari & Filter Produk]
    PB --> UC032[UC-032\nLihat Detail Produk]
    PB --> UC033[UC-033\nKelola Keranjang]
    PB --> UC034[UC-034\nCheckout Multi-Toko]
    PB --> UC035[UC-035\nLacak Pesanan]
    PB --> UC036[UC-036\nBeri Ulasan & Rating]
    PB --> UC037[UC-037\nKelola Alamat & Profil]
    PB --> UC038[UC-038\nDaftar Keinginan / Wishlist]

    UC031 -. include .-> UC031a[Filter: harga, kategori,\nlokasi BUMDes, rating]
    UC031 -. include .-> UC031b[Sort: terlaris, terbaru, harga]

    UC034 -. include .-> UC034a[Pilih Alamat Pengiriman]
    UC034 -. include .-> UC034b[Hitung Ongkir RajaOngkir]
    UC034 -. include .-> UC034c[Input Voucher Diskon]
    UC034 -. include .-> UC034d[Bayar via Midtrans]

    UC035 -. include .-> UC035a[Track Resi Pengiriman]
    UC035 -. extend .-> UC036

    style PB fill:#4a0e8f,color:#fff
    style UC030 fill:#2d0057,color:#eee,stroke:#7b2ff7
    style UC031 fill:#2d0057,color:#eee,stroke:#7b2ff7
    style UC032 fill:#2d0057,color:#eee,stroke:#7b2ff7
    style UC033 fill:#2d0057,color:#eee,stroke:#7b2ff7
    style UC034 fill:#2d0057,color:#eee,stroke:#7b2ff7
    style UC035 fill:#2d0057,color:#eee,stroke:#7b2ff7
    style UC036 fill:#2d0057,color:#eee,stroke:#7b2ff7
    style UC037 fill:#2d0057,color:#eee,stroke:#7b2ff7
    style UC038 fill:#2d0057,color:#eee,stroke:#7b2ff7
```

---

### UC-05: Flow Bisnis Utama — Checkout & Pembagian Komisi

```mermaid
sequenceDiagram
    actor P as Pembeli
    participant K as Keranjang
    participant O as Order Master
    participant M as Midtrans
    participant TA as Toko A
    participant TB as Toko B
    participant BD as BUMDes
    participant SA as SuperAdmin

    P->>K: Tambah produk dari Toko A & B
    P->>O: Checkout (pilih alamat, kurir)
    O->>M: Redirect ke Payment Gateway
    M-->>O: Callback: PAID
    O->>TA: Buat Pesanan #001 (Toko A)
    O->>TB: Buat Pesanan #002 (Toko B)

    Note over TA,TB: Proses packing & pengiriman

    TA-->>P: Update resi JNE/JNT
    TB-->>P: Update resi JNE/JNT
    P->>O: Konfirmasi barang diterima

    Note over O,SA: Auto-Settlement (komisi dihitung)
    O->>TA: Transfer: Rp 150k - 5% BUMDes - 2% Admin
    O->>TB: Transfer: Rp 100k - 5% BUMDes - 2% Admin
    O->>BD: Komisi BUMDes: (150k+100k) × 5% = Rp 12.500
    O->>SA: Komisi Admin: (150k+100k) × 2% = Rp 5.000
```

---

## 🗄️ Database Diagram (ERD)

### Diagram 1: Users, Roles & Wilayah

```mermaid
erDiagram
    pengguna {
        int id_pengguna PK
        varchar email UK
        varchar nama_pengguna
        varchar kata_sandi
        varchar nama_lengkap
        varchar nomor_telepon
        bigint id_desa FK
        varchar foto_profil "➕ TAMBAHAN"
        tinyint is_aktif "➕ TAMBAHAN"
        timestamp last_login "➕ TAMBAHAN"
        timestamp created_at
        timestamp updated_at "➕ TAMBAHAN"
    }

    role {
        int id_role PK
        varchar nama_role
        text deskripsi_role
    }

    pengguna_role {
        int id_pengguna FK
        int id_role FK
    }

    provinsi {
        char id PK
        varchar name
    }

    kabupaten {
        char id PK
        char id_provinsi FK
        varchar name
    }

    kecamatan {
        char id PK
        char id_kabupaten FK
        varchar name
    }

    desa {
        char id PK
        char id_kecamatan FK
        varchar name
    }

    pengguna ||--o{ pengguna_role : "memiliki"
    role ||--o{ pengguna_role : "dimiliki"
    pengguna }o--|| desa : "tinggal di"
    desa }o--|| kecamatan : "bagian dari"
    kecamatan }o--|| kabupaten : "bagian dari"
    kabupaten }o--|| provinsi : "bagian dari"
```

---

### Diagram 2: BUMDes & Toko

```mermaid
erDiagram
    bumdes {
        int id_bumdes PK
        bigint id_desa FK
        int id_pengguna FK
        varchar nama_bumdes
        text deskripsi
        text alamat_bumdes
        varchar nomor_telepon
        varchar email
        varchar logo
        varchar nomor_rekening
        varchar nama_bank
        varchar atas_nama_rekening
        decimal rating_bumdes
        int jumlah_rating_bumdes
        decimal saldo "➕ TAMBAHAN"
        tinyint is_aktif "➕ TAMBAHAN"
        timestamp tanggal_dibuat
    }

    toko {
        int id_toko PK
        int id_pengguna FK
        int id_bumdes FK
        bigint id_desa FK
        varchar nama_toko
        varchar slug_toko UK
        tinyint terverifikasi
        decimal saldo "➕ TAMBAHAN"
        decimal rating_toko "➕ TAMBAHAN"
        int jumlah_rating_toko "➕ TAMBAHAN"
        tinyint is_aktif "➕ TAMBAHAN"
        varchar nomor_rekening
        varchar nama_bank
        varchar atas_nama_rekening
        timestamp tanggal_daftar
        timestamp updated_at "➕ TAMBAHAN"
    }

    profil_toko {
        int id_profil_toko PK
        int id_toko FK
        text deskripsi
        text alamat_toko
        varchar nomor_telepon
        varchar email
        varchar logo
        varchar banner "➕ TAMBAHAN"
        varchar jam_operasional
        json sosial_media
    }

    verifikasi_toko {
        int id_verifikasi_toko PK
        int id_toko FK
        enum status_verifikasi
        varchar dokumen_sku
        varchar dokumen_ktp
        varchar nomor_rekening
        text catatan_admin
        int id_admin_verifikator "➕ TAMBAHAN"
        timestamp tanggal_verifikasi
    }

    komisi {
        int id_komisi PK "➕ TABEL BARU"
        int id_bumdes FK
        int id_toko FK
        decimal persen_bumdes
        decimal persen_admin
        decimal min_komisi "➕ TABEL BARU"
        decimal max_komisi "➕ TABEL BARU"
        timestamp created_at
        timestamp updated_at
    }

    pengguna ||--o{ toko : "memiliki"
    bumdes ||--o{ toko : "menaungi"
    toko ||--|| profil_toko : "punya profil"
    toko ||--o{ verifikasi_toko : "diverifikasi"
    bumdes ||--o{ komisi : "set komisi"
    toko ||--o{ komisi : "dikenai komisi"
```

---

### Diagram 3: Produk & Varian

```mermaid
erDiagram
    kategori {
        int id_kategori PK
        varchar nama_kategori
        varchar slug_kategori UK
        int id_kategori_induk FK
        varchar icon
    }

    produk {
        int id_produk PK
        int id_toko FK
        int id_kategori FK
        varchar nama_produk
        text deskripsi_produk
        decimal harga_dasar
        decimal harga_promo "➕ TAMBAHAN"
        decimal berat
        decimal rating_produk
        int jumlah_rating_produk
        int total_terjual "➕ TAMBAHAN"
        tinyint is_aktif "➕ TAMBAHAN"
        tinyint is_promo "➕ TAMBAHAN"
        timestamp created_at
        timestamp updated_at "➕ TAMBAHAN"
    }

    atribut_produk {
        int id_atribut PK "➕ TABEL BARU"
        int id_produk FK
        varchar nama_atribut
    }

    nilai_atribut {
        int id_nilai PK "➕ TABEL BARU"
        int id_atribut FK
        varchar nilai
    }

    varian_produk {
        bigint id_varian_produk PK
        int id_produk FK
        varchar nama_varian
        json atribut_kombinasi "➕ TAMBAHAN"
        decimal harga
        decimal harga_promo "➕ TAMBAHAN"
        int stok
        varchar sku "➕ TAMBAHAN"
        decimal berat_override "➕ TAMBAHAN"
        tinyint is_aktif "➕ TAMBAHAN"
    }

    gambar_produk {
        int id_gambar PK
        int id_produk FK
        int id_varian_produk FK "➕ TAMBAHAN"
        varchar lokasi_file_gambar
        tinyint is_utama "➕ TAMBAHAN"
        int urutan "➕ TAMBAHAN"
    }

    riwayat_stok {
        int id_riwayat PK "➕ TABEL BARU"
        bigint id_varian_produk FK
        enum tipe
        int qty
        int stok_sebelum
        int stok_sesudah
        varchar keterangan
        timestamp created_at
    }

    produk ||--o{ atribut_produk : "punya atribut"
    atribut_produk ||--o{ nilai_atribut : "punya nilai"
    produk ||--o{ varian_produk : "punya varian"
    produk ||--o{ gambar_produk : "punya gambar"
    varian_produk ||--o{ gambar_produk : "foto per varian"
    varian_produk ||--o{ riwayat_stok : "history stok"
    produk }o--|| kategori : "masuk kategori"
    kategori }o--o| kategori : "kategori induk"
```

---

### Diagram 4: Keranjang, Order & Pesanan

```mermaid
erDiagram
    alamat {
        bigint id_alamat PK
        int id_pengguna FK
        varchar nama_penerima
        varchar no_hp
        text alamat_lengkap
        char id_desa FK "➕ TAMBAHAN"
        varchar kota
        varchar kode_pos
        tinyint is_default
        timestamp created_at
        timestamp updated_at
    }

    keranjang {
        int id_keranjang PK
        int id_pengguna FK
        int id_produk FK
        bigint id_varian_produk FK "➕ TAMBAHAN"
        int qty
        timestamp created_at
        timestamp updated_at
    }

    order_master {
        int id_order_master PK "➕ TABEL BARU (ganti tabel order)"
        int id_pengguna FK
        bigint id_alamat FK
        decimal total_harga_produk
        decimal total_ongkir
        decimal total_diskon "➕ TAMBAHAN"
        decimal total_bayar
        varchar kode_voucher FK "➕ TAMBAHAN"
        varchar midtrans_order_id UK
        varchar midtrans_token
        enum status_pembayaran
        timestamp expired_at "➕ TAMBAHAN"
        timestamp dibayar_at "➕ TAMBAHAN"
        timestamp created_at
        timestamp updated_at
    }

    pesanan {
        int id_pesanan PK
        int id_order_master FK "➕ TAMBAHAN (FK ke order_master)"
        int id_pengguna FK
        int id_toko FK
        bigint id_alamat FK
        decimal total_harga_produk
        decimal biaya_pengiriman
        decimal komisi_bumdes_nominal "➕ TAMBAHAN"
        decimal komisi_admin_nominal "➕ TAMBAHAN"
        decimal pendapatan_toko_bersih "➕ TAMBAHAN"
        enum status_pesanan
        timestamp tanggal_pesanan
        timestamp updated_at "➕ TAMBAHAN"
    }

    item_pesanan {
        int id_item_pesanan PK
        int id_pesanan FK
        bigint id_varian_produk FK
        varchar nama_produk_snapshot
        varchar nama_varian_snapshot "➕ TAMBAHAN"
        decimal harga_saat_pesan
        decimal harga_promo_saat_pesan "➕ TAMBAHAN"
        int jumlah
        decimal berat_per_item_kg
        decimal subtotal "➕ TAMBAHAN"
    }

    pengguna ||--o{ keranjang : "punya"
    pengguna ||--o{ alamat : "punya"
    pengguna ||--o{ order_master : "buat order"
    order_master ||--o{ pesanan : "terdiri dari"
    pesanan ||--o{ item_pesanan : "berisi item"
    varian_produk ||--o{ item_pesanan : "dipesan"
    varian_produk ||--o{ keranjang : "dimasukkan"
    alamat ||--o{ order_master : "dikirim ke"
```

---

### Diagram 5: Pengiriman & Status Pesanan

```mermaid
erDiagram
    pesanan {
        int id_pesanan PK
        enum status_pesanan
    }

    pengiriman {
        int id_pengiriman PK
        int id_pesanan FK
        varchar kurir
        varchar service
        varchar estimasi_hari
        decimal biaya_pengiriman
        varchar nomor_resi
        varchar origin_city_id "➕ TAMBAHAN"
        varchar destination_city_id "➕ TAMBAHAN"
        timestamp tanggal_dikirim
        timestamp tanggal_diterima
        timestamp updated_at "➕ TAMBAHAN"
    }

    status_pesanan {
        int id_status PK
        int id_pesanan FK
        enum status
        datetime waktu_status
        text catatan
        int id_pengguna_ubah "➕ TAMBAHAN"
    }

    bukti_terima {
        int id_bukti PK "➕ TABEL BARU"
        int id_pesanan FK
        varchar foto_bukti
        text catatan
        timestamp created_at
    }

    pesanan ||--|| pengiriman : "dikirim via"
    pesanan ||--o{ status_pesanan : "punya history status"
    pesanan ||--o| bukti_terima : "konfirmasi terima"
```

---

### Diagram 6: Komisi, Pendapatan & Penarikan

```mermaid
erDiagram
    pendapatan_toko {
        int id_pendapatan_toko PK
        int id_toko FK
        int id_pesanan FK
        decimal jumlah
        enum tipe
        varchar keterangan
        datetime tanggal
    }

    pendapatan_bumdes {
        int id_pendapatan_bumdes PK
        int id_bumdes FK
        int id_pesanan FK
        decimal jumlah
        enum tipe
        varchar keterangan
        datetime tanggal
    }

    penarikan_saldo {
        int id_penarikan PK "➕ TABEL BARU"
        int id_pengguna FK
        enum tipe_entitas
        int id_entitas
        decimal jumlah
        varchar nomor_rekening
        varchar nama_bank
        varchar atas_nama
        enum status
        varchar bukti_transfer "➕ TABEL BARU"
        text catatan_admin
        timestamp created_at
        timestamp diproses_at "➕ TABEL BARU"
    }

    toko ||--o{ pendapatan_toko : "punya riwayat"
    bumdes ||--o{ pendapatan_bumdes : "punya riwayat"
    pengguna ||--o{ penarikan_saldo : "request tarik"
```

---

### Diagram 7: Ulasan, Notifikasi & Voucher

```mermaid
erDiagram
    ulasan {
        int id_ulasan PK
        int id_produk FK
        int id_item_pesanan FK "➕ TAMBAHAN (1 pesanan = 1 ulasan)"
        int id_pengguna FK
        decimal rating
        text komentar_ulasan
        varchar foto_ulasan "➕ TAMBAHAN"
        tinyint is_visible "➕ TAMBAHAN"
        timestamp tanggal_ulasan
        timestamp updated_at "➕ TAMBAHAN"
    }

    notifikasi {
        int id_notifikasi PK
        int id_pengguna FK
        enum tipe
        text isi_pesan
        varchar url_target "➕ TAMBAHAN"
        tinyint is_read
        timestamp tanggal_notifikasi
    }

    voucher {
        int id_voucher PK "➕ TABEL BARU"
        int id_toko FK
        varchar kode UK
        varchar nama_voucher
        enum tipe_diskon
        decimal nilai_diskon
        decimal min_belanja
        decimal maks_diskon
        int kuota
        int terpakai "➕ TABEL BARU"
        tinyint is_aktif
        timestamp berlaku_dari
        timestamp berlaku_hingga
        timestamp created_at
    }

    penggunaan_voucher {
        int id_penggunaan PK "➕ TABEL BARU"
        int id_voucher FK
        int id_pengguna FK
        int id_order_master FK
        decimal nilai_diskon_applied
        timestamp created_at
    }

    daftar_keinginan {
        int id_daftar_keinginan PK
        int id_pengguna FK
        timestamp created_at
    }

    item_daftar_keinginan {
        int id_item_daftar_keinginan PK
        int id_daftar_keinginan FK
        int id_produk FK
        timestamp created_at "➕ TAMBAHAN"
    }

    pengguna ||--|| daftar_keinginan : "punya wishlist"
    daftar_keinginan ||--o{ item_daftar_keinginan : "berisi"
    pengguna ||--o{ ulasan : "tulis"
    pengguna ||--o{ notifikasi : "terima"
    toko ||--o{ voucher : "buat"
    voucher ||--o{ penggunaan_voucher : "dipakai"
    pengguna ||--o{ penggunaan_voucher : "gunakan"
```

---

## 📊 Ringkasan Penambahan Database

### Tabel Baru yang Perlu Dibuat

| Tabel Baru | Fungsi |
|---|---|
| `komisi` | Menyimpan persen komisi BUMDes & Admin per Toko |
| `order_master` | Pengganti/pelengkap tabel `order` untuk multi-toko |
| `atribut_produk` | Nama atribut produk (Warna, Ukuran, dll) |
| `nilai_atribut` | Nilai dari atribut (Merah, XL, dll) |
| `riwayat_stok` | Audit trail perubahan stok per varian |
| `penarikan_saldo` | Request penarikan saldo oleh Toko/BUMDes |
| `voucher` | Kode voucher diskon per Toko |
| `penggunaan_voucher` | Riwayat penggunaan voucher oleh pembeli |
| `bukti_terima` | Foto bukti penerimaan barang oleh pembeli |

### Kolom Penting yang Perlu Ditambahkan

| Tabel | Kolom Tambahan | Alasan |
|---|---|---|
| `pengguna` | `foto_profil`, `is_aktif`, `last_login`, `updated_at` | Profil lengkap & monitoring |
| `toko` | `saldo`, `rating_toko`, `is_aktif`, `updated_at` | Keuangan & status toko |
| `produk` | `harga_promo`, `total_terjual`, `is_aktif`, `updated_at` | Promo & analytics |
| `varian_produk` | `sku`, `atribut_kombinasi`, `harga_promo`, `is_aktif` | Varian lengkap |
| `pesanan` | `id_order_master`, `komisi_bumdes_nominal`, `komisi_admin_nominal` | Tracking komisi per pesanan |
| `keranjang` | `id_varian_produk` | Keranjang harus ke varian, bukan produk |
| `alamat` | `id_desa` | Untuk kalkulasi ongkir RajaOngkir |
| `ulasan` | `id_item_pesanan`, `foto_ulasan` | Satu ulasan per item |
| `gambar_produk` | `id_varian_produk`, `is_utama`, `urutan` | Foto per varian |
| `bumdes` | `saldo`, `is_aktif` | Keuangan BUMDes |

---

> **Catatan:** Kolom bertanda `➕ TAMBAHAN` adalah kolom yang belum ada di database saat ini namun **wajib ada** untuk mendukung fitur-fitur di use case. Tabel bertanda `➕ TABEL BARU` adalah tabel yang perlu dibuat dari awal.
