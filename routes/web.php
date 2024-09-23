<?php

use App\Livewire\Admin\Dashboard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GD\GDController;
use App\Livewire\Admin\Market\Brand\BrandIndex;
use App\Livewire\Admin\Market\Brand\BrandCreate;
use App\Livewire\Admin\Market\Brand\BrandUpdate;
use App\Http\Controllers\Auth\GoogleAuthController;
use App\Livewire\Admin\Market\Category\CategoryIndex;
use App\Livewire\Admin\Market\Category\CategoryCreate;
use App\Livewire\Admin\Market\Category\CategoryUpdate;
use App\Livewire\Admin\Market\Product\ProductCreate;
use App\Livewire\Admin\Market\Product\ProductIndex;
use App\Livewire\Admin\Market\Product\ProductUpdate;

Route::get('/', function () {
    return redirect('login');
});
// Route::get('/login',[])
//auth with google
Route::get('/auth/google/redirect', [GoogleAuthController::class, 'GoogleRedirect'])->name('auth.google.redirect');
Route::get('/auth/google/callback', [GoogleAuthController::class, 'GoolgeCallback'])->name('auth.google.callback');



Route::get('/make-photo', [GDController::class, 'generateImage'])->name('generate.image');

Route::prefix('admin')->group(function () {
    Route::get('/', Dashboard::class)->name('admin.home');

    Route::prefix('market')->group(function () {

        //category
        Route::prefix('/category')->group(function () {
            Route::get('/', CategoryIndex::class)->name('admin.market.category.index');
            Route::get('/create', CategoryCreate::class)->name('admin.market.category.create');
            Route::get('/edit', CategoryUpdate::class)->name('admin.market.category.edit');
        });

        //brand
        Route::prefix('/brand')->group(function () {
            Route::get('/', BrandIndex::class)->name('admin.market.brand.index');
            Route::get('/create', BrandCreate::class)->name('admin.market.brand.create');
            Route::get('/edit', BrandUpdate::class)->name('admin.market.brand.edit');
        });

        //product
        Route::prefix('/product')->group(function () {
            Route::get('/', ProductIndex::class)->name('admin.market.product.index');
            Route::get('/create', ProductCreate::class)->name('admin.market.product.create');
            Route::get('/edit', ProductUpdate::class)->name('admin.market.product.edit');
        });
    });
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');