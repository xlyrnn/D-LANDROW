<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengadaanTanahController; 
use App\Http\Controllers\RowController;
use App\Models\PengadaanTanah; 
use App\Models\Row;             
use App\Http\Controllers\PerizinanController;
use App\Http\Controllers\RowPerizinanController;
use App\Http\Controllers\SosialisasiController;
use App\Http\Controllers\RowSosialisasiController;
use App\Http\Controllers\InventarisasiController;
use App\Http\Controllers\RowInventarisasiController;
use App\Http\Controllers\MusyawarahSubController;
use App\Http\Controllers\RowMusyawarahSubController;
use App\Http\Controllers\PembayaranSubController;
use App\Http\Controllers\RowPembayaranController;
use App\Http\Controllers\MusyawarahController;
use App\Http\Controllers\PembayaranController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('landingpage');
});

Route::get('/homepage', function () {
    $daftarPengadaanTanah = PengadaanTanah::latest()->get();
    $daftarRow = Row::latest()->get();
    return view('homepage', [
        'daftarPengadaanTanah' => $daftarPengadaanTanah,
        'daftarRow' => $daftarRow,
    ]);
})->middleware(['auth', 'verified'])->name('homepage');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    /*pengadaan tanah*/
    Route::get('/pengadaan-tanah/baru/{kategori}', [PengadaanTanahController::class, 'create'])->name('pengadaan_tanah.create');
    Route::post('/pengadaan-tanah', [PengadaanTanahController::class, 'store'])->name('pengadaan_tanah.store');

    Route::get('/pengadaan-tanah/{pengadaanTanah}/edit', [PengadaanTanahController::class, 'edit'])->name('pengadaan_tanah.edit');
    Route::put('/pengadaan-tanah/{pengadaanTanah}', [PengadaanTanahController::class, 'update'])->name('pengadaan_tanah.update');
    Route::delete('/pengadaan-tanah/{pengadaanTanah}', [PengadaanTanahController::class, 'destroy'])->name('pengadaan_tanah.destroy');

    Route::get('/pengadaan-tanah/{pengadaanTanah}/perizinan', [PerizinanController::class, 'edit'])->name('pengadaan_tanah.perizinan.edit');
    Route::post('/pengadaan-tanah/{pengadaanTanah}/perizinan', [PerizinanController::class, 'store'])->name('pengadaan_tanah.perizinan.store');

    Route::get('/pengadaan-tanah/{pengadaanTanah}/sosialisasi', [SosialisasiController::class, 'index'])->name('sosialisasi.index');
    Route::get('/pengadaan-tanah/{pengadaanTanah}/sosialisasi/create', [SosialisasiController::class, 'create'])->name('sosialisasi.create');
    Route::post('/pengadaan-tanah/{pengadaanTanah}/sosialisasi', [SosialisasiController::class, 'store'])->name('sosialisasi.store');

    Route::get('/sosialisasi/{sosialisasi}/edit', [SosialisasiController::class, 'edit'])->name('sosialisasi.edit');
    Route::put('/sosialisasi/{sosialisasi}', [SosialisasiController::class, 'update'])->name('sosialisasi.update');
    Route::delete('/sosialisasi/{sosialisasi}', [SosialisasiController::class, 'destroy'])->name('sosialisasi.destroy');

    Route::get('/pengadaan-tanah/{pengadaanTanah}/inventarisasi', [InventarisasiController::class, 'index'])->name('inventarisasi.index');
    Route::get('/pengadaan-tanah/{pengadaanTanah}/inventarisasi/create', [InventarisasiController::class, 'create'])->name('inventarisasi.create');
    Route::post('/pengadaan-tanah/{pengadaanTanah}/inventarisasi', [InventarisasiController::class, 'store'])->name('inventarisasi.store');

    Route::get('/inventarisasi/{inventarisasi}/edit', [InventarisasiController::class, 'edit'])->name('inventarisasi.edit');
    Route::put('/inventarisasi/{inventarisasi}', [InventarisasiController::class, 'update'])->name('inventarisasi.update');
    Route::delete('/inventarisasi/{inventarisasi}', [InventarisasiController::class, 'destroy'])->name('inventarisasi.destroy');

    Route::get('/pengadaan-tanah/{pengadaanTanah}/musyawarah-sub', [MusyawarahSubController::class, 'index'])->name('musyawarah_sub.index');
    Route::get('/pengadaan-tanah/{pengadaanTanah}/musyawarah-sub/create', [MusyawarahSubController::class, 'create'])->name('musyawarah_sub.create');    
    Route::post('/pengadaan-tanah/{pengadaanTanah}/musyawarah-sub', [MusyawarahSubController::class, 'store'])->name('musyawarah_sub.store');

    Route::get('/musyawarah-sub/{musyawarahSub}/edit', [MusyawarahSubController::class, 'edit'])->name('musyawarah_sub.edit');
    Route::put('/musyawarah-sub/{musyawarahSub}', [MusyawarahSubController::class, 'update'])->name('musyawarah_sub.update');
    Route::delete('/musyawarah-sub/{musyawarahSub}', [MusyawarahSubController::class, 'destroy'])->name('musyawarah_sub.destroy');

    Route::get('/pengadaan-tanah/{pengadaanTanah}/pembayaran-sub', [PembayaranSubController::class, 'index'])->name('pembayaran_sub.index');
    Route::get('/pengadaan-tanah/{pengadaanTanah}/pembayaran-sub/create', [PembayaranSubController::class, 'create'])->name('pembayaran_sub.create');
    Route::post('/pengadaan-tanah/{pengadaanTanah}/pembayaran-sub', [PembayaranSubController::class, 'store'])->name('pembayaran_sub.store');

    Route::get('/pembayaran-sub/{pembayaranSub}/edit', [PembayaranSubController::class, 'edit'])->name('pembayaran_sub.edit');
    Route::put('/pembayaran-sub/{pembayaranSub}', [PembayaranSubController::class, 'update'])->name('pembayaran_sub.update');
    Route::delete('/pembayaran-sub/{pembayaranSub}', [PembayaranSubController::class, 'destroy'])->name('pembayaran_sub.destroy');

    Route::get('/pengadaan-tanah/{pengadaanTanah}/musyawarah', [MusyawarahController::class, 'index'])->name('musyawarah.index');
    Route::post('/pengadaan-tanah/{pengadaanTanah}/musyawarah', [MusyawarahController::class, 'store'])->name('musyawarah.store');
    Route::post('/musyawarah/{musyawarah}/upload', [MusyawarahController::class, 'upload'])->name('musyawarah.upload');

    Route::get('/pengadaan-tanah/{pengadaanTanah}/pembayaran', [PembayaranController::class, 'index'])->name('pembayaran.index');
    Route::post('/pembayaran/{item}/update', [PembayaranController::class, 'update'])->name('pembayaran.update');

    /*row*/
    Route::get('/row/baru', [RowController::class, 'create'])->name('row.create');
    Route::post('/row', [RowController::class, 'store'])->name('row.store');

    Route::get('/row/{row}/edit', [RowController::class, 'edit'])->name('row.edit');
    Route::put('/row/{row}', [RowController::class, 'update'])->name('row.update');
    Route::delete('/row/{row}', [RowController::class, 'destroy'])->name('row.destroy');

    Route::get('/row/{row}/perizinan', [RowPerizinanController::class, 'edit'])->name('row.perizinan.edit');
    Route::post('/row/{row}/perizinan', [RowPerizinanController::class, 'store'])->name('row.perizinan.store');

    Route::get('/row/{row}/sosialisasi', [RowSosialisasiController::class, 'index'])->name('row.sosialisasi.index');
    Route::get('/row/{row}/sosialisasi/create', [RowSosialisasiController::class, 'create'])->name('row.sosialisasi.create');
    Route::post('/row/{row}/sosialisasi', [RowSosialisasiController::class, 'store'])->name('row.sosialisasi.store');

    Route::get('/row/sosialisasi/{sosialisasi}/edit', [RowSosialisasiController::class, 'edit'])->name('row.sosialisasi.edit');
    Route::put('/row/sosialisasi/{sosialisasi}', [RowSosialisasiController::class, 'update'])->name('row.sosialisasi.update');
    Route::delete('/row/sosialisasi/{sosialisasi}', [RowSosialisasiController::class, 'destroy'])->name('row.sosialisasi.destroy');

    Route::get('/row/{row}/sosialisasi', [RowSosialisasiController::class, 'index'])->name('row.sosialisasi.index');
    Route::get('/row/{row}/sosialisasi/create', [RowSosialisasiController::class, 'create'])->name('row.sosialisasi.create');
    Route::post('/row/{row}/sosialisasi', [RowSosialisasiController::class, 'store'])->name('row.sosialisasi.store');
    
    Route::get('/row/sosialisasi/{sosialisasi}/edit', [RowSosialisasiController::class, 'edit'])->name('row.sosialisasi.edit');
    Route::put('/row/sosialisasi/{sosialisasi}', [RowSosialisasiController::class, 'update'])->name('row.sosialisasi.update');
    Route::delete('/row/sosialisasi/{sosialisasi}', [RowSosialisasiController::class, 'destroy'])->name('row.sosialisasi.destroy'); 

    Route::get('/row/{row}/inventarisasi', [RowInventarisasiController::class, 'index'])->name('row-inventarisasi.index');
    Route::get('/row/{row}/inventarisasi/create', [RowInventarisasiController::class, 'create'])->name('row-inventarisasi.create');
    Route::post('/row/{row}/inventarisasi', [RowInventarisasiController::class, 'store'])->name('row-inventarisasi.store');

    Route::get('/row-inventarisasi/{rowInventarisasi}/edit', [RowInventarisasiController::class, 'edit'])->name('row-inventarisasi.edit');
    Route::put('/row-inventarisasi/{rowInventarisasi}', [RowInventarisasiController::class, 'update'])->name('row-inventarisasi.update');
    Route::delete('/row-inventarisasi/{rowInventarisasi}', [RowInventarisasiController::class, 'destroy'])->name('row-inventarisasi.destroy');

    Route::get('/row/{row}/musyawarah-sub', [RowMusyawarahSubController::class, 'index'])->name('row.musyawarah_sub.index');
    Route::get('/row/{row}/musyawarah-sub/create', [RowMusyawarahSubController::class, 'create'])->name('row.musyawarah_sub.create');
    Route::post('/row/{row}/musyawarah-sub', [RowMusyawarahSubController::class, 'store'])->name('row.musyawarah_sub.store');

    Route::get('/row/musyawarah-sub/{musyawarahSub}/edit', [RowMusyawarahSubController::class, 'edit'])->name('row.musyawarah_sub.edit');
    Route::put('/row/musyawarah-sub/{musyawarahSub}', [RowMusyawarahSubController::class, 'update'])->name('row.musyawarah_sub.update');
    Route::delete('/row/musyawarah-sub/{musyawarahSub}', [RowMusyawarahSubController::class, 'destroy'])->name('row.musyawarah_sub.destroy');

    Route::get('/row/{row}/pembayaran', [RowPembayaranController::class, 'index'])->name('row.pembayaran.index');
    Route::get('/row/{row}/pembayaran/create', [RowPembayaranController::class, 'create'])->name('row.pembayaran.create');
    Route::post('/row/{row}/pembayaran', [RowPembayaranController::class, 'store'])->name('row.pembayaran.store');

    Route::get('/row-pembayaran/{pembayaran}/edit', [RowPembayaranController::class, 'edit'])->name('row.pembayaran.edit');
    Route::put('/row-pembayaran/{pembayaran}', [RowPembayaranController::class, 'update'])->name('row.pembayaran.update');
    Route::delete('/row-pembayaran/{pembayaran}', [RowPembayaranController::class, 'destroy'])->name('row.pembayaran.destroy');

});

require __DIR__.'/auth.php';