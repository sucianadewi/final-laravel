<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JasaController;
use App\Http\Controllers\UserController;
// use App\Http\Controllers\LoginController;
use App\Http\Controllers\ServisController;
use App\Http\Controllers\KeluhanController;
use App\Http\Controllers\NonAktifController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TindakLanjutController;
use App\Http\Controllers\UpdatePasswordController;
use App\Http\Controllers\UpdateProfileController;
use App\Http\Controllers\Auth\LoginController;

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


Route::get('/', [HomeController::class, 'index']);


    Route::resource('home', HomeController::class)->middleware('auth');
    //untuk mengidentifikasi route controller
    Route::group(['middleware' => ['auth','cekRole:Admin,Petugas']], function () { 
        Route::resource('profile', UpdateProfileController::class);
        //update password
        Route::put('profile/edit_password/{id}', [UpdateProfileController::class,'editPassword']);

    
    });

    Route::group(['middleware' => ['auth','cekRole:Petugas']], function () {
        Route::resource('jasa', JasaController::class);
        Route::resource('servis', ServisController::class);
        Route::resource('keluhan', KeluhanController::class);

        //status keluhan
        Route::get('keluhan/status/{id}', [KeluhanController::class, 'status']);

        //tindak lanjut
        Route::resource('tindak_lanjut', TindakLanjutController::class);
        Route::get('keluhan/tindak_lanjut/{id}', [TindakLanjutController::class,'buat'])->name('tindak_lanjut.buat');

    });


    Route::group(['middleware' => ['auth','cekRole:Admin']], function () {
        Route::resource('pengguna', UserController::class);
        Route::put('pengguna/edit_password/{id}', [UserController::class,'editPassword']);

        //ubah status user
        Route::get('pengguna/status/{id}', [UserController::class, 'status'])->name('status');

        //cetak laporan servis
        Route::get('cetak_servis', [ServisController::class,'cetakForm'])->name('cetak_servis');
        Route::get('cetak_servis/cari', [ServisController::class,'cari']);
        // Route::get('cetak_servis/cetak_servis_pertanggal/{tgl_awal}/{tgl_akhir}', [ServisController::class,'cetakPertanggal'])->name('cetak_servis_pertanggal');
        Route::get('cetak_servis/cetak_pdf/{tgl_awal}/{tgl_akhir}', [ServisController::class,'cetakPdf']);


        //cetak laporan keluhan
        Route::get('cetak_keluhan', [KeluhanController::class,'cetakForm'])->name('cetak_keluhan');
        Route::get('cetak_keluhan/cari', [KeluhanController::class,'cari']);
        // Route::get('cetak_keluhan/cetak_keluhan_pertanggal', [KeluhanController::class,'cetakPertanggal'])->name('cetak_keluhan_pertanggal');
        Route::get('cetak_keluhan/cetak_pdf/{tgl_awal}/{tgl_akhir}', [KeluhanController::class,'cetakPdf']);
    });




//halaman pelanggan
Route::get('pelanggan', [PelangganController::class,'index'])->name('pelanggan');
Route::get('pelanggan/search', [PelangganController::class,'cari'])->name('cari');
Route::get('/pencarian',[PelangganController::class,'pencarian']);
Route::get('/pelanggan/tambah/{id}', [PelangganController::class,'create']);
Route::get('/pelanggan/detail/{id}', [PelangganController::class,'detail']);
Route::post('/pelanggan',[PelangganController::class,'store']);

//Authenticate Login,register,logout --laravel/ui
Auth::routes();





//catatan :
//route get => jasa => index
//route get => jasa/create =>create
//route post => jasa => store
//route get => jasa/{id} => show
//route put/patch => jasa/{id} =>update
//route delete => jasa/{id} => delete
//route get => jasa/{id}/edit => edit


