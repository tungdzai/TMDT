<?php

use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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


Auth::routes();
// login
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'index'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login.store');

//logout
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
// register
Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'index'])->name('register');
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register.store');
// User
Route::get('/', [App\Http\Controllers\Web\HomeController::class, 'index'])->name('home');
Route::get('/shop', [App\Http\Controllers\Web\ShopController::class, 'index'])->name('shop');
Route::get('/shop-detail', [App\Http\Controllers\Web\ShopController::class, 'detail'])->name('detail');
Route::get('/cart', [App\Http\Controllers\Web\CartController::class, 'index'])->name('cart');
Route::get('/checkout', [App\Http\Controllers\Web\CheckOutController::class, 'index'])->name('checkout');
Route::get('/contact', [App\Http\Controllers\Web\ContactController::class, 'index'])->name('contact');
Route::get('/search', [App\Http\Controllers\Web\ShopController::class, 'search'])->name('contact');
Route::get('/product/sort-time', [App\Http\Controllers\Web\ShopController::class, 'sortByTime'])->name('product.sort.time');
Route::get('/product/sort-small', [App\Http\Controllers\Web\ShopController::class, 'sortBySmall'])->name('product.sort.price.small');
Route::get('/product/sort-big', [App\Http\Controllers\Web\ShopController::class, 'sortByBig'])->name('product.sort.price.big');
// show product by Category
Route::get('/category/show/{id}', [App\Http\Controllers\Web\CategoryController::class, 'showProduct'])->name('category.show');
// show product
Route::get('/product/detail/{id}', [App\Http\Controllers\Web\ProductController::class, 'detail'])->name('product.detail');
Route::get('/product/search', [App\Http\Controllers\Web\ProductController::class, 'search'])->name('product.search');

// contact
Route::get('/contact', [App\Http\Controllers\Web\ContactController::class, 'index'])->name('page.contact');
Route::post('/contact', [App\Http\Controllers\Web\ContactController::class, 'store'])->name('page.contact.question');
Route::middleware(['auth'])->group(function () {
    Route::post('/comment/product', [App\Http\Controllers\Web\CommentController::class, 'post'])->name('comment.product');
    Route::group(
        [
            'prefix' => 'cart',
            'as' => 'cart.',
        ],
        function(){
            Route::get('/', [App\Http\Controllers\Web\CartController::class , 'index'])->name('view');
            Route::get('/add/{id}', [App\Http\Controllers\Web\CartController::class , 'add'])->name('add');
            Route::get("/delete", [App\Http\Controllers\Web\CartController::class , 'delete'])->name('delete');
            Route::get("/update/{id}", [App\Http\Controllers\Web\CartController::class , 'update'])->name('update');
        }
    );
    Route::get('/checkout', [App\Http\Controllers\Web\CheckOutController::class , 'index'])->name('checkout');
    Route::post('/order', [App\Http\Controllers\Web\OrderController::class , 'index'])->name('order');

    // User
    Route::get('/user/detail', [App\Http\Controllers\Web\UserController::class , 'index'])->name('user.detail');
    Route::post('/user/update', [App\Http\Controllers\Web\UserController::class , 'update'])->name('user.update-info');
    Route::post('/user/update-password', [App\Http\Controllers\Web\UserController::class , 'updatePass'])->name('user.update-password');
    Route::get('/order/success', [App\Http\Controllers\Web\OrderController::class , 'back'])->name('order.back');
    Route::get('/order/vnpay', [App\Http\Controllers\Web\OrderController::class , 'backVNPAY'])->name('order.vnpay');
});

Route::group(
    [
        'prefix' => 'admin',
        'as' => 'admin.',
        'middleware' => 'role:admin',
    ],
    function () {
        Route::get('/dasboard', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('home');
        Route::get('/analysis', [App\Http\Controllers\Admin\HomeController::class, 'analysis'])->name('analysis');

        Route::group(
            [
                'prefix' => 'category',
                'as' => 'category.',
            ],
            function(){
                Route::get('/list', [App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('list');
                Route::get('/create', [App\Http\Controllers\Admin\CategoryController::class, 'create'])->name('create');
                Route::post('/store', [App\Http\Controllers\Admin\CategoryController::class, 'store'])->name('store');
                Route::post('/delete/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'delete'])->name('delete');
                Route::get('/edit/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'edit'])->name('edit');
                Route::post('/update/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('update');
            }
        );
        Route::group(
            [
                'prefix' => 'product',
                'as' => 'product.',
            ],
            function(){
                Route::get('/list', [App\Http\Controllers\Admin\ProductController::class, 'index'])->name('list');
                Route::get('/create', [App\Http\Controllers\Admin\ProductController::class, 'create'])->name('create');
                Route::post('/store', [App\Http\Controllers\Admin\ProductController::class, 'store'])->name('store');
                Route::post('/delete/{id}', [App\Http\Controllers\Admin\ProductController::class, 'delete'])->name('delete');
                Route::get('/edit/{id}', [App\Http\Controllers\Admin\ProductController::class, 'edit'])->name('edit');
                Route::post('/update/{id}', [App\Http\Controllers\Admin\ProductController::class, 'update'])->name('update');
            }
        );
        Route::group(
            [
                'prefix' => 'user',
                'as' => 'user.',
            ],
            function(){
                Route::get('/list', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('list');
                Route::get('/create', [App\Http\Controllers\Admin\UserController::class, 'create'])->name('create');
                Route::post('/store', [App\Http\Controllers\Admin\UserController::class, 'store'])->name('store');
                Route::get('show', [App\Http\Controllers\Admin\UserController::class, 'show'])->name('show');
                Route::post('/update', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('update');
                Route::post('/update-password', [App\Http\Controllers\Admin\UserController::class, 'updatePassword'])->name('updatepassword');
                // Route::post('/update/{id}', [App\Http\Controllers\Admin\ProductController::class, 'update'])->name('update');
            }
        );
        Route::group(
            [
                'prefix' => 'order',
                'as' => 'order.',
            ],
            function(){
                Route::get('/list', [App\Http\Controllers\Admin\OrderController::class, 'index'])->name('list');
                Route::get('/confirm', [App\Http\Controllers\Admin\OrderController::class, 'confirm'])->name('confirm');
                Route::get('/accept/{id}', [App\Http\Controllers\Admin\OrderController::class, 'accept'])->name('accept');
                // Route::post('/update/{id}', [App\Http\Controllers\Admin\ProductController::class, 'update'])->name('update');
            }
        );
    }

)->middleware('auth');
