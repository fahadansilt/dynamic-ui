<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:admin'])
    ->prefix('admin')
    ->as('admin.')
    ->controller(AdminController::class)
    ->group(function () {
        Route::get('/', 'dashboard')->name('dashboard');
        Route::get('/add-block', 'addBlock')->name('add-block');
        Route::post('/store-block', 'storeBlock')->name('store-block');
        Route::get('/edit-block/{uiBlock}', 'editBlock')->name('edit-block');
        Route::put('/update-block/{uiBlock}', 'updateBlock')->name('update-block');
        Route::put('/toggle-status/{uiBlock}', 'toggleStatus')->name('toggle-status');
        Route::delete('/delete-block/{uiBlock}', 'deleteBlock')->name('delete-block');
        Route::put('/reorder-block/{uiBlock}', 'reorderBlock')->name('reorder-block');
});
