<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
Route::get('/', [HomeController::class, 'index']);
Route::group(['prefix' => 'admin'], function () {
    Route::group(['middleware' => 'admin.guest'], function () {
        Route::get('/login', [AdminController::class, 'index'])->name('admin.login');
        Route::get('register', [AdminController::class, 'register'])->name('admin.register');
        Route::post('/login', [AdminController::class, 'authenticate'])->name('admin.authenticate');
    });
    Route::group(['middleware' => 'admin.auth'], function () {
        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('logout', [AdminController::class, 'logout'])->name('admin.logout');
        Route::get('category/create', [CategoryController::class, 'index'])->name('category.create');
        Route::post('category/store', [CategoryController::class, 'store'])->name('category.store');
        Route::get('category/list', [CategoryController::class, 'list'])->name('category.list');
        Route::get('category/delete', [CategoryController::class, 'delete'])->name('category.delete');

        Route::get('blog/create', [BlogController::class, 'index'])->name('blog.create');
        Route::post('blog/store', [BlogController::class, 'store'])->name('blog.store');
        Route::get('blog/read', [BlogController::class, 'read'])->name('blog.read');
        Route::get('blog/delete/{id}', [BlogController::class, 'delete'])->name('blog.delete');
        Route::get('blog/edit/{id}', [BlogController::class, 'edit'])->name(name: 'blog.edit');
        Route::post('blog/update/{id}', [BlogController::class, 'update'])->name('blog.update');


        Route::get('client/create', [ClientController::class, 'index'])->name('client.create');
        Route::post('client/store', [ClientController::class, 'store'])->name('client.store');
        Route::get('client/read', [ClientController::class, 'read'])->name('client.read');
        Route::get('client/delete/{id}', [ClientController::class, 'delete'])->name('client.delete');
        Route::get('client/edit/{id}', [ClientController::class, 'edit'])->name(name: 'client.edit');
        Route::post('client/update/{id}', [ClientController::class, 'update'])->name('client.update');
    });

    Route::get('/getSlug', action: function (Request $req) {
        $slug = '';
        if (!empty($req->title)) {
            $slug = Str::slug($req->title);
        }
        return response()->json([
            'status' => true,
            'slug' => $slug
        ]);
    })->name('getSlug');
});