<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreController;

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


Route::middleware('guest')->group(function(){
    Route::view('/','pages.index')->name('login');
    Route::get('/bip',[StoreController::class,'bipIndexView'])->name('bip.index');
    Route::get('/sls',[StoreController::class,'slsIndexView'])->name('sls.index');
});

    Route::get('/api/fetch/tpsStore',[StoreController::class,'fetchStoreData']);
    Route::get('/api/get/item/{barcode}',[StoreController::class,'getStoreInformation']);
    Route::get('/api/get/storecode/{storeID}',[StoreController::class,'getStoreCodes']);
    Route::get('/print/sls/tag',[StoreController::class,'printSlsTag'])->name('print.sls.tag');


    Route::post('/api/validate/master/{key}',[StoreController::class,'validateMasterKey']);









