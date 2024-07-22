<?php

use App\Http\Controllers\AboutController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrdersController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Routing\RouteGroup;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LikeController;

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

//page
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/products', [ProductController::class, 'get_products_category'])->name('products');
Route::get('/product/{product_id}', [ProductController::class, 'detail'])->name('productdetail');
Route::get('/category/{category_id}', [ProductController::class, 'get_products_category'])->name('category');
Route::get('/brand/{brand_id}', [ProductController::class, 'get_products_brand'])->name('brand');
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post("/login", [UserController::class,"postlogin"]);
Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post("/register", [UserController::class,"postregister"]);
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/cart', [CartController::class, 'cart'])->name('cart');
Route::post('/addtocart', [CartController::class, 'addtocart'])->name('addtocart');
Route::post("/cart", [CartController::class,"checkout"]);
Route::get('/deletecart/{id}', [CartController::class, 'deletecart'])->name('deletecart');
Route::get('/order', [OrdersController::class, 'orders'])->name('orders');
Route::post('/ordercancle', [OrdersController::class, 'ordercancle'])->name('ordercancle');
Route::get('/checkoutdone', [CartController::class, 'checkoutdone'])->name('checkoutdone');
Route::post('/search', [ProductController::class, 'search'])->name('search');
Route::get('/search', [ProductController::class, 'search'])->name('search');
Route::get('/profile', [UserController::class, 'profile'])->name('profile');
Route::post('/profileupdate', [UserController::class, 'profileupdate'])->name('profileupdate');
Route::get('/changepassword', [UserController::class, 'changepasswordform'])->name('changepasswordform');
Route::post('/changepassword', [UserController::class, 'changepassword']);
Route::post('/like', [LikeController::class, 'like'])->name('like');
Route::get('/likeview', [UserController::class, 'likeview'])->name('likeview');
Route::get('/about', [AboutController::class, 'about'])->name('about');
Route::get('/contact', [ContactController::class, 'contact'])->name('contact');


//admin
Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin_dashboard');
Route::get('/admin/products', [AdminController::class, 'products'])->name('admin_products');
Route::post('/admin/productadd', [AdminController::class, 'productadd'])->name('productadd');
Route::get('/admin/productdelete/{product_id}', [AdminController::class, 'productdelete'])->name('productdelete');
Route::get('/admin/productupdateform/{product_id}', [AdminController::class, 'productupdateform'])->name('productupdateform');
Route::post('/admin/productupdate', [AdminController::class, 'productupdate'])->name('productupdate');
Route::get('/admin/order', [AdminController::class, 'order'])->name('admin_order');
Route::get('/admin/orderdetail/{order_id}', [AdminController::class, 'orderdetail'])->name('orderdetail');
Route::post('/admin/orderaccept', [AdminController::class, 'orderaccept'])->name('orderaccept');
Route::post('/admin/ordersuccess', [AdminController::class, 'ordersuccess'])->name('ordersuccess');
Route::get('/admin/category', [AdminController::class, 'category'])->name('admin_category');
Route::get('/admin/users', [AdminController::class, 'user'])->name('admin_user');
Route::post('/admin/useradd', [AdminController::class, 'useradd'])->name('useradd');
Route::get('/admin/userupdateform/{user_id}', [AdminController::class, 'userupdateform'])->name('userupdateform');
Route::post('/admin/userupdate', [AdminController::class, 'userupdate'])->name('userupdate');



