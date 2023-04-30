<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Frontend\FrontendUserController;
use App\Http\Controllers\Frontend\OrderController as FrontendOrderController;
use App\Http\Controllers\ServiceController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::controller(FrontendController::class)->group(function(){
    Route::get('/', 'index')->name('home');;
    Route::get('/collections', 'categories');
    Route::get('/collections/{category_slug}', 'products');
    Route::get('/collections/{category_slug}/{product_slug}', 'productView');
    Route::get('/search', 'searchProducts');
    Route::get('/new-arrivals', 'newArrivals');
    Route::get('/services/{service}', 'showService');
    Route::post('/services/{service}', 'createServiceOrder');
    Route::get('/services/{service}/request', 'requestService');
    Route::get('/services', 'showServices');
});

Route::middleware(['auth'])->group(function() {
    Route::get('/wishlist', [WishlistController::class, 'index']);
    Route::get('/cart', [CartController::class, 'index']);
    Route::get('/checkout', [CheckoutController::class, 'index']);
    Route::get('/orders', [FrontendOrderController::class, 'index']);
    Route::get('/orders/{order}', [FrontendOrderController::class, 'show']);
    Route::get('/profile', [FrontendUserController::class, 'index']);
    Route::post('/profile', [FrontendUserController::class, 'updateUserDetails']);
    Route::get('/change-password', [UserController::class, 'passwordCreate']);
    Route::post('/change-password', [UserController::class, 'changePassword']);

});

Route::get('/thank-you', [FrontendController::class, 'thankYou']);

Route::prefix('admin')->middleware('auth', 'isAdmin')->group(function() {
    Route::get('dashboard', [DashboardController::class, 'index']);
    
    Route::get('/settings', [SettingController::class, 'index']);
    Route::post('/settings', [SettingController::class, 'store']);

    //Category Routes
    Route::controller(CategoryController::class)->group(function() {
        Route::get('/category', 'index');
        Route::get('/category/create', 'create');
        Route::post('/category', 'store');
        Route::get('/category/{category}/edit', 'edit');
        Route::put('/category/{category}', 'update');
    });

    Route::controller(ProductController::class)->group(function() {
        Route::get('/products', 'index');
        Route::get('/products/create', 'create');
        Route::get('/products/{product}/edit', 'edit');
        Route::post('/products', 'store');
        Route::put('/products/{product}', 'update');
        Route::get('/product-image/{product_image_id}/delete', 'destroyImage');
        Route::get('/products/{product}/delete', 'destroy');
    });

    Route::controller(BrandController::class)->group(function() {
        Route::get('/brands', 'index');
        Route::get('/brands/create', 'create');
        Route::get('/brands/{brand}/edit', 'edit');
        Route::post('/brands', 'store');
        Route::put('/brands/{brand}', 'update');
        Route::get('/brands/{brand}/delete', 'destroy');
    });

    Route::controller(SliderController::class)->group(function(){
        Route::get('/sliders', 'index');
        Route::get('/sliders/create', 'create');
        Route::get('/sliders/{slider}/edit', 'edit');
        Route::post('/sliders', 'store');
        Route::put('/sliders/{slider}', 'update');
        Route::get('/sliders/{slider}/delete', 'destroy');
    });

    Route::controller(OrderController::class)->group(function(){
        Route::get('/orders', 'index');
        Route::get('/orders/{order}', 'show');
        Route::put('/orders/{order}', 'updateOrderStatus');
        Route::get('/invoice/{order}', 'viewInvoice');
        Route::get('/invoice/{order}/generate', 'generateInvoice');
        Route::get('/invoice/{order}/mail', 'mailInvoice');
    });

    Route::controller(UserController::class)->group(function(){
        Route::get('/users', 'index');
        Route::get('/users/create', 'create');
        Route::post('/users', 'store');
        Route::get('/users/{user}/delete', 'delete');
        Route::get('/users/{user}/edit', 'edit');
        Route::put('/users/{user}', 'update');
    });

    Route::controller(ServiceController::class)->group(function(){
        Route::get('/services', 'index');
        Route::get('/services/create', 'create');
        Route::get('/services/{service}/edit', 'edit');
        Route::post('/services', 'store');
        Route::put('/services/{service}', 'update');
        Route::get('/services/{service}/delete', 'destroy');
    });
});