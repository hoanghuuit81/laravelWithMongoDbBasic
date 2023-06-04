<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\productController;
use App\Http\Controllers\shopController;
use App\Http\Controllers\cartController;
use App\Http\Controllers\categoryBlogController;
use App\Http\Controllers\blogController;
use App\Http\Controllers\showBlogController;

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/admin/category', [categoryController::class, 'index'])->name('category.index');
Route::get('/admin/category/add', [categoryController::class, 'create'])->name('category.add');
Route::post('/admin/category/store', [categoryController::class, 'store'])->name('category.store');
Route::get('/admin/category/edit/{id}', [categoryController::class, 'edit'])->name('category.edit');
Route::post('/admin/category/update/{id}', [categoryController::class, 'update'])->name('category.update');
Route::get('/admin/category/delete/{id}', [categoryController::class, 'destroy'])->name('category.delete');

Route::get('/admin/product', [productController::class, 'index'])->name('product.index');
Route::get('/admin/product/add', [productController::class, 'create'])->name('product.add');
Route::post('/admin/product/store', [productController::class, 'store'])->name('product.store');
Route::get('/admin/product/edit/{id}', [productController::class, 'edit'])->name('product.edit');
Route::post('/admin/product/update/{id}', [productController::class, 'update'])->name('product.update');
Route::get('/admin/product/delete/{id}', [productController::class, 'destroy'])->name('product.delete');

Route::get('/admin/category-blog', [categoryBlogController::class, 'index'])->name('cateBlog.index');
Route::get('/admin/category-blog/add', [categoryBlogController::class, 'create'])->name('cateBlog.add');
Route::post('/admin/category-blog/store', [categoryBlogController::class, 'store'])->name('cateBlog.store');
Route::get('/admin/category-blog/edit/{id}', [categoryBlogController::class, 'edit'])->name('cateBlog.edit');
Route::post('/admin/category-blog/update/{id}', [categoryBlogController::class, 'update'])->name('cateBlog.update');
Route::get('/admin/category-blog/delete/{id}', [categoryBlogController::class, 'destroy'])->name('cateBlog.delete');

Route::get('/admin/blog', [blogController::class, 'index'])->name('blog.index');
Route::get('/admin/blog/add', [blogController::class, 'create'])->name('blog.add');
Route::post('/admin/blog/store', [blogController::class, 'store'])->name('blog.store');
Route::get('/admin/blog/edit/{id}', [blogController::class, 'edit'])->name('blog.edit');
Route::post('/admin/blog/update/{id}', [blogController::class, 'update'])->name('blog.update');
Route::get('/admin/blog/delete/{id}', [blogController::class, 'destroy'])->name('blog.delete');
Route::post('/admin/blog/upload-ckeditor', [blogController::class, 'ckeditorImage']);
Route::get('/admin/blog/upload-browser', [blogController::class, 'fileBrowser']);

Route::get('/', [shopController::class, 'index'])->name('shop.index');
Route::get('/product-by-category/{id}', [shopController::class, 'proByCate'])->name('shop.proByCate');
Route::get('/detail-product/{id}', [shopController::class, 'detailproduct'])->name('shop.detail');

Route::get('/blog', [showBlogController::class, 'index'])->name('showBlog.index');
Route::get('/blog/detail/{id}', [showBlogController::class, 'blogDetail'])->name('showBlog.detail');
Route::get('/blog/category/{id}', [showBlogController::class, 'blogByCate'])->name('showBlog.byCate');

Route::get('/cart', [cartController::class, 'index'])->name('cart.index');
Route::get('/cart/add/{id}', [cartController::class, 'add'])->name('cart.add');
Route::get('/cart/delete/{id}', [cartController::class, 'delete'])->name('cart.delete');
Route::post('/cart/update', [cartController::class, 'update'])->name('cart.update');
