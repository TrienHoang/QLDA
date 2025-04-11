<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Auth\AuthController;

use App\Http\Controllers\User\HomeController;

// Route::get('/', function () {
//     return view('client.home');
// })->name('client.home');


Route::get('/auth', [AuthController::class, 'index'])->name('auth');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/register', [AuthController::class, 'register'])->name('register');

//http://127.0.0.1:8000/admin/categories/create-categories
Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'middleware' => 'checkAdmin'
], function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::group([
        'prefix' => 'categories',
        'as' => 'categories.'
    ], function () {
        Route::get('/', [CategoryController::class, 'listCategory'])->name('listCategory');

        Route::get('add-category', [CategoryController::class, 'addCategory'])->name('addCategory');

        Route::post('add-category', [CategoryController::class, 'addPostCategory'])->name('addPostCategory');

        Route::delete('delete-category/{id}', [CategoryController::class, 'deleteCategory'])->name('deleteCategory');

        Route::get('detail-category/{id}', [CategoryController::class, 'detailCategory'])->name('detailCategory');

        Route::get('update-category/{id}', [CategoryController::class, 'updateCategory'])->name('updateCategory');

        Route::patch('update-category/{id}', [CategoryController::class, 'updatePatchCategory'])->name('updatePatchCategory');
    });
    Route::resource('products', ProductController::class);

    Route::prefix('orders')->name('orders.')->group(function () {
        Route::get('/', [OrderController::class, 'index'])->name('index'); // Danh sách đơn hàng

        Route::get('/{order}', [OrderController::class, 'show'])->name('show'); // Xem chi tiết đơn hàng

        // Route::get('/{id}/edit', [OrderController::class, 'edit'])->name('edit'); // Form sửa
        Route::patch('/{order}', [OrderController::class, 'update'])->name('update'); // Xử lý update

        Route::delete('/{order}', [OrderController::class, 'destroy'])->name('destroy'); // Xoá đơn hàng
    });
});


// User

Route::get('/', function () {
    return redirect()->route('client.home');
});

Route::group([
    'prefix' => 'client',
    'as' => 'client.',
], function () {
    Route::get('home', [HomeController::class, 'home'])->name('home');
    Route::get('/product/{id}', [ProductController::class, 'showProduct'])->name('showProduct');
});
