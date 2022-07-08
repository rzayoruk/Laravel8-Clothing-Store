<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;








Route::get('/home', function () {
    return view('home.index',['name'=>'rizayoruk']);
});
///////yazdıklarımız
Route::get('/', function () {
    return view('home.index');
});



Route::get('/home/{id}',[HomeController::class,'test'])->where('id','[0-9]+')->name('test');

Route::redirect('/anasayfa','/home')->name('anasayfa');


/// Admin
Route::middleware('auth')->prefix('admin')->group(function (){

    Route::get('/',[\App\Http\Controllers\Admin\HomeController::class,'index'])->name('adminhome');
    #category
    Route::get('category',[\App\Http\Controllers\Admin\CategoryController::class,'index'])->name('admin_category');
    Route::get('category/add',[\App\Http\Controllers\Admin\CategoryController::class,'add'])->name('admin_category_add');
    Route::post('category/create',[\App\Http\Controllers\Admin\CategoryController::class,'create'])->name('admin_category_create');
    Route::get('category/edit/{id}',[\App\Http\Controllers\Admin\CategoryController::class,'edit'])->name('admin_category_edit');
    Route::post('category/update/{id}',[\App\Http\Controllers\Admin\CategoryController::class,'update'])->name('admin_category_update');
    Route::get('category/delete/{id}',[\App\Http\Controllers\Admin\CategoryController::class,'destroy'])->name('admin_category_delete');
    Route::get('category/show',[\App\Http\Controllers\Admin\CategoryController::class,'show'])->name('admin_category_show');

    #Product

    Route::prefix('product')->group(function (){

        Route::get('/',[\App\Http\Controllers\Admin\ProductController::class,'index'])->name('admin_products');
        Route::get('create',[\App\Http\Controllers\Admin\ProductController::class,'add'])->name('admin_product_add');
        Route::post('store',[\App\Http\Controllers\Admin\ProductController::class,'create'])->name('admin_product_create');
        Route::get('edit/{id}',[\App\Http\Controllers\Admin\ProductController::class,'edit'])->name('admin_product_edit');
        Route::post('update/{id}',[\App\Http\Controllers\Admin\ProductController::class,'update'])->name('admin_product_update');
        Route::get('delete/{id}',[\App\Http\Controllers\Admin\ProductController::class,'destroy'])->name('admin_product_delete');
        Route::get('show',[\App\Http\Controllers\Admin\ProductController::class,'show'])->name('admin_product_show');


    });


});

Route::get('/admin/login',[\App\Http\Controllers\Admin\HomeController::class,'login'])->name('admin_login');
Route::post('/admin/logincheck',[\App\Http\Controllers\Admin\HomeController::class,'logincheck'])->name('admin_logincheck');
Route::get('/admin/logout',[\App\Http\Controllers\Admin\HomeController::class,'logout'])->name('admin_logout');


/////
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
