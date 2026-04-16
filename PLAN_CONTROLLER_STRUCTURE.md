# 🏗️ PLAN RESTRUKTURISASI CONTROLLER - SCALABLE ARCHITECTURE

## 🎯 Tujuan

1. **Scalable**: Mudah ditambah fitur baru tanpa mengacaukan struktur
2. **Backward Compatible**: Routes yang sudah ada tetap berfungsi
3. **Separation of Concerns**: Controller tipis, logika bisnis di Service
4. **Role-based Organization**: Admin/BUMDes/Seller/User terpisah jelas

## 📁 Struktur Folder Baru (app/Http/Controllers)

```
app/Http/Controllers/
├── BaseController.php                 ← Parent class untuk semua controller
├── Api/                              ← API endpoints (JSON responses)
│   ├── v1/
│   │   ├── AuthController.php
│   │   ├── ProductController.php
│   │   └── OrderController.php
├── Admin/                            ← SuperAdmin
│   ├── DashboardController.php
│   ├── KomisiController.php
│   ├── BumdesController.php
│   └── ReportController.php
├── Bumdes/                           ← BUMDes Admin
│   ├── DashboardController.php
│   ├── TokoController.php
│   ├── KomisiController.php
│   └── ReportController.php
├── Seller/                           ← Sudah ada, diperbaiki
│   ├── DashboardController.php
│   ├── ProductController.php        ← Rename dari SellerProductController
│   ├── OrderController.php          ← Rename dari PesananController
│   ├── PromoController.php          ← Baru
│   ├── KeuanganController.php
│   └── PengaturanController.php
├── User/                             ← Pembeli
│   ├── HomeController.php
│   ├── ProductController.php
│   ├── CartController.php
│   ├── CheckoutController.php       ← Baru, pisah dari OrderController
│   ├── OrderController.php
│   ├── ProfileController.php
│   └── WishlistController.php       ← Baru
└── Auth/                             ← Auth terpusat
    └── AuthController.php           ← Existing, diperbaiki
```

## 🔄 Mapping Routes Existing → Controller Baru

| Route Saat Ini        | Controller Saat Ini | Controller Baru         | Status            |
| --------------------- | ------------------- | ----------------------- | ----------------- |
| `/`                   | HomeController      | User/HomeController     | ✅ Tetap          |
| `/register`, `/login` | AuthController      | Auth/AuthController     | ✅ Tetap          |
| `/produk/*`           | ProdukController    | User/ProductController  | ➡️ Rename & Move  |
| `/cart/*`             | CartController      | User/CartController     | ✅ Tetap          |
| `/checkout/*`         | OrderController     | User/CheckoutController | ➡️ Split fungsi   |
| `/orders/*`           | OrderController     | User/OrderController    | ➡️ Split fungsi   |
| `/profile/*`          | ProfileController   | User/ProfileController  | ✅ Tetap          |
| `/seller/*`           | Seller/\*Controller | Seller/\*Controller     | ✅ Tetap struktur |

## 🛠️ Perubahan Teknis

### 1. **BaseController** (Baru)

```php
abstract class BaseController extends Controller
{
    protected $service; // Dependency injection Service

    public function __construct(ServiceInterface $service)
    {
        $this->service = $service;
    }

    protected function successResponse($data, $message = 'Success')
    {
        return response()->json([
            'success' => true,
            'message
```
