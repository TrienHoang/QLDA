<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
Route::get('/', function () {
    return view('admin.dashboard');
});

//http://127.0.0.1:8000/admin/categories/create-categories
Route::group([
    'prefix' => 'admin',
    'as' => 'admin.'
], function(){
    Route::group([
        'prefix' => 'categories',
    'as' => 'categories.'
    ], function(){
        Route::get('/', [CategoryController::class, 'listCategory'])->name('listCategory');

        Route::get('add-category', [CategoryController::class, 'addCategory'])->name('addCategory'); 

        Route::post('add-category', [CategoryController::class, 'addPostCategory'])->name('addPostCategory');

        Route::delete('delete-category/{id}', [CategoryController::class, 'deleteCategory'])->name('deleteCategory');

        Route::get('detail-category/{id}', [CategoryController::class, 'detailCategory'])->name('detailCategory');

        Route::get('update-category/{id}', [CategoryController::class, 'updateCategory'])->name('updateCategory');

        Route::patch('update-category/{id}', [CategoryController::class, 'updatePatchCategory'])->name('updatePatchCategory');

    });
});


