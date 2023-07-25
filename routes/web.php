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
Route::get('/category', [CategoryController::class, 'getAddCategory'])->name('getAddCategory');
Route::post('/category/add', [CategoryController::class, 'postAddCategory'])->name('postAddCategory');
Route::get('/category/manage', [CategoryController::class, 'getManageCategroy'])->name('getManageCategroy');
Route::get('/category/manage/delete/{category}', [CategoryController::class, 'getDeleteCategory'])->name('getDeleteCategory');


Route::get('/gallery', [GalleryController::class, 'getAddGallery'])->name('getAddGallery');
Route::post('/gallery/add', [GalleryController::class, 'postAddGallery'])->name('postAddGallery');
Route::get('/gallery/manage', [GalleryController::class, 'getManageGallery'])->name('getManageGallery');
Route::get('/gallery/manage/delete/{gallery}', [GalleryController::class, 'getDeleteGallery'])->name('getDeleteGallery');




Route::get('/product', [AddProductController::class, 'getAddProduct'])->name('getAddProduct');
Route::post('/product/add', [AddProductController::class, 'postAddProduct'])->name('postAddProduct');
Route::get('/product/manage', [AddProductController::class, 'getManageProduct'])->name('getManageProduct');
Route::get('/product/manage/delete/{product}', [AddProductController::class, 'getDeleteProduct'])->name('getDeleteProduct');




Route::get('/media', [MediaController::class, 'getAddMedia'])->name('getAddMedia');
Route::post('/media/add', [MediaController::class, 'postAddMedia'])->name('postAddMedia');
Route::get('/media/manage', [MediaController::class, 'getManageMedia'])->name('getManageMedia');
Route::get('/mmedia/manage/delete{media}', [MediaController::class, 'getDeleteMedia'])->name('getDeleteMedia');