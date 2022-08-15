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
    Route::view('/sls','pages.sls.sls_index')->name('sls.index');
});
    Route::get('/api/get/item/{barcode}',[StoreController::class,'getStoreInformation']);
    Route::get('/api/store/migration',[StoreController::class,'storeMigration']);

// Route::get('/register',[UserController::class,'createUser'])->name('add-user');


// Route::middleware('auth')->group(function(){

// });









