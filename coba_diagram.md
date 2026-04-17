# 📋 Dokumentasi Use Case Lengkap - Marketplace BUMDes
> Database: `batara` | Framework: Laravel | Payment: Midtrans | Logistik: RajaOngkir
> Versi: 1.0.0 | Terakhir diupdate: 2025

---

## 📌 Daftar Aktor
graph LR
    SA([👤 SuperAdmin])
    BA([👤 BUMDes Admin])
    TO([👤 Toko Owner])
    PB([👤 Pembeli])
    SYS([⚙️ System])
    MID([💳 Midtrans])
    RO([🚚 RajaOngkir])

    subgraph SUPERADMIN ["🔴 SuperAdmin Domain"]
        SA_AUTH[Autentikasi\n& Keamanan]
        SA_BUMDES[Kelola\nBUMDes]
        SA_USER[Kelola\nPengguna]
        SA_KOMISI[Kelola\nKomisi Global]
        SA_LAPORAN[Laporan\n& Analytics]
        SA_NOTIF[Kelola\nNotifikasi]
        SA_VOUCHER[Voucher\nGlobal]
        SA_KONTEN[Kelola\nKonten]
        SA_MONITOR[Monitor\nSistem]
    end

    subgraph BUMDES ["🔵 BUMDes Admin Domain"]
        BA_AUTH[Autentikasi]
        BA_DASHBOARD[Dashboard\nBUMDes]
        BA_TOKO[Kelola\nToko]
        BA_KATEGORI[Kelola\nKategori]
        BA_KOMISI[Set Komisi\nPer Toko]
        BA_LAPORAN[Laporan\nWilayah]
        BA_KOMPLAIN[Kelola\nKomplain]
        BA_MODERASI[Moderasi\nUlasan]
        BA_BANNER[Kelola\nBanner]
        BA_PINDAH[Proses Pindah\nBUMDes]
    end

    subgraph TOKO ["🟢 Toko Owner Domain"]
        TO_AUTH[Autentikasi\n& Profil]
        TO_PRODUK[Kelola\nProduk]
        TO_PESANAN[Kelola\nPesanan]
        TO_KEUANGAN[Keuangan\n& Saldo]
        TO_PROMO[Promo\n& Flash Sale]
        TO_LAPORAN[Laporan\nToko]
        TO_KOMPLAIN[Kelola\nKomplain]
    end

    subgraph PEMBELI ["🟣 Pembeli Domain"]
        PB_AUTH[Registrasi\n& Login]
        PB_BELANJA[Cari &\nBelanja]
        PB_CHECKOUT[Checkout\n& Bayar]
        PB_PESANAN[Lacak\nPesanan]
        PB_ULASAN[Ulasan\n& Rating]
        PB_PROFIL[Profil\n& Alamat]
        PB_WISHLIST[Wishlist]
        PB_KOMPLAIN[Ajukan\nKomplain]
    end

    SA --> SUPERADMIN
    BA --> BUMDES
    TO --> TOKO
    PB --> PEMBELI

    MID -.-> PB_CHECKOUT
    RO -.-> PB_CHECKOUT
    RO -.-> PB_PESANAN
    SYS -.-> SA_MONITOR
    SYS -.-> SA_NOTIF

    style SA fill:#1a1a2e,color:#fff
    style BA fill:#0d3b66,color:#fff
    style TO fill:#1b4332,color:#fff
    style PB fill:#4a0e8f,color:#fff
    style SYS fill:#7d3c98,color:#fff
    style MID fill:#1a5276,color:#fff
    style RO fill:#784212,color:#fff

graph TD
    SA([👤 SuperAdmin])

    subgraph AUTH ["🔐 Autentikasi"]
        UC_SA_001[UC-SA-001\nLogin]
        UC_SA_002[UC-SA-002\nReset Password]
    end

    subgraph DASHBOARD ["📊 Dashboard & Monitor"]
        UC_SA_003[UC-SA-003\nDashboard Analytics]
        UC_SA_005[UC-SA-005\nMonitor Aktivitas\nSistem Audit Trail]
        UC_SA_013[UC-SA-013\nMonitor Proses\nPindah BUMDes]
        UC_SA_018[UC-SA-018\nTerima Notifikasi\nSistem]
    end

    subgraph BUMDES_MGT ["🏢 Manajemen BUMDes"]
        UC_SA_006[UC-SA-006\nVerifikasi BUMDes Baru]
        UC_SA_007[UC-SA-007\nSuspend / Aktifkan\nBUMDes]
        UC_SA_011[UC-SA-011\nBuat Akun\nBUMDes Admin]
    end

    subgraph USER_MGT ["👥 Manajemen Pengguna"]
        UC_SA_008[UC-SA-008\nKelola Role\n& Pengguna]
        UC_SA_009[UC-SA-009\nSuspend Akun\nPembeli]
        UC_SA_010[UC-SA-010\nBlacklist\nPengguna]
    end

    subgraph KEUANGAN ["💰 Keuangan & Komisi"]
        UC_SA_004[UC-SA-004\nKelola Komisi\nGlobal]
        UC_SA_016[UC-SA-016\nExport Laporan\nKeuangan]
        UC_SA_012[UC-SA-012\nKelola Voucher\nGlobal]
    end

    subgraph KONTEN ["📝 Konten & Sistem"]
        UC_SA_014[UC-SA-014\nKelola Banner\n& Iklan]
        UC_SA_015[UC-SA-015\nKelola Notifikasi\nPer Role]
        UC_SA_017[UC-SA-017\nKelola FAQ\n& Help Center]
    end

    SA --> AUTH
    SA --> DASHBOARD
    SA --> BUMDES_MGT
    SA --> USER_MGT
    SA --> KEUANGAN
    SA --> KONTEN

    UC_SA_001 -. include .-> UC_SA_001a[Validasi Kredensial\n& Cek Batas Login]
    UC_SA_001 -. include .-> UC_SYS_001[Audit Trail Log]
    UC_SA_001 -. extend .-> UC_SA_002

    UC_SA_003 -. include .-> UC_SA_003a[WebSocket\nReal-time Chart]
    UC_SA_003 -. include .-> UC_SA_003b[Filter Periode\n& Wilayah]

    UC_SA_004 -. include .-> UC_SA_004a[Validasi Nilai\nKomisi]
    UC_SA_004 -. include .-> UC_SYS_003[Kirim Notifikasi\nEmail Massal]

    UC_SA_006 -. include .-> UC_SA_006a[Validasi\n1 Desa 1 BUMDes]
    UC_SA_006 -. include .-> UC_SYS_003
    UC_SA_006 -. extend .-> UC_SA_007
    UC_SA_006 -. extend .-> UC_SA_011

    UC_SA_008 -. include .-> UC_SA_009
    UC_SA_008 -. include .-> UC_SA_010
    UC_SA_008 -. include .-> UC_SA_011

    UC_SA_009 -. include .-> UC_SYS_003
    UC_SA_010 -. include .-> UC_SA_010a[Validasi\nBlacklist Email/HP]

    UC_SA_012 -. include .-> UC_SA_012a[Set Target Voucher\nFleksibel]
    UC_SA_012 -. include .-> UC_SA_012b[Set Aturan\nPenggabungan]

    UC_SA_013 -. include .-> UC_SYS_004[Notifikasi Otomatis\nPindah BUMDes]
    UC_SA_013 -. include .-> UC_SA_013a[Highlight Proses\nLambat]

    UC_SA_016 -. include .-> UC_SA_016a[Filter Periode\n& Wilayah]
    UC_SA_016 -. include .-> UC_SYS_005[Generate\nPDF / Excel]

    UC_SA_015 -. include .-> UC_SA_015a[Set Notifikasi\nPer Role]

    style SA fill:#1a1a2e,color:#fff
    style UC_SA_001 fill:#16213e,color:#eee,stroke:#0f3460
    style UC_SA_002 fill:#16213e,color:#eee,stroke:#0f3460
    style UC_SA_003 fill:#16213e,color:#eee,stroke:#0f3460
    style UC_SA_004 fill:#16213e,color:#eee,stroke:#0f3460
    style UC_SA_005 fill:#16213e,color:#eee,stroke:#0f3460
    style UC_SA_006 fill:#16213e,color:#eee,stroke:#0f3460
    style UC_SA_007 fill:#16213e,color:#eee,stroke:#0f3460
    style UC_SA_008 fill:#16213e,color:#eee,stroke:#0f3460
    style UC_SA_009 fill:#16213e,color:#eee,stroke:#0f3460
    style UC_SA_010 fill:#16213e,color:#eee,stroke:#0f3460
    style UC_SA_011 fill:#16213e,color:#eee,stroke:#0f3460
    style UC_SA_012 fill:#16213e,color:#eee,stroke:#0f3460
    style UC_SA_013 fill:#16213e,color:#eee,stroke:#0f3460
    style UC_SA_014 fill:#16213e,color:#eee,stroke:#0f3460
    style UC_SA_015 fill:#16213e,color:#eee,stroke:#0f3460
    style UC_SA_016 fill:#16213e,color:#eee,stroke:#0f3460
    style UC_SA_017 fill:#16213e,color:#eee,stroke:#0f3460
    style UC_SA_018 fill:#16213e,color:#eee,stroke:#0f3460
