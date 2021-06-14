<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BannerController;
use App\Models\User;
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

// Route::get('/', function () {
//     return view('welcome');
// });

//You can use both way for laravel 8
//Route::match(['get', 'post'], '/', 'App\Http\Controllers\IndexController@index');  //1
Route::match(['get', 'post'], '/', [IndexController::class, 'index'])->name('/');     //2
Route::get('/product/details/{id}', [IndexController::class, 'productDetails'])->name('product.details');     //2
Route::post('/get/product/price', [IndexController::class, 'getProductPrice'])->name('product.price');     //2
Route::get('/categories/proructs/{id}', [IndexController::class, 'categories'])->name('categories');     //2

Route::match(['get', 'post'],'/admin/login', [AdminController::class, 'login'])->name('admin.login');

Route::group(['middleware' => ['auth'],'prefix'=>'admin'],function () {
    Route::match(['get', 'post'], '/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');

    //Category Routes
    Route::resource('/categories', CategoryController::class);
    Route::get('/categories/delete/{id}', [CategoryController::class,'delete'])->name('categories.delete');
    Route::post('/categories/update-category-status', [CategoryController::class,'updateCategoryStatus'])->name('update.category.status');

    //Product Routes
    Route::resource('/products', ProductController::class);
    Route::get('/products/delete/{id}', [ProductController::class,'delete'])->name('products.delete');
    Route::post('/products/update-product-status', [ProductController::class,'updateProductStatus'])->name('update.product.status');
    Route::post('/products/update-featured-status', [ProductController::class,'updateFeaturedStatus'])->name('update.featured.status');
    Route::get('/products/add-attributes/{id}', [ProductController::class,'addProductAttributesGet'])->name('add.product.attributes.get');
    Route::post('/products/add-attributes/{id}', [ProductController::class,'addProductAttributesPost'])->name('add.product.attributes.post');
    Route::post('/products/update-attributes', [ProductController::class,'updateProductAttributes'])->name('update.product.attributes');
    Route::get('/delete/product/attribute/{id}', [ProductController::class,'deleteProductAttribute'])->name('delete.product.attribute');
    Route::get('/products/add-images/{id}', [ProductController::class,'addProductImagesGet'])->name('add.product.images.get');
    Route::post('/products/add-images/{id}', [ProductController::class,'addProductImagesPost'])->name('add.product.images.post');
    Route::get('/delete/alt-image/{id}', [ProductController::class,'deleteAltImage'])->name('delete.alt.image');


    //Banner Routes
    Route::resource('/banners', BannerController::class);
    Route::get('/banners/delete/{id}', [BannerController::class,'delete'])->name('banners.delete');
    Route::post('/banners/update-banner-status', [BannerController::class,'updateBannerStatus'])->name('update.banner.status');



});

