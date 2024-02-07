<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CekKesehatanController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\IndexController;
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

// Route::get('/', Controller() {
//     return view('welcome');
// });

Route::controller(IndexController::class)->group(function() {
    Route::get('/', 'indexView')->name('dashboard');
    Route::get('/Penyakit-hama-tanaman-cabai', 'penyakitTanamanCabaiView')->name('penyakitTanamanCabaiView');
    Route::get('/gejala-tanaman-cabai', 'gejalaTanamanCabaiView')->name('gejalaTanamanCabaiView');
});

Route::controller(CekKesehatanController::class)->group(function() {
    Route::get('/cekKesehatan', 'indexView')->name('cekKesehatanView');
});

Route::controller(AuthController::class)->group(function() {
    Route::get('/login', 'loginView')->name('login');
    Route::post('/loginAction', 'loginAction')->name('loginAction');
    
    Route::get('/register', 'registerView')->name('registerView');
    Route::get('/forgotPassword', 'forgotPassView')->name('forgotPassView');
    
    Route::get('/profile', 'profileView')->name('profileView')->middleware('auth.basic');
});

Route::middleware('auth')->group(function(){
    Route::controller(PatientController::class)->group(function() {
        Route::get('/history', 'historyScanView')->name('historyScanView');
    });
});