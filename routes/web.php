<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\Frontend\VendorController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Frontend\FrontendController;


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


Route::get('/', [FrontendController::class, 'index']);
Route::post('/add/to/cart', [CartController::class, 'addToCart']);
Route::get('/checkout', [CartController::class,'checkout']);
Route::post('/cart/product/update/{id}', [CartController::class,'cartUpdate']);
Route::get('/cartProduct/delete/{id}', [CartController::class,'cartProductDelete']);

 
//User Controller route
Route::get('/user/register', [FrontendController::class, 'userRegister']);
Route::get('/user/login', [FrontendController::class, 'userLogin']);




Route::get('/vendor/register', [VendorController::class, 'vendorRegister']);
Route::post('/vendor/registration', [VendorController::class, 'vendorRegistration']);
Route::post('/vendor/login', [VendorController::class, 'vendorLogin']);
Route::get('/vendor/dashboard', [VendorController::class, 'vendorDashboard']);
Route::get('/vendor/product/create', [VendorController::class, 'vendorProductCreateForm']);
Route::post('/vendor/product/store', [VendorController::class, 'vendorProductStore']);
Route::get('/vendor/logout', [VendorController::class, 'vendorLogout']);


//AdminController route
Route::get('/admin/login',[AdminController::class,'adminLoginForm']);
Route::post('/admin/login',[AdminController::class,'adminLogin']);
Route::get('/admin/dashboard',[AdminController::class,'adminDashboard']);
Route::get('/admin/logout',[AdminController::class,'adminLogout']);


//category Controller
Route::get('/category/create',[CategoryController::class,'categoryCreate']);
Route::get('/category/manage',[CategoryController::class,'categoryManage']);
Route::post('/category/store',[CategoryController::class,'categoryStore']);
Route::get('/category/edit/{id}',[CategoryController::class,'categoryEdit']);
Route::post('/category/update/{id}',[CategoryController::class,'categoryUpdate']);
Route::get('/category/delete/{id}',[CategoryController::class,'categoryDelete']);

//SubCategory Controller
Route::get('/subcategory/create',[SubcategoryController::class,'subcategoryCreate']);
Route::get('/subcategory/manage',[SubcategoryController::class,'subcategoryManage']);
Route::post('/subcategory/store',[SubcategoryController::class,'subcategoryStore']);
Route::get('/subcategory/edit/{id}',[SubcategoryController::class,'subcategoryEdit']);
Route::post('/subcategory/update/{id}',[SubcategoryController::class,'subcategoryUpdate']);
Route::get('/subcategory/delete/{id}',[SubcategoryController::class,'subcategoryDelete']);

//Brand Controller
Route::get('/brand/create',[brandController::class,'brandCreate']);
Route::get('/brand/manage',[brandController::class,'brandManage']);
Route::post('/brand/store',[brandController::class,'brandStore']);
Route::get('/brand/edit/{id}',[brandController::class,'brandEdit']);
Route::post('/brand/update/{id}',[brandController::class,'brandUpdate']);
Route::get('/brand/delete/{id}',[brandController::class,'brandDelete']);

//Colors Controller
Route::get('/color/create',[ColorController::class,'colorCreate']);
Route::get('/color/manage',[ColorController::class,'colorManage']);
Route::post('/color/store',[ColorController::class,'colorStore']);
Route::get('/color/edit/{id}',[ColorController::class,'colorEdit']);
Route::post('/color/update/{id}',[ColorController::class,'colorUpdate']);
Route::get('/color/delete/{id}',[ColorController::class,'colorDelete']);

//Size Controller
Route::get('/size/create',[SizeController::class,'sizeCreate']);
Route::get('/size/manage',[SizeController::class,'sizeManage']);
Route::post('/size/store',[SizeController::class,'sizeStore']);
Route::get('/size/edit/{id}',[SizeController::class,'sizeEdit']);
Route::post('/size/update/{id}',[SizeController::class,'sizeUpdate']);
Route::get('/size/delete/{id}',[SizeController::class,'sizeDelete']);

//Supplier Controller//
Route::get('/vendors',[SupplierController::class,'vendors']);
Route::get('/admin/vendor/approved/{id}',[SupplierController::class,'vendorApproved']);
Route::get('/admin/vendor/pending/{id}',[SupplierController::class,'vendorPending']);
Route::get('/admin/vendor/delete/{id}',[SupplierController::class,'vendorDelete']);
                    //try to vendor delete//
Route::get('/vendor/products',[SupplierController::class,'vendorProducts']);
Route::get('/vendor/product/approved/{id}',[SupplierController::class,'vendorProductApproved']);
Route::get('/vendor/product/pending/{id}',[SupplierController::class,'vendorProductPending']);





Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
