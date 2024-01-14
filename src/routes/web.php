<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Index\IndexMainPageController;
use App\Http\Controllers\Shop\SaveProductToBasket;
use App\Http\Controllers\Shop\ShoppingCard\ShoppingCartPageController;
use App\Http\Controllers\Shop\ShopShowController;
use App\Http\Controllers\Shop\ShopSinglePageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestAny;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;

//For Test
Route::get('/test-any', [TestAny::class, 'index'])->name('test');

//MainPage
Route::get('/', [IndexMainPageController::class, 'index'])->name('main.page');
//shop Page

Route::get('/shop', [ShopShowController::class, 'index'])->name('show.shop.page'); // main page and filter processing
Route::get('/men', [ShopShowController::class, 'men'])->name('show.shop.page.men'); // men page and filter processing
Route::get('/women', [ShopShowController::class, 'women'])->name('show.shop.page.women'); // women page and filter processing
Route::get('/children', [ShopShowController::class, 'children'])->name('show.shop.page.children'); // children page and filter processing
Route::get('/shop/{slug}', [ShopSinglePageController::class, 'index'])->name('show.single.page');

//admin login
Route::group(['prefix' => 'admin'], function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.show.login');
    Route::post('login', [AdminController::class, 'login'])->name('admin.login');

});

//CRUD product
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('shop-product-edit/{slug}', [AdminProductController::class, 'edit'])->name('admin.edit.product');
    Route::get('shop-product-create-page', [AdminProductController::class, 'show'])->name('admin.product.create.page');
    Route::post('shop-product-create', [AdminProductController::class, 'create'])->name('admin.product.create');

    Route::put('shop-product-update/{id}', [AdminProductController::class, 'update'])->name('admin.update.product');

});

//logout
Route::get('/logout', [AdminController::class, 'logout'])->name('logout');

//Save product cookie to basket
Route::post('/save-product-to-basket', [SaveProductToBasket::class, 'saveProductToBasket'])->name('save.product.to.basket');

Route::get('/test', function () {
    return view('test');
});

//Shopping cart page
Route::get('/shopping-cart-page', [ShoppingCartPageController::class, 'index'])->name('shopping.cart.index');
Route::get('/shopping-cart-item-delete/{name}', [ShoppingCartPageController::class, 'itemDelete'])->name('shopping.cart.item.delete');

// Auth
Route::post('/register', [RegisterController::class, 'register'])->name('auth.register');
Route::post('/login', [LoginController::class, 'login'])->name('auth.login');
Route::get('/logout', [LogoutController::class, 'perform'])->name('auth.logout')->middleware('auth');
