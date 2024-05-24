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
| Web Routes test
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
    Route::get('/Penyakit-hama-tanaman-cabai/{id}', 'detailPenyakitTanamanCabaiView')->name('detailPenyakitTanamanCabaiView');
    Route::get('/gejala-tanaman-cabai', 'gejalaTanamanCabaiView')->name('gejalaTanamanCabaiView');
    Route::get('/gejala-tanaman-cabai/{id}', 'detailGejalaTanamanCabaiView')->name('detailGejalaTanamanCabaiView');
});

Route::controller(CekKesehatanController::class)->group(function() {
    Route::get('/cekKesehatan', 'indexView')->name('cekKesehatanView');
    Route::get('/cekKesehatanBobot', 'bobotGejala')->name('bobotGejala');
    Route::post('/cekKesehatan', 'cekKesehatanAction')->name('cekKesehatanAction');
    Route::get('/resultCekKesehatan/{id}', 'resultCekKesehatanView')->name('resultCekKesehatanView');
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
            Route::get('/penyakit', 'penyakitView')->name('penyakitView');
            Route::get('/addPenyakit', 'addPenyakitView')->name('addPenyakitView');
            Route::post('/addPenyakit', 'addPenyakitAction')->name('addPenyakitAction');

            // CRUD Gejala
            Route::get('/gejala', 'gejalaView')->name('gejalaView');
            Route::get('/addGejala', 'addGejalaView')->name('addGejalaView');
            Route::post('/addGejala', 'addGejalaAction')->name('addGejalaAction');

            // RU Kasus
            Route::get('/kasus', 'kasusView')->name('kasusView');
            Route::get('/allKasus', 'allKasusView')->name('allKasusView');
            Route::get('/addKasus', 'addKasusView')->name('addKasusView');
            Route::post('/addKasus', 'addKasus')->name('addKasus');
            Route::get('/kasus/{id}', 'detailKasusView')->name('detailKasusView');
            Route::patch('/kasus/{id}', 'validasiKasus')->name('validasiKasus');
            Route::patch('/kasus/{id}/updateDisease', 'kasusUpdateDisease')->name('kasusUpdateDisease');
            Route::get('/kasus/{id}/result', 'resultKasus')->name('resultKasus');
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