<?php

use App\Http\Controllers\AddressController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\CompanyController;

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->middleware("auth");


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware("auth");

Route::get('/ibbnearby/{id}', function () {
    return view('ibbnearby');
})->name('ibbnearby');

Route::group(['prefix' => 'companies'], function () {
    Route::get('/', [CompanyController::class, 'index'])->name('comindex');
    Route::get('/new', [CompanyController::class, 'create'])->name("comnew");
    Route::post('/', [CompanyController::class, 'store'])->name("comadd");
    Route::get('/{id}', [CompanyController::class, 'show'])->name("comshow");
    Route::get('/{id}/edit', [CompanyController::class, 'edit'])->name("comedit");
    Route::put('/{id}', [CompanyController::class, 'update'])->name("comupdate");
    Route::delete('/{id}', [CompanyController::class, 'destroy'])->name("comdelete");
});

Route::group(['prefix' => 'people'], function () {
    Route::get('/', [PersonController::class, 'index'])->name('pindex');
    Route::get('/new', [PersonController::class, 'create'])->name("pnew");
    Route::post('/', [PersonController::class, 'store'])->name("padd");
    Route::get('/{id}', [PersonController::class, 'show'])->name("pshow");
    Route::get('/{id}/edit', [PersonController::class, 'edit'])->name("pedit");
    Route::put('/{id}', [PersonController::class, 'update'])->name("pupdate");
    Route::delete('/{id}', [PersonController::class, 'destroy'])->name("pdelete");
});

Route::group(['prefix' => 'addresses'], function () {
    Route::get('/', [AddressController::class, 'index'])->name('adrindex');
    Route::get('/new', [AddressController::class, 'create'])->name("adrnew");
    Route::post('/', [AddressController::class, 'store'])->name("adradd");
    Route::get('/{id}', [AddressController::class, 'show'])->name("adrshow");
    Route::get('/{id}/edit', [AddressController::class, 'edit'])->name("adredit");
    Route::put('/{id}', [AddressController::class, 'update'])->name("adrupdate");
    Route::delete('/{id}', [AddressController::class, 'destroy'])->name("adrdelete");
});
