<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CekKesehatanController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PakarController;
use App\Http\Controllers\PatientController;
use Illuminate\Support\Facades\Route;

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

Route::controller(IndexController::class)->group(function() {
    Route::get('/', 'indexView')->name('dashboard');
    Route::get('/Penyakit-hama-tanaman-cabai', 'penyakitTanamanCabaiView')->name('penyakitTanamanCabaiView');
    Route::get('/gejala-tanaman-cabai', 'gejalaTanamanCabaiView')->name('gejalaTanamanCabaiView');
});

Route::controller(CekKesehatanController::class)->group(function() {
    Route::get('/cekKesehatan', 'indexView')->name('cekKesehatanView');
});

Route::controller(AuthController::class)->group(function() {
    Route::get('/login', 'loginView')->name('loginView');
    Route::post('/loginAction', 'loginAction')->name('loginAction');
    Route::post('/logoutAction', 'logoutAction')->name('logoutAction');

    Route::get('/register', 'registerView')->name('registerView');
    Route::get('/forgotPassword', 'forgotPassView')->name('forgotPassView');
    
});

Route::middleware('auth')->group(function(){
    // profile user
    Route::controller(AuthController::class)->group(function() {
        Route::get('/profile', 'profileView')->name('profileView');
    });

    // history scan user
    Route::controller(PatientController::class)->group(function() {
        Route::get('/history', 'historyScanView')->name('historyScanView');
        // Routing detail history (buat page baru)
    });    
    
    // method for pasien
    Route::middleware('type:pasien')->group(function() {
        Route::prefix('pasien')->controller(PatientController::class)->group(function() {});
    });

    // method for pakar
    Route::middleware('type:pakar')->group(function() {
        Route::prefix('pakar')->controller(PakarController::class)->group(function() {
            // Dashboard pakar
            Route::get('/', 'dashboardPakar')->name('dashboardPakar');
            // CRUD Penyakit
            // CRUD Gejala
            // RU Kasus
            Route::get('/kasus', 'kasusView')->name('kasusView');
            Route::get('/kasus/{id}', 'detailKasusView')->name('detailKasusView');
        });
    });

    // method for admin
    Route::middleware('type:admin')->group(function() {
        Route::prefix('admin')->controller(PatientController::class)->group(function() {
            // Dashboard admin
            // CRUD User
        });
    });
});