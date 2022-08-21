<?php

use App\Http\Controllers\CheckInController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\TamuController;
use App\Http\Controllers\TipeKamarController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::any('/register', function() {
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->group( function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    // tamu
    Route::get('/tamu',[TamuController::class, 'index'])->name('tamu');
    Route::prefix('tamu')->name('tamu.')->group(function () {
        Route::get('/create',[TamuController::class, 'create'])->name('create');
        Route::post('/create',[TamuController::class, 'store'])->name('store');
        Route::get('/{tamu}/update',[TamuController::class, 'update'])->name('update');
        Route::put('/{tamu}/edit',[TamuController::class, 'edit'])->name('edit');
        // tamuinhouse edit/extend
        Route::get('/{id}/extend',[TamuController::class, 'extend'])->name('extend');
        Route::put('/{id}/extend',[TamuController::class, 'extendUpdate'])->name('extendUpdate');
    });

    // tipe kamar
    Route::get('/tipe-kamar',[TipeKamarController::class, 'index'])->name('tipe-kamar');
    Route::group(['prefix' => 'tipe-kamar', 'as'=>'tipe-kamar.', 'middleware' => ['role:admin|owner']], function(){
        Route::get('/create',[TipeKamarController::class, 'create'])->name('create');
        Route::post('/create',[TipeKamarController::class, 'store'])->name('store');
        Route::get('/{tipe_kamar}/update',[TipeKamarController::class, 'update'])->name('update');
        Route::put('/{tipe_kamar}/edit',[TipeKamarController::class, 'edit'])->name('edit');
        Route::get('/{tipe_kamar}/delete',[TipeKamarController::class, 'destroy'])->name('destroy');
    });
    
    // kamar
    Route::get('/kamar',[KamarController::class, 'index'])->name('kamar');
    Route::group(['prefix' => 'kamar', 'as'=>'kamar.', 'middleware' => ['role:admin|owner']], function(){
        Route::get('/create',[KamarController::class, 'create'])->name('create');
        Route::post('/create',[KamarController::class, 'store'])->name('store');
        Route::get('/{kamar}/edit',[KamarController::class, 'edit'])->name('edit');   
        Route::put('/{kamar}/update',[KamarController::class, 'update'])->name('update');
        Route::get('/{kamar}/delete',[KamarController::class, 'destroy'])->name('delete');
    });

    // check In
    Route::get('/check-in',[CheckInController::class, 'index'])->name('check-in');
    Route::get('/check-in/create/{id}',[CheckInController::class, 'create'])->name('check-in.create');
    Route::get('/check-in/create/GetSubCatAgainstMainCatEdit/{id}', [CheckInController::class,'GetSubCatAgainstMainCatEdit'])->name('create');
    Route::post('/check-in/create',[CheckInController::class, 'store'])->name('check-in.store');

    //tamu in-house
    Route::get('/tamu-in-house',[TamuController::class, 'inHouse'])->name('tamu-in-house');

    //check out
    Route::get('/check-out',[CheckInController::class, 'checkOut'])->name('check-out');
    Route::get('/check-out/{id}',[CheckInController::class, 'checkOutDetail'])->name('check-out.detail');
    Route::post('/check-out/{id}',[CheckInController::class, 'checkOutStore'])->name('check-out.store');
    Route::get('/receipt',[CheckInController::class, 'receipt'])->name('receipt');

    // laporan
    // Route::group(['middleware' => ['role:admin|owner']], function () {
        Route::get('/laporan',[DashboardController::class, 'laporan'])->name('laporan');
        Route::post('/laporan',[DashboardController::class, 'laporanStore'])->name('laporan.store');
        Route::get('/laporan-export', [DashboardController::class, 'laporanExport'])->name('laporan.export');
    // });
    // Route::group(['middleware' => ['role:admin|owner']], function () {
    //     Route::get('/laporan',[DashboardController::class, 'laporan'])->name('laporan');
    //     Route::post('/laporan',[DashboardController::class, 'laporanStore'])->name('laporan.store');
    //     Route::get('/laporan-export', [DashboardController::class, 'laporanExport'])->name('laporan.export');
    // });

    // user
    Route::get('/user',[UserController::class, 'index'])->middleware('role:admin')->name('userC');
    Route::group(['prefix' => 'user', 'as'=>'userC.', 'middleware' => ['role:admin']], function(){
        Route::get('/create',[UserController::class, 'create'])->name('create');
        Route::post('/create',[UserController::class, 'store'])->name('store');
        Route::get('/{user}/edit',[UserController::class, 'edit'])->name('edit');
        Route::put('/{user}/update',[UserController::class, 'update'])->name('update');
        Route::get('/{user}/delete',[UserController::class, 'destroy'])->name('delete');
    });
});
