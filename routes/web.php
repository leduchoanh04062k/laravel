<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KhachhangController;
use App\Http\Controllers\DanhmucthuocController;
use App\Http\Controllers\ChangepasswordController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HoadonController;
use App\Http\Controllers\NhaptunhaccController;
use App\Http\Controllers\NhaptonController;
use App\Http\Controllers\KhachhangtlController;
use App\Http\Controllers\NhomkhachhangController;
use App\Http\Controllers\SupplierGroupController;
use App\Http\Controllers\StockGroupController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\PriceListController;
use App\Http\Controllers\SamplePrescriptionController;
use App\Http\Controllers\ShiftController;
use App\Http\Controllers\XuattranhaccController;
use App\Http\Controllers\XuathuyController;
use App\Http\Controllers\KiemkhoController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\NhacungcapController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ThuchiController;
use App\Http\Controllers\UserManualController;
use App\Http\Controllers\UserRolesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ManipulationHistoryController;
use App\Http\Controllers\SetingController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\GoidangkyController;
use App\Http\Controllers\SuggestionsController;
use App\Http\Controllers\BacsiController;
use App\Http\Controllers\BanhangController;

use App\Http\Controllers\BcDoanhThuBanHangController;
use App\Http\Controllers\BcNhapHangController;
use App\Http\Controllers\SoTheoDoiDoAmController;
use App\Http\Controllers\SoTheoDoiTheoDonController;
use App\Http\Controllers\BcLoiNhanBanHangController;
use App\Http\Controllers\SoTheoDoiMuaBanThuocController;
use App\Http\Controllers\SoTheoDoiVeSinhController;
use App\Http\Controllers\BanThuocKhongTheoDonController;
use App\Http\Controllers\BcDoanhThuCaLamViecController;
use App\Http\Controllers\XuatNhapKhauThuocController;
use App\Http\Controllers\SoTheoDoiBenhNhanController;
use App\Http\Controllers\SoKiemSoatDinhKy;
use App\Http\Controllers\ThatThoatNhamLanController;
use App\Http\Controllers\PhanUngCuaThuocController;
use App\Http\Controllers\TheoDoiThuHoiThuocController;
use App\Http\Controllers\BanHangTheoBacSiController;
use App\Http\Controllers\XuatNhapTonThuocController;
use App\Http\Controllers\TheoDoiSuLyKhieuNaiController;
use App\Http\Controllers\TheoDoiHanDungController;
use App\Http\Controllers\DoanhThuBanHangTheoNVController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', function () {
    return redirect('login');
});
Route::post('/', function () {
    return redirect('login');
});

Route::group(['middleware' => ['auth']], function () {

    Route::post('/changepassword', [ChangepasswordController::class, 'store']);

    Route::group(['middleware' => ['permission:Overview']], function () {
        Route::group(['prefix' => 'tongquan'], function () {
            Route::get('/', [HomeController::class, 'index']);
            Route::get('/dashboard', [HomeController::class, 'qtyend']);
            Route::get('/expired', [HomeController::class, 'expired']);
            Route::get('/expire', [HomeController::class, 'aboutExpired']);
            Route::get('/dayChart', [HomeController::class, 'dayChart']);
            Route::get('/lastDayChart', [HomeController::class, 'lastDayChart']);
            Route::get('/sell_product', [HomeController::class, 'sell_product']);
            Route::get('/getdatalotno', [HomeController::class, 'getdatalotno']);
            Route::get('/hoatDongGanDay',[HomeController::class,'hoatDongGanDay']);
        });
    });

    Route::group(['prefix' => 'banhang'], function () {
        Route::get('/edit',  [BanhangController::class, 'edit']);
        Route::get('/editstock',  [BanhangController::class, 'editstock']);
        Route::post('/active', [BanhangController::class, 'active']);
        Route::put('/', [BanhangController::class, 'updateNote']);

        Route::get('/autosearchdoctor', [BanhangController::class, 'autosearchdoctor']);
        Route::get('/autosearchimage', [BanhangController::class, 'autosearchimage']);

        Route::post('/submitphieunhap', [BanhangController::class, 'submitphieunhap']);
        Route::post('/submitlotno', [BanhangController::class, 'submitlotno']);
        Route::post('/submitbanhang', [BanhangController::class, 'submitbanhang']);

        Route::get('/getlistunit', [BanhangController::class, 'getlistunit']);
        Route::get('/getlistunitwithid', [BanhangController::class, 'getlistunitwithid']);
        Route::get('/editinfostock', [BanhangController::class, 'editinfostock']);
        Route::get('/editlotno', [BanhangController::class, 'editlotno']);
        Route::get('/inhoadon', [BanhangController::class, 'inhoadon']);
        Route::get('/getpricelist', [BanhangController::class, 'getpricelist']);

        Route::get('/baoCaoBanHang', [BanhangController::class, 'baoCaoBanHang']);
    });
    Route::group(['prefix' => 'khachhang'], function () {
        Route::post('/',  [KhachhangController::class, 'store']);
        Route::get('/{id}/edit',  [KhachhangController::class, 'edit']);
        Route::put('/{id}',  [KhachhangController::class, 'update']);
        Route::delete('/{id}',  [KhachhangController::class, 'destroy']);
        Route::post('/active', [KhachhangController::class, 'active']);
        Route::post('/unactive', [KhachhangController::class, 'unactive']);
        Route::get('/detailKhachHang', [KhachhangController::class, 'detailKhachHang']);

        Route::get('/add', [CustomerController::class, 'index']);
        Route::post('/save', [CustomerController::class, 'store']);

        Route::get('/export', [KhachhangController::class, 'export']);
        Route::post('/import', [KhachhangController::class, 'import']);

        Route::get('/pdf', [KhachhangController::class, 'viewpdf']);
        Route::get('/pdf/download', [KhachhangController::class, 'createpdf']);
        Route::post('/import', [KhachhangController::class, 'import']);
        Route::post('/insertDataExcel',  [KhachhangController::class, 'insertDataExcel']);
    });
    Route::group(['middleware' => ['permission:Seller']], function () {
        Route::get('/banhang',  [BanhangController::class, 'index'])->name('banhang');
        Route::get('/khachhang',  [KhachhangController::class, 'index'])->name('khachhang');
    });

    Route::group(['prefix' => 'hoadon'], function () {
        Route::post('/active', [HoadonController::class, 'active']);
        Route::get('/export', [HoadonController::class, 'export']);
        Route::post('/submitbanhang', [BanhangController::class, 'submitbanhang']);
        Route::put('/updatehoadon', [HoadonController::class, 'updateHoaDon']);

        Route::get('/userList',  [HoadonController::class, 'index'])->name('userList');
        Route::get('/urlFetch/{key}',  [HoadonController::class, 'index'])->name('urlFetch');
    });
    Route::group(['middleware' => ['permission:Invoice']], function () {
        Route::get('/hoadon',  [HoadonController::class, 'index'])->name('hoadon');
    });

    Route::group(['prefix' => 'nhaptunhacungcap'], function () {
        Route::delete('/',  [NhaptunhaccController::class, 'destroy']);
        Route::post('/',  [NhaptunhaccController::class, 'store']);
        Route::get('/edit',  [NhaptunhaccController::class, 'edit']);
        Route::get('/editstock',  [NhaptunhaccController::class, 'editstock']);
        Route::post('/active', [NhaptunhaccController::class, 'active']);

        Route::get('/export', [NhaptunhaccController::class, 'export']);

        Route::get('/autosearch', [NhaptunhaccController::class, 'autosearch']);
        Route::get('/autosearchimage', [NhaptunhaccController::class, 'autosearchimage']);
        Route::post('/autosearchtable', [NhaptunhaccController::class, 'autosearchtable']);
        Route::get('/autosearchlotno', [NhaptunhaccController::class, 'autosearchlotno']);
        Route::get('/gethanghoa', [NhaptunhaccController::class, 'gethanghoa']);

        Route::post('/submitnhacungcap', [NhaptunhaccController::class, 'submitnhacungcap']);
        Route::post('/submitlotno', [NhaptunhaccController::class, 'submitlotno']);
        Route::post('/submitphieunhap', [NhaptunhaccController::class, 'submitphieunhap']);

        Route::get('/getlistunit', [NhaptunhaccController::class, 'getlistunit']);
        Route::get('/getlistunitwithid', [NhaptunhaccController::class, 'getlistunitwithid']);
        Route::get('/editinfostock', [NhaptunhaccController::class, 'editinfostock']);
        Route::get('/editlotno', [NhaptunhaccController::class, 'editlotno']);
        Route::get('/getlistlotno', [NhaptunhaccController::class, 'getlistlotno']);
        Route::get('/selectlotno', [NhaptunhaccController::class, 'selectlotno']);

        Route::get('/searchbystock', [NhaptunhaccController::class, 'searchbystock']);
        Route::post('/import', [NhaptunhaccController::class, 'import']);
        Route::get('/checkNameStock', [NhaptunhaccController::class, 'checkNameStock']);
    });

    Route::group(['prefix' => 'nhapton'], function () {
        Route::post('/',  [NhaptonController::class, 'store']);
        Route::get('/edit',  [NhaptonController::class, 'edit']);
        Route::get('/editstock',  [NhaptonController::class, 'editstock']);
        Route::delete('/',  [NhaptonController::class, 'destroy']);
        Route::post('/active', [NhaptonController::class, 'active']);
        Route::get('/export', [NhaptonController::class, 'export']);

        Route::get('/selectlotno', [NhaptunhaccController::class, 'selectlotno']);

        Route::post('/submitphieunhap', [NhaptonController::class, 'submitphieunhap']);
        Route::post('/submitlotno', [NhaptonController::class, 'submitlotno']);
        Route::post('/submitnhapton', [NhaptonController::class, 'submitnhapton']);

        Route::get('/getlistunit', [NhaptonController::class, 'getlistunit']);
        Route::get('/getlistunitwithid', [NhaptonController::class, 'getlistunitwithid']);
        Route::get('/editinfostock', [NhaptonController::class, 'editinfostock']);
        Route::get('/editlotno', [NhaptonController::class, 'editlotno']);
    });

    Route::group(['prefix' => 'xuattranhacungcap'], function () {
        Route::post('/',  [XuattranhaccController::class, 'store']);
        Route::get('/edit',  [XuattranhaccController::class, 'edit']);
        Route::get('/editstock',  [XuattranhaccController::class, 'editstock']);
        Route::delete('/{id}',  [XuattranhaccController::class, 'destroy']);
        Route::post('/active', [XuattranhaccController::class, 'active']);
        Route::get('/export', [XuattranhaccController::class, 'export']);
        Route::get('/autosearchimage', [XuattranhaccController::class, 'autosearchimage']);

        Route::post('/submitphieunhap', [XuattranhaccController::class, 'submitphieunhap']);
        Route::post('/submitnhacungcap', [XuattranhaccController::class, 'submitnhacungcap']);
    });

    Route::group(['prefix' => 'xuathuy'], function () {
        Route::post('/',  [XuathuyController::class, 'store']);
        Route::get('/edit',  [XuathuyController::class, 'edit']);
        Route::get('/editstock',  [XuathuyController::class, 'editstock']);
        Route::delete('/{id}',  [XuathuyController::class, 'destroy']);
        Route::post('/active', [XuathuyController::class, 'active']);
        Route::get('/export', [XuathuyController::class, 'export']);

        Route::post('/submitxuathuy', [XuathuyController::class, 'submitxuathuy']);
        Route::post('/submitphieunhap', [XuathuyController::class, 'submitphieunhap']);
    });

    Route::group(['prefix' => 'kiemkho'], function () {
        Route::post('/',  [KiemkhoController::class, 'store']);
        Route::get('/edit',  [KiemkhoController::class, 'edit']);
        Route::get('/editstock',  [KiemkhoController::class, 'editstock']);

        Route::delete('/',  [KiemkhoController::class, 'destroy']);
        Route::post('/active', [KiemkhoController::class, 'active']);
        Route::get('/export', [KiemkhoController::class, 'export']);

        Route::post('/submitphieunhap', [KiemkhoController::class, 'submitphieunhap']);
        Route::post('/submitkiemkho', [KiemkhoController::class, 'submitkiemkho']);

        Route::get('/getlistunit', [KiemkhoController::class, 'getlistunit']);
        Route::get('/getlistunitwithid', [KiemkhoController::class, 'getlistunitwithid']);
        Route::get('/editinfostock', [KiemkhoController::class, 'editinfostock']);
        Route::get('/editlotno', [KiemkhoController::class, 'editlotno']);
    });

    Route::group(['prefix' => 'tonkho'], function () {
        Route::get('/data',  [InventoryController::class, 'data']);
        Route::get('/export', [InventoryController::class, 'export']);
        Route::get('/edit',  [InventoryController::class, 'edit']);
        Route::get('/editstock',  [InventoryController::class, 'editstock']);
    });
    Route::group(['middleware' => ['permission:Inventory']], function () {
        Route::get('/nhaptunhacungcap',  [NhaptunhaccController::class, 'index'])->name('nhaptunhacungcap');
        Route::get('/nhapton',  [NhaptonController::class, 'index'])->name('nhapton');
        Route::get('/xuattranhacungcap',  [XuattranhaccController::class, 'index'])->name('xuattranhacungcap');
        Route::get('/xuathuy',  [XuathuyController::class, 'index'])->name('xuathuy');
        Route::get('/kiemkho',  [KiemkhoController::class, 'index'])->name('kiemkho');
        Route::get('/tonkho',  [InventoryController::class, 'index'])->name('tonkho');
    });
    Route::group(['prefix' => 'khachhangtralai'], function () {
        Route::get('/',  [KhachhangtlController::class, 'index'])->name('khachhangtralai');
        Route::post('/',  [KhachhangtlController::class, 'store']);
        Route::get('/edit',  [KhachhangtlController::class, 'edit']);
        Route::get('/editstock',  [KhachhangtlController::class, 'editstock']);
        Route::delete('/',  [KhachhangtlController::class, 'destroy']);
        Route::post('/active', [KhachhangtlController::class, 'active']);
        Route::get('/export', [KhachhangtlController::class, 'export']);

        Route::get('/autosearch', [KhachhangtlController::class, 'autosearch']);
        Route::get('/autosearchimage', [KhachhangtlController::class, 'autosearchimage']);

        Route::post('/submitphieunhap', [KhachhangtlController::class, 'submitphieunhap']);
        Route::post('/submitlotno', [KhachhangtlController::class, 'submitlotno']);
        Route::post('/submitkhachhang', [KhachhangtlController::class, 'submitkhachhang']);
    });

    Route::group(['prefix' => 'bacsi'], function () {
        Route::post('/',  [BacsiController::class, 'store']);
        Route::get('/{id}/edit',  [BacsiController::class, 'edit']);
        Route::get('/detail',  [BacsiController::class, 'detail']);
        Route::delete('/{id}',  [BacsiController::class, 'destroy']);
        Route::post('/active', [BacsiController::class, 'active']);
        Route::post('/active1', [BacsiController::class, 'active1']);
        Route::get('/export', [BacsiController::class, 'export']);
        Route::post('/import', [BacsiController::class, 'import']);
        Route::post('/insertDataExcel',  [BacsiController::class, 'insertDataExcel']);
    });
    Route::group(['prefix' => 'nhacungcap'], function () {
        Route::post('/',  [NhacungcapController::class, 'store']);
        Route::get('/{id}/edit',  [NhacungcapController::class, 'edit']);
        Route::get('/{id}/editstock',  [NhacungcapController::class, 'editstock']);
        Route::put('/{id}',  [NhacungcapController::class, 'update']);
        Route::delete('/{id}',  [NhacungcapController::class, 'destroy']);
        Route::post('/active', [NhacungcapController::class, 'active']);
        Route::post('/active1', [NhacungcapController::class, 'active1']);
        Route::get('/export', [NhacungcapController::class, 'export']);
        Route::post('/import', [NhacungcapController::class, 'import']);
        Route::get('/detailNhaCungCap', [NhacungcapController::class, 'detailNhaCungCap']);
        Route::post('/import', [NhacungcapController::class, 'import']);
        Route::post('/insertDataExcel',  [NhacungcapController::class, 'insertDataExcel']);
    });
    Route::group(['middleware' => ['permission:Partner']], function () {
        Route::get('/bacsi',  [BacsiController::class, 'index'])->name('bacsi');
        Route::get('/nhacungcap',  [NhacungcapController::class, 'index'])->name('nhacungcap');
    });

    Route::group(['middleware' => ['permission:Warehouse']], function () {
        Route::group(['prefix' => 'soquy'], function () {
            Route::get('/',  [ThuchiController::class, 'index'])->name('soquy');
            Route::post('/',  [ThuchiController::class, 'store']);
            Route::post('/active', [ThuchiController::class, 'active']);
            Route::get('/edit',  [ThuchiController::class, 'edit']);
            Route::get('/editstock',  [ThuchiController::class, 'editstock']);
            Route::get('/export', [ThuchiController::class, 'export']);
            Route::get('/dayChart', [ThuchiController::class, 'dayChart']);
        });
    });


    Route::group(['prefix' => 'nhomkhachhang'], function () {
        Route::post('/',  [NhomkhachhangController::class, 'store']);
        Route::get('/{id}/edit',  [NhomkhachhangController::class, 'edit']);
        Route::delete('/{id}',  [NhomkhachhangController::class, 'destroy']);
        Route::post('/active', [NhomkhachhangController::class, 'active']);
        Route::post('/unactive', [NhomkhachhangController::class, 'unactive']);

        Route::get('/export', [NhomkhachhangController::class, 'export']);
        Route::post('/import', [NhomkhachhangController::class, 'import']);
        Route::post('/insertDataExcel',  [NhomkhachhangController::class, 'insertDataExcel']);
    });

    Route::group(['prefix' => 'nhomnhacungcap'], function () {
        Route::post('/',  [SupplierGroupController::class, 'store']);
        Route::get('/{id}/edit',  [SupplierGroupController::class, 'edit']);
        Route::delete('/{id}',  [SupplierGroupController::class, 'destroy']);
        Route::post('/active', [SupplierGroupController::class, 'active']);
        Route::post('/unactive', [SupplierGroupController::class, 'unactive']);
        Route::get('/export', [SupplierGroupController::class, 'export']);
        Route::post('/import', [SupplierGroupController::class, 'import']);
        Route::post('/insertDataExcel',  [SupplierGroupController::class, 'insertDataExcel']);
    });

    Route::group(['prefix' => 'nhomhanghoa'], function () {
        Route::post('/',  [StockGroupController::class, 'store']);
        Route::get('/edit',  [StockGroupController::class, 'edit']);
        Route::delete('/{id}',  [StockGroupController::class, 'destroy']);
        Route::post('/active', [StockGroupController::class, 'active']);
        Route::post('/unactive', [StockGroupController::class, 'unactive']);
        Route::get('/export', [StockGroupController::class, 'export']);
        Route::post('/import', [StockGroupController::class, 'import']);
        Route::post('/insertDataExcel',  [StockGroupController::class, 'insertDataExcel']);
    });

    Route::group(['prefix' => 'hanghoa'], function () {
        Route::post('/',  [StockController::class, 'store']);
        Route::get('/edit',  [StockController::class, 'edit']);
        Route::post('/active', [StockGroupController::class, 'active']);

        Route::get('/export', [StockController::class, 'export']);
        Route::post('/import', [StockController::class, 'import']);
        Route::post('/insertDataExcel',  [StockController::class, 'insertDataExcel']);

        Route::post('/submitunit',  [StockController::class, 'submitunit']);
        Route::post('/autosearchtable', [StockController::class, 'autosearchtable']);

        Route::get('/getdatawarehouse', [StockController::class, 'getdatawarehouse']);
        Route::get('/getdatalotno', [StockController::class, 'getdatalotno']);
        Route::get('/barcode', [StockController::class, 'barcode']);
        Route::post('/luuLichSuInMaVach', [StockController::class, 'luuLichSuInMaVach']);
        Route::get('/dataTableInMaVach', [StockController::class, 'dataTableInMaVach']);
    });

    Route::group(['prefix' => 'banggia'], function () {
        Route::post('/',  [PriceListController::class, 'store']);
        Route::get('/edit',  [PriceListController::class, 'edit']);
        Route::get('/editstock',  [PriceListController::class, 'editstock']);
        Route::delete('/{id}',  [PriceListController::class, 'destroy']);
        Route::get('/autosearchimage', [PriceListController::class, 'autosearchimage']);
        Route::get('/gethanghoa', [PriceListController::class, 'gethanghoa']);
        Route::post('/active', [PriceListController::class, 'active']);
        Route::post('/unactive', [PriceListController::class, 'unactive']);

        Route::post('/submitphieunhap', [PriceListController::class, 'submitphieunhap']);
        Route::post('/submitbanggia', [PriceListController::class, 'submitbanggia']);
        Route::get('/getpricelist', [PriceListController::class, 'getpricelist']);
    });

    Route::group(['prefix' => 'donthuocmau'], function () {
        Route::delete('/',  [SamplePrescriptionController::class, 'destroy']);
        Route::post('/',  [SamplePrescriptionController::class, 'store']);
        Route::get('/edit',  [SamplePrescriptionController::class, 'edit']);
        Route::get('/editstock',  [SamplePrescriptionController::class, 'editstock']);
        Route::post('/active', [SamplePrescriptionController::class, 'active']);
        Route::get('/autosearchimage', [SamplePrescriptionController::class, 'autosearchimage']);
        Route::post('/unactive', [SamplePrescriptionController::class, 'unactive']);

        Route::get('/export', [SamplePrescriptionController::class, 'export']);

        Route::get('/getlistunit', [SamplePrescriptionController::class, 'getlistunit']);
        Route::get('/getlistunitwithid', [SamplePrescriptionController::class, 'getlistunitwithid']);
        Route::get('/getlistlotnowithid', [SamplePrescriptionController::class, 'getlistlotnowithid']);
        Route::get('/editinfostock', [SamplePrescriptionController::class, 'editinfostock']);
        Route::get('/editlotno', [SamplePrescriptionController::class, 'editlotno']);

        Route::post('/submitphieunhap', [SamplePrescriptionController::class, 'submitphieunhap']);
        Route::post('/submitdonthuocmau', [SamplePrescriptionController::class, 'submitdonthuocmau']);
    });

    Route::group(['prefix' => 'danhmucthuoc'], function () {
        Route::get('/export', [DanhmucthuocController::class, 'export']);
    });

    Route::group(['prefix' => 'calamviec'], function () {
        Route::post('/',  [ShiftController::class, 'store']);
        Route::get('/{id}/edit',  [ShiftController::class, 'edit']);
        Route::delete('/{id}',  [ShiftController::class, 'destroy']);
        Route::post('/active', [ShiftController::class, 'active']);
        Route::post('/unactive', [ShiftController::class, 'unactive']);
    });
    Route::group(['middleware' => ['permission:Category']], function () {
        Route::get('/nhomkhachhang',  [NhomkhachhangController::class, 'index'])->name('nhomkhachhang');
        Route::get('/nhomnhacungcap',  [SupplierGroupController::class, 'index'])->name('nhomnhacungcap');
        Route::get('/nhomhanghoa',  [StockGroupController::class, 'index'])->name('nhomhanghoa');
        Route::get('/hanghoa',  [StockController::class, 'index'])->name('hanghoa');
        Route::get('/banggia',  [PriceListController::class, 'index'])->name('banggia');
        Route::get('/calamviec',  [ShiftController::class, 'index'])->name('calamviec');
        Route::get('/danhmucthuoc', [DanhmucthuocController::class, 'index'])->name('danhmucthuoc');
        Route::get('/donthuocmau', [SamplePrescriptionController::class, 'index'])->name('donthuocmau');
    });

    Route::group(['middleware' => ['permission:Report']], function () {
        Route::group(['prefix' => 'baocao'], function () {
            Route::get('/',  [ReportController::class, 'index'])->name('baocao');
        });
    });

    Route::group(['middleware' => ['permission:Administration']], function () {
        Route::group(['prefix' => 'goidangky'], function () {
            Route::get('/',  [GoidangkyController::class, 'index'])->name('goidangky');
            Route::get('/',  [GoidangkyController::class, 'getHome']);
            Route::post('/submitdangky',  [GoidangkyController::class, 'submitdangky']);
            Route::get('/data', [GoidangkyController::class, 'data']);
        });
        Route::group(['prefix' => 'vaitro'], function () {
            Route::get('/',  [UserRolesController::class, 'index'])->name('vaitro');
            Route::post('/',  [UserRolesController::class, 'store']);
            Route::get('/edit',  [UserRolesController::class, 'edit']);
        });
        Route::group(['prefix' => 'nguoidung'], function () {
            Route::get('/',  [UserController::class, 'index'])->name('nguoidung');
            Route::get('/edit',  [UserController::class, 'edit']);
            Route::put('/',  [UserController::class, 'update']);
            Route::post('/', [UserController::class, 'store']);
            Route::delete('/', [UserController::class, 'destroy']);

            Route::put('/khoataikhoan', [UserController::class, 'khoaTaiKhoan']);
            Route::put('/mokhoataikhoan', [UserController::class, 'moKhoaTaiKhoan']);
            Route::post('/doimatkhau', [UserController::class, 'doiMatKhau']);
        });
        Route::group(['prefix' => 'lichsuthaotac'], function () {
            Route::get('/',  [ManipulationHistoryController::class, 'index'])->name('lichsuthaotac');
        });
        Route::group(['prefix' => 'caidat'], function () {
            Route::get('/',  [SetingController::class, 'index'])->name('caidat');
            Route::post('/',  [SetingController::class, 'store']);
            Route::get('/data',  [SetingController::class, 'getdatamauin']);
        });
    });


    Route::group(['prefix' => 'thongbao'], function () {
        Route::get('/',  [NotificationController::class, 'index'])->name('thongbao');
    });
    Route::group(['prefix' => 'huongdansudung'], function () {
        Route::get('/',  [UserManualController::class, 'index'])->name('huongdansudung');
        Route::get('/collapseOne',  [UserManualController::class, 'index']);
    });
    Route::group(['prefix' => 'gopy'], function () {
        Route::get('/',  [SuggestionsController::class, 'index'])->name('gopy');
    });
    Route::group(['prefix' => 'bcdoanhthubanhang'], function () {
        Route::get('/',  [BcDoanhThuBanHangController::class, 'index'])->name('bcdoanhthubanhang');
        Route::get('/money',  [BcDoanhThuBanHangController::class, 'money']);
        Route::get('/promiss',  [BcDoanhThuBanHangController::class, 'promiss']);
        Route::get('/bill',  [BcDoanhThuBanHangController::class, 'bill']);
    });
    Route::group(['prefix' => 'bcnhaphang'], function () {
        Route::get('/',  [BcNhapHangController::class, 'index'])->name('bcnhaphang');
        Route::get('/nhapnhacc',  [BcNhapHangController::class, 'supplier'])->name('supplier');
        Route::get('/nhapton',  [BcNhapHangController::class, 'import'])->name('supplier');
        Route::get('/khachhangtralai',  [BcNhapHangController::class, 'customers']);
    });
    Route::group(['prefix' => 'sotheodoidoam'], function () {
        Route::get('/',  [SoTheoDoiDoAmController::class, 'index'])->name('sotheodoidoam');
    });
    Route::group(['prefix' => 'sotheodoitheodon'], function () {
        Route::get('/',  [SoTheoDoiTheoDonController::class, 'index'])->name('sotheodoitheodon');
    });
    Route::group(['prefix' => 'baocaoloinhuan'], function () {
        Route::get('/',  [BcLoiNhanBanHangController::class, 'index'])->name('baocaoloinhuan');
        Route::get('/money',  [BcLoiNhanBanHangController::class, 'money']);
        Route::get('/promiss',  [BcLoiNhanBanHangController::class, 'promiss']);
        Route::get('/bill',  [BcLoiNhanBanHangController::class, 'bill']);
    });
    Route::group(['prefix' => 'sotheodoimuabanthuoc'], function () {
        Route::get('/',  [SoTheoDoiMuaBanThuocController::class, 'index'])->name('sotheodoimuabanthuoc');
    });
    Route::group(['prefix' => 'sotheodoivesinh'], function () {
        Route::get('/',  [SoTheoDoiVeSinhController::class, 'index'])->name('sotheodoivesinh');
    });
    Route::group(['prefix' => 'banthuockhongtheodon'], function () {
        Route::get('/',  [BanThuocKhongTheoDonController::class, 'index'])->name('banthuockhongtheodon');
    });
    Route::group(['prefix' => 'bcdoanhthucalamviec'], function () {
        Route::get('/',  [BcDoanhThuCaLamViecController::class, 'index'])->name('bcdoanhthucalamviec');
        Route::get('/money',  [BcDoanhThuCaLamViecController::class, 'money']);
        Route::get('/promiss',  [BcDoanhThuCaLamViecController::class, 'promiss']);
        Route::get('/bill',  [BcDoanhThuCaLamViecController::class, 'bill']);
    });
    Route::group(['prefix' => 'sotheodoixuatnhapkhautungthuoc'], function () {
        Route::get('/',  [XuatNhapKhauThuocController::class, 'index'])->name('sotheodoixuatnhapkhautungthuoc');
    });
    Route::group(['prefix' => 'sotheodoibenhnhan'], function () {
        Route::get('/',  [SoTheoDoiBenhNhanController::class, 'index'])->name('sotheodoibenhnhan');
    });
    Route::group(['prefix' => 'sokiemsoatdinhky'], function () {
        Route::get('/',  [SoKiemSoatDinhKy::class, 'index'])->name('sokiemsoatdinhky');
        Route::post('/submitsokiemsoat', [SoKiemSoatDinhKy::class, 'submitsokiemsoat']);
        Route::post('/submitphieunhap', [SoKiemSoatDinhKy::class, 'submitphieunhap']);
        Route::get('/edit',  [SoKiemSoatDinhKy::class, 'edit']);
        Route::get('/editstock',  [SoKiemSoatDinhKy::class, 'editstock']);
        Route::delete('/{id}',  [SoKiemSoatDinhKy::class, 'destroy']);
    });
    //bao cáo
    Route::group(['prefix' => 'thatthoatnhamlan'], function () {
        Route::get('/', [ThatThoatNhamLanController::class, 'index'])->name('thatthoatnhamlan');
    });

    Route::group(['prefix' => 'phanungcuathuoc'], function () {
        Route::get('/', [PhanUngCuaThuocController::class, 'index'])->name('phanungcuathuoc');
        Route::post('/',  [PhanUngCuaThuocController::class, 'store']);
        Route::get('/{id}/edit',  [PhanUngCuaThuocController::class, 'edit']);
        Route::delete('/{id}',  [PhanUngCuaThuocController::class, 'destroy']);
    });

    Route::group(['prefix' => 'theodoithuhoithuoc'], function () {
        Route::get('/', [TheoDoiThuHoiThuocController::class, 'index'])->name('theodoithuhoithuoc');
        Route::post('/',  [TheoDoiThuHoiThuocController::class, 'store']);
        Route::get('/{id}/edit',  [TheoDoiThuHoiThuocController::class, 'edit']);
        Route::delete('/{id}',  [TheoDoiSuLyKhieuNaiController::class, 'destroy']);
    });

    Route::group(['prefix' => 'banhangtheobacsi'], function () {
        Route::get('/', [BanHangTheoBacSiController::class, 'index'])->name('banhangtheobacsi');
        Route::get('/data', [BanHangTheoBacSiController::class, 'data']);
        Route::get('/data_import', [BanHangTheoBacSiController::class, 'data_import']);
        Route::get('/data_import_commodity', [BanHangTheoBacSiController::class, 'data_import_commodity']);
    });

    Route::group(['prefix' => 'xuatnhaptonthuoc'], function () {
        Route::get('/', [XuatNhapTonThuocController::class, 'index'])->name('xuatnhaptonthuoc');
    });

    Route::group(['prefix' => 'theodoisulykhieunai'], function () {
        Route::get('/', [TheoDoiSuLyKhieuNaiController::class, 'index'])->name('theodoisulykhieunai');
        Route::post('/',  [TheoDoiSuLyKhieuNaiController::class, 'store']);
        Route::get('/{id}/edit',  [TheoDoiSuLyKhieuNaiController::class, 'edit']);
        Route::delete('/{id}',  [TheoDoiSuLyKhieuNaiController::class, 'destroy']);
    });

    Route::group(['prefix' => 'theodoihandung'], function () {
        Route::get('/', [TheoDoiHanDungController::class, 'index'])->name('theodoihandung');
    });

    Route::group(['prefix' => 'doanhthubanhangtheonv'], function () {
        Route::get('/', [DoanhThuBanHangTheoNVController::class, 'index'])->name('doanhthubanhangtheonv');
        Route::get('/promiss',  [DoanhThuBanHangTheoNVController::class, 'promiss']);
        Route::get('/bill',  [DoanhThuBanHangTheoNVController::class, 'bill']);
    });
});
