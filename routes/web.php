<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\VerificationController;

use App\Models\Pengajuansampah;
use App\Models\Pengajuanpohon;
use App\Models\Pengajuanenergi;
use App\Http\Controllers\User\HomeuserController;
use App\Http\Controllers\User\TanamanuserController;
use App\Http\Controllers\User\SampahuserController;
use App\Http\Controllers\User\UserController;

use App\Http\Controllers\Admin\HomeadminController;
use App\Http\Controllers\Admin\TanamanController;
use App\Http\Controllers\Admin\SampahController;
use App\Http\Controllers\Admin\EnergiController;
use App\Http\Controllers\Admin\AdminController;

use App\Notifications\Auth\VerifyEmail;
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

Route::get('/', function () {
    return view('Login');
});

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('loginproses', [LoginController::class, 'loginproses'])->name('loginproses');
Route::post('loginauth', [LoginController::class, 'loginauth'])->name('loginauth');

Route::get('register', [RegisterController::class, 'register'])->name('register');
Route::post('registeruser', [RegisterController::class, 'registeruser'])->name('registeruser');

Route::get('email/verify/{id}/{hash}', [VerificationController::class, 'show'])->name('Auth.verify');


Auth::routes(['verify' => true, 'register' => false]);

// Auth::routes(['verify' => true]);

//User controller
//dimatiin ini, ntar idupin lagi kalo udah kelar notif next verifikasi email
Route::group(['middleware' => ['auth','verified']], function () {
    
    Route::get('Home', [HomeuserController::class, 'index'])->name('Home');

    Route::get('pengajuanpohon', [TanamanUserController::class, 'pengajuanpohon'])->name('pengajuanpohon');
    Route::post('pengajuanpohoninsert', [TanamanUserController::class, 'pengajuanpohoninsert'])->name('pengajuanpohoninsert');
    Route::delete('pengajuanpohondelete/{id}', [TanamanUserController::class, 'pengajuanpohondelete'])->name('pengajuanpohondelete');
    Route::put('pengajuanpohonUpdate/{id}', [TanamanUserController::class, 'pengajuanpohonUpdate'])->name('pengajuanpohonUpdate');
    Route::get('/print/{id}', [TanamanUserController::class, 'printreport_Pohon'])->name('print.report');
    
    Route::get('pengajuansampah', [SampahUserController::class, 'pengajuansampah'])->name('pengajuansampah');
    Route::post('pengajuansampahinsert', [SampahUserController::class, 'pengajuansampahinsert'])->name('pengajuansampahinsert');
    Route::delete('pengajuansampahdelete/{id}', [SampahUserController::class, 'pengajuansampahdelete'])->name('pengajuansampahdelete');
    Route::put('pengajuansampahUpdate/{id}', [SampahUserController::class, 'pengajuansampahUpdate'])->name('pengajuansampahUpdate');
    Route::get('printsampah/{id}', [SampahUserController::class, 'printsampah'])->name('printsampah.report');

    Route::get('profile', [UserController::class, 'profile'])->name('profile');
    Route::put('Editprofile/{id}', [UserController::class, 'Editprofile'])->name('Editprofile');

});


//Admin controller
Route::group(['middleware' => ['admin.ketua']], function () {

    Route::get('Homeadmin', [HomeadminController::class, 'index'])->name('Homeadmin');
    Route::get('exportDataKegiatan', [HomeadminController::class, 'exportDataKegiatan'])->name('exportDataKegiatan');
    Route::get('generatePdf', [HomeadminController::class, 'generatePdf'])->name('generatePdf');

    //Data Pohon
    Route::get('DataPohon', [TanamanController::class, 'pohon'])->name('DataPohon');
    Route::get('DataPohonUpdate/{id}', [TanamanController::class, 'DataPohonUpdate'])->name('DataPohonUpdate');
    Route::put('DataPohonUpdateStatus/{id}', [TanamanController::class, 'DataPohonUpdateStatus'])->name('DataPohonUpdateStatus');
    Route::delete('DataPohonDelete/{id}', [TanamanController::class, 'DataPohonDelete'])->name('DataPohonDelete');
    Route::get('exportDatapohonuser', [TanamanController::class, 'exportDatapohonuser'])->name('exportDatapohonuser');
    Route::get('searchpohon', [TanamanController::class, 'searchpohon'])->name('searchpohon');
    Route::post('pengajuanpohonadmin', [TanamanController::class, 'pengajuanpohonadmin'])->name('pengajuanpohonadmin');
    Route::get('datapohon/{year?}', [TanamanController::class, 'datapohon'])->name('datapohon');
    Route::get('exportDataPohon-pdf', [TanamanController::class, 'exportDataPohonpdf'])->name('exportDataPohon-pdf');

    //Data Sampah
    Route::get('DataSampah', [SampahController::class, 'sampah'])->name('DataSampah');
    Route::put('DataSampahUpdate/{id}', [SampahController::class, 'DataSampahUpdate'])->name('DataSampahUpdate');
    Route::put('DataSampahUpdateStatus/{id}', [SampahController::class, 'DataSampahUpdateStatus'])->name('DataSampahUpdateStatus');
    Route::delete('DataSampahDelete/{id}', [SampahController::class, 'DataSampahDelete'])->name('DataSampahDelete');
    Route::get('Downloadsampahuserpdf', [SampahController::class, 'Downloadsampahuserpdf'])->name('Downloadsampahuserpdf');
    Route::get('exportDataSampahUser', [SampahController::class, 'exportDataSampahUser'])->name('exportDataSampahUser');
    Route::get('searchsampah', [SampahController::class, 'searchsampah'])->name('searchsampah');
    Route::post('pengajuansampahadmin', [SampahController::class, 'pengajuansampahadmin'])->name('pengajuansampahadmin');
    Route::get('exportDataSampah-pdf', [SampahController::class, 'exportDataSampahpdf'])->name('exportDataSampah-pdf');

    //Data Energi
    Route::get('DataEnergi', [EnergiController::class, 'DataEnergi'])->name('DataEnergi');
    Route::post('TambahDataEnergi', [EnergiController::class, 'TambahDataEnergi'])->name('TambahDataEnergi');
    Route::put('DataEnergiUpdate/{id}', [EnergiController::class, 'DataEnergiUpdate'])->name('DataEnergiUpdate');
    Route::delete('DataEnergiDelete/{id}', [EnergiController::class, 'DataEnergiDelete'])->name('DataEnergiDelete');
    Route::get('exportDataEnergi', [EnergiController::class, 'exportDataEnergi'])->name('exportDataEnergi');

    //Data User
    Route::get('DataUser', [AdminController::class, 'DataUser'])->name('DataUser');
    Route::post('TambahDataUser', [AdminController::class, 'TambahDataUser'])->name('TambahDataUser');
    Route::put('DataUserUpdate/{id}', [AdminController::class, 'DataUserUpdate'])->name('DataUserUpdate');
    Route::delete('DataUserDelete/{id}', [AdminController::class, 'DataUserDelete'])->name('DataUserDelete');
    Route::get('exportDataUser', [AdminController::class, 'exportDataUser'])->name('exportDataUser');
    Route::get('exportDataUser-pdf', [AdminController::class, 'exportDataUserpdf'])->name('exportDataUser-pdf');
});
