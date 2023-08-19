<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\WargaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KeluargaController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\MeninggalController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\TamuController;

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
    return view('home.landingPage');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/home',[HomeController::class, 'index'])->middleware('auth')->name('home');


Route::prefix('warga')->middleware(['auth','admin'])->group(function () {
    Route::get('/',[WargaController::class, 'index'])->name('warga');
    Route::get('/create', [WargaController::class, 'create'])->name('warga.create');
    Route::post('/', [WargaController::class, 'store'])->name('warga.store');
    Route::get('/{warga}/edit', [WargaController::class, 'edit'])->name('warga.edit');
    Route::put('/{warga}/edit', [WargaController::class, 'update']);
    Route::delete('/warga/{warga}', [WargaController::class, 'destroy'])->name('warga.destroy');
    Route::get('/{warga}/show', [WargaController::class, 'show'])->name('warga.show');
    Route::get('view/pdf', [WargaController::class, 'generatePDF'])->name('warga.generatePDF');
    Route::get('/generate-word-doc/{warga}', [WargaController::class, 'generateWordDoc'])->name('warga.generateWordDoc');
    Route::get('download/pdf', [WargaController::class, 'downloadPDF'])->name('warga.downloadPDF');
    Route::get('/check-nik', [WargaController::class, 'checkNik'])->name('checkNik');
    Route::post('/import', [WargaController::class, 'import'])->name('warga.import');


});


Route::prefix('keluarga')->middleware(['auth','admin'])->group(function () {
    Route::get('/',[KeluargaController::class, 'index'])->name('keluarga');
    Route::get('/create', [KeluargaController::class, 'create'])->name('keluarga.create');
    Route::post('/', [KeluargaController::class, 'store'])->name('keluarga.store');
    Route::get('/{keluarga}/edit', [KeluargaController::class, 'edit'])->name('keluarga.edit');
    Route::put('/{keluarga}/edit', [KeluargaController::class, 'update']);
    Route::delete('/{keluarga}', [KeluargaController::class, 'destroy'])->name('keluarga.destroy');
});

Route::prefix('kendaraan')->middleware(['auth','admin'])->group(function () {
    Route::get('/',[KendaraanController::class, 'index'])->name('kendaraan');
    Route::get('/create', [KendaraanController::class, 'create'])->name('kendaraan.create');
    Route::post('/', [KendaraanController::class, 'store'])->name('kendaraan.store');
    Route::get('/{kendaraan}/edit', [KendaraanController::class, 'edit'])->name('kendaraan.edit');
    Route::put('/{kendaraan}/edit', [KendaraanController::class, 'update']);
    Route::delete('/{kendaraan}', [KendaraanController::class, 'destroy'])->name('kendaraan.destroy');

});

Route::prefix('tamu')->middleware(['auth','admin'])->group(function (){
    Route::get('/',[TamuController::class, 'index'])->name('tamu');
    Route::get('/create', [TamuController::class, 'create'])->name('tamu.create');
    Route::post('/', [TamuController::class, 'store'])->name('tamu.store');
    Route::get('/{tamu}/edit', [TamuController::class, 'edit'])->name('tamu.edit');
    Route::put('/{tamu}/edit', [TamuController::class, 'update']);
    Route::delete('/{tamu}', [TamuController::class, 'destroy'])->name('tamu.destroy');

});

Route::prefix('meninggal')->middleware(['auth','admin'])->group(function (){
    Route::get('/',[MeninggalController::class, 'index'])->name('meninggal');
    Route::get('/create', [MeninggalController::class, 'create'])->name('meninggal.create');
    Route::post('/', [MeninggalController::class, 'store'])->name('meninggal.store');
    Route::get('/{meninggal}/edit', [MeninggalController::class, 'edit'])->name('meninggal.edit');
    Route::put('/{meninggal}/edit', [MeninggalController::class, 'update']);
    Route::delete('/{meninggal}', [MeninggalController::class, 'destroy'])->name('meninggal.destroy');

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
