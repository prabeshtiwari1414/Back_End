<?php

use Illuminate\Support\Facades\Route;

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

 

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\UserProfile;
use App\Http\Controllers\AddProductController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\SiteController;


Route::get('/esewa', [SiteController::class, 'getSewa'])->name('getSewa');
Route::get('/esewa/success', function(){
	dd('payment success');
});

Route::get('/esewa/fail', function(){
	dd('payment fail');
});







Route::get('/', [SiteController::class, 'getHome'])->name('getHome');
Route::get('/product/views', [SiteController::class, 'getProduct'])->name('getProduct');
Route::get('/product/cart/{product}', [SiteController::class, 'getAddCart'])->name('getAddCart');
Route::get('/product/cart/delete/{cart}', [SiteController::class, 'deletecarts'])->name('deletecarts');
Route::get('/product/cart/edit/{cart}', [SiteController::class, 'getEditCarts'])->name('editcartss');
Route::put('/product/cart/update/{cart}', [SiteController::class, 'postEditCart'])->name('updatecart');
Route::get('/product/carts', [SiteController::class, 'getCart'])->name('getCart');
Route::get('/product/carts/billingaddress/{cart}', [SiteController::class, 'getBillingAddress'])->name('getBillingAddress');
Route::post('/product/carts/addbillingaddress/{cart}', [SiteController::class, 'postBillingAddress'])->name('postBillingAddress');



Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');
Route::get('sign-up', [RegisterController::class, 'create'])->middleware('guest')->name('register');
Route::post('sign-up', [RegisterController::class, 'store'])->middleware('guest');
Route::get('sign-in', [SessionsController::class, 'create'])->middleware('guest')->name('login');
Route::post('sign-in', [SessionsController::class, 'store'])->middleware('guest');
Route::post('verify', [SessionsController::class, 'show'])->middleware('guest');
Route::post('reset-password', [SessionsController::class, 'update'])->middleware('guest')->name('password.update');
Route::get('verify', function () {
	return view('sessions.password.verify');
})->middleware('guest')->name('verify'); 
Route::get('/reset-password/{token}', function ($token) {
	return view('sessions.password.reset', ['token' => $token]);
})->middleware('guest')->name('password.reset');

Route::post('sign-out', [SessionsController::class, 'destroy'])->middleware('auth')->name('logout');
Route::get('profile', [ProfileController::class, 'create'])->middleware('auth')->name('profile');
Route::post('user-profile', [ProfileController::class, 'update'])->middleware('auth');
Route::group(['middleware' => 'auth'], function () {
	Route::get('billing', function () {
		return view('pages.billing');
	})->name('billing');
	Route::get('tables', function () {
		return view('pages.tables');
	})->name('tables');
	Route::get('rtl', function () {
		return view('pages.rtl');
	})->name('rtl');
	Route::get('virtual-reality', function () {
		return view('pages.virtual-reality');
	})->name('virtual-reality');
	Route::get('notifications', function () {
		return view('pages.notifications');
	})->name('notifications');
	Route::get('static-sign-in', function () {
		return view('pages.static-sign-in');
	})->name('static-sign-in');
	Route::get('static-sign-up', function () {
		return view('pages.static-sign-up');
	})->name('static-sign-up');
	Route::get('user-management', function () {
		return view('pages.laravel-examples.user-management');
	})->name('user-management');
	Route::get('user-profile', function () {
		return view('pages.laravel-examples.user-profile');
	})->name('user-profile');
});
Route::get('/category', [CategoryController::class, 'getAddCategory'])->middleware('auth')->name('getAddCategory');
Route::post('/category/add', [CategoryController::class, 'postAddCategory'])->middleware('auth')->name('postAddCategory');
Route::get('/category/manage', [CategoryController::class, 'getManageCategroy'])->middleware('auth')->name('getManageCategroy');
Route::get('/category/manage/delete/{category}', [CategoryController::class, 'getDeleteCategory'])->middleware('auth')->name('getDeleteCategory');
Route::get('/category/manage/edit/{category}', [CategoryController::class, 'getEditCategory'])->middleware('auth')->name('getEditCategory');
Route::post('/category/manage/edited/{category}', [CategoryController::class, 'postEditCategory'])->middleware('auth')->name('postEditCategory');




Route::get('/gallery', [GalleryController::class, 'getAddGallery'])->middleware('auth')->name('getAddGallery');
Route::post('/gallery/add', [GalleryController::class, 'postAddGallery'])->middleware('auth')->name('postAddGallery');
Route::get('/gallery/manage', [GalleryController::class, 'getManageGallery'])->middleware('auth')->name('getManageGallery');
Route::get('/gallery/manage/delete/{gallery}', [GalleryController::class, 'getDeleteGallery'])->middleware('auth')->name('getDeleteGallery');
Route::get('/gallery/manage/edit/{gallery}', [GalleryController::class, 'getEditGallery'])->middleware('auth')->name('getEditGallery');
Route::post('/gallery/manage/edited/{gallery}', [GalleryController::class, 'postEditGallery'])->middleware('auth')->name('postEditGallery');





Route::get('/product', [AddProductController::class, 'getAddProduct'])->middleware('auth')->name('getAddProduct');
Route::post('/product/add', [AddProductController::class, 'postAddProduct'])->middleware('auth')->name('postAddProduct');
Route::get('/product/manage', [AddProductController::class, 'getManageProduct'])->middleware('auth')->name('getManageProduct');
Route::get('/product/manage/delete/{product}', [AddProductController::class, 'getDeleteProduct'])->middleware('auth')->name('getDeleteProduct');
Route::get('/product/manage/edit/{product}', [AddProductController::class, 'getEditProduct'])->middleware('auth')->name('getEditProduct');
Route::post('/product/manage/edited/{product}', [AddProductController::class, 'postEditProduct'])->middleware('auth')->name('postEditProduct');
Route::get('/product/manage/shippingcharge', [AddProductController::class, 'getShippingProduct'])->middleware('auth')->name('getShippingProduct');
Route::post('/product/shippingcharge', [AddProductController::class, 'postShippingCharge'])->middleware('auth')->name('postShippingCharge');
Route::get('/product/shippingcharge/manage', [AddProductController::class, 'getManageShipping'])->middleware('auth')->name('getManageShipping');
Route::get('/product/shippingcharge/manage/{shipping}', [AddProductController::class, 'getDeleteCharge'])->middleware('auth')->name('getDeleteCharge');









Route::get('/media', [MediaController::class, 'getAddMedia'])->middleware('auth')->name('getAddMedia');
Route::post('/media/add', [MediaController::class, 'postAddMedia'])->middleware('auth')->name('postAddMedia');
Route::get('/media/manage', [MediaController::class, 'getManageMedia'])->middleware('auth')->name('getManageMedia');
Route::get('/media/manage/delete/{media}', [MediaController::class, 'getDeleteMedia'])->middleware('auth')->name('getDeleteMedia');
Route::get('/media/manage/edit/{media}', [MediaController::class, 'getEditMedia'])->middleware('auth')->name('getEditMedia');
Route::post('/media/manage/edited/{media}', [MediaController::class, 'postEditMedia'])->middleware('auth')->name('postEditMedia');