<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopcartController;
use Illuminate\Support\Facades\Route;








/*Route::get('/home', function () {
    return view('home.index',['name'=>'rizayoruk']);
});*/
///////yazdıklarımız
/*Route::get('/', function () {
    return view('home.index');
});*/



Route::get('/',[HomeController::class,'index'])->name('home_index');

Route::get('/home',[HomeController::class,'index'])->name('home_index');
Route::get('/aboutus',[HomeController::class,'aboutus'])->name('aboutus');
Route::get('/references',[HomeController::class,'references'])->name('references');
Route::get('/faq',[HomeController::class,'faq'])->name('faq');
Route::get('/contact',[HomeController::class,'contact'])->name('contact');
Route::post('/sendmessage',[HomeController::class,'sendmessage'])->name('sendmessage');
Route::get('/product/{id}/{slug}',[HomeController::class,'product'])->name('product'); // detail
Route::get('/categoryproducts/{id}/{slug}',[HomeController::class,'categoryproducts'])->name('categoryproducts');
Route::post('/getproduct',[HomeController::class,'getproduct'])->name('getproduct');







/// Admin auth
Route::middleware('auth')->prefix('admin')->group(function (){

    Route::middleware('admin')->group(function (){

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
        Route::get('create',[\App\Http\Controllers\Admin\ProductController::class,'create'])->name('admin_product_create');
        Route::post('store',[\App\Http\Controllers\Admin\ProductController::class,'store'])->name('admin_product_store');
        Route::get('edit/{id}',[\App\Http\Controllers\Admin\ProductController::class,'edit'])->name('admin_product_edit');
        Route::post('update/{id}',[\App\Http\Controllers\Admin\ProductController::class,'update'])->name('admin_product_update');
        Route::get('delete/{id}',[\App\Http\Controllers\Admin\ProductController::class,'destroy'])->name('admin_product_delete');
        Route::get('show',[\App\Http\Controllers\Admin\ProductController::class,'show'])->name('admin_product_show');
    });





    # user control
    Route::prefix('user')->group(function (){

     Route::get('/',[\App\Http\Controllers\Admin\UserController::class,'index'])->name('admin_users');
     Route::get('create',[\App\Http\Controllers\Admin\UserController::class,'create'])->name('admin_user_create');
     Route::post('store',[\App\Http\Controllers\Admin\UserController::class,'store'])->name('admin_user_store');
     Route::get('edit/{id}',[\App\Http\Controllers\Admin\UserController::class,'edit'])->name('admin_user_edit');
     Route::post('update/{id}',[\App\Http\Controllers\Admin\UserController::class,'update'])->name('admin_user_update');
     Route::get('delete/{id}',[\App\Http\Controllers\Admin\UserController::class,'destroy'])->name('admin_user_delete');
     Route::get('show/{id}',[\App\Http\Controllers\Admin\UserController::class,'show'])->name('admin_user_show');
     Route::get('userrole/{id}',[\App\Http\Controllers\Admin\UserController::class,'user_roles'])->name('admin_user_roles');
     Route::post('userrolestore/{id}',[\App\Http\Controllers\Admin\UserController::class,'user_role_store'])->name('admin_user_role_store');
     Route::get('userroledelete/{userid}/{roleid}',[\App\Http\Controllers\Admin\UserController::class,'user_role_delete'])->name('admin_user_role_delete');
    });






    Route::prefix('faq')->group(function (){

        Route::get('/',[\App\Http\Controllers\Admin\FaqController::class,'index'])->name('admin_faqs');
        Route::get('create',[\App\Http\Controllers\Admin\FaqController::class,'create'])->name('admin_faq_create');
        Route::post('store',[\App\Http\Controllers\Admin\FaqController::class,'store'])->name('admin_faq_store');
        Route::get('edit/{id}',[\App\Http\Controllers\Admin\FaqController::class,'edit'])->name('admin_faq_edit');
        Route::post('update/{id}',[\App\Http\Controllers\Admin\FaqController::class,'update'])->name('admin_faq_update');
        Route::get('delete/{id}',[\App\Http\Controllers\Admin\FaqController::class,'destroy'])->name('admin_faq_delete');
    });

    #Message
    Route::prefix('message')->group(function (){

        Route::get('/',[\App\Http\Controllers\Admin\MessageController::class,'index'])->name('admin_message');
        Route::get('edit/{id}',[\App\Http\Controllers\Admin\MessageController::class,'edit'])->name('admin_message_edit');
        Route::post('update/{id}',[\App\Http\Controllers\Admin\MessageController::class,'update'])->name('admin_message_update');
        Route::get('delete/{id}',[\App\Http\Controllers\Admin\MessageController::class,'destroy'])->name('admin_message_delete');
    });

    #Product Image Gallery
    Route::prefix('image')->group(function (){

        Route::get('create/{product_id}',[\App\Http\Controllers\Admin\ImageController::class,'create'])->name('admin_image_create');// product id
        Route::post('store/{product_id}',[\App\Http\Controllers\Admin\ImageController::class,'store'])->name('admin_image_store');// product id
        Route::get('delete/{id}',[\App\Http\Controllers\Admin\ImageController::class,'destroy'])->name('admin_image_delete');
        Route::get('show',[\App\Http\Controllers\Admin\ImageController::class,'show'])->name('admin_image_show');
    });

    #Setting
    Route::prefix('setting')->group(function (){

        Route::get('/',[\App\Http\Controllers\Admin\SettingController::class,'index'])->name('admin_setting');
        Route::post('update',[\App\Http\Controllers\Admin\SettingController::class,'update'])->name('admin_setting_update');
    });
#reviews
    Route::prefix('reviews')->group(function (){

        Route::get('/',[\App\Http\Controllers\Admin\ReviewController::class,'index'])->name('admin_reviews');
        Route::get('/edit/{id}',[\App\Http\Controllers\Admin\ReviewController::class,'edit'])->name('admin_review_edit');
        Route::post('update/{id}',[\App\Http\Controllers\Admin\ReviewController::class,'update'])->name('admin_review_update');
        Route::get('/delete/{id}',[\App\Http\Controllers\Admin\ReviewController::class,'destroy'])->name('admin_review_delete');
    });

    #Admin Order
    Route::prefix('order')->group(function () {
        Route::get('/', [AdminOrderController::class, 'index'])->name('admin_orders');
        Route::get('/list/{status}', [AdminOrderController::class, 'list'])->name('admin_order_list');
        Route::post('create', [AdminOrderController::class, 'create'])->name('admin_order_create');
        Route::post('store', [AdminOrderController::class, 'store'])->name('admin_order_store');
        Route::get('edit/{id}', [AdminOrderController::class, 'edit'])->name('admin_order_edit');
        Route::post('update/{id}', [AdminOrderController::class, 'update'])->name('admin_order_update');
        Route::post('updateitem/{id}', [AdminOrderController::class, 'updateitem'])->name('admin_order_item_update');
        Route::get('delete/{id}', [AdminOrderController::class, 'destroy'])->name('admin_order_delete');
        Route::get('show/{id}', [AdminOrderController::class, 'show'])->name('admin_order_show');
    });

    });#admin

});#auth


##USER
Route::middleware('auth')->prefix('user')->namespace('user')->group(function () {
    Route::get('/profile',[\App\Http\Controllers\UserController::class,'index'])->name('userprofile');
    Route::get('/myreview',[\App\Http\Controllers\UserController::class,'myReviews'])->name('myreviews');
    Route::get('/deletemyreview/{id}',[\App\Http\Controllers\UserController::class,'deleteMyReview'])->name('delete_myreview');


    ## USER Product
    Route::prefix('product')->group(function (){
        Route::get('/',[ProductController::class,'index'])->name('user_products');
        Route::get('create',[ProductController::class,'create'])->name('user_product_create');
        Route::post('store',[ProductController::class,'store'])->name('user_product_store');
        Route::get('edit/{id}',[ProductController::class,'edit'])->name('user_product_edit');
        Route::post('update/{id}',[ProductController::class,'update'])->name('user_product_update');
        Route::get('delete/{id}',[ProductController::class,'destroy'])->name('user_product_delete');
        Route::get('show',[ProductController::class,'show'])->name('user_product_show');

        ##USER Product Image Gallery
        Route::prefix('image')->group(function (){
            Route::get('create/{product_id}',[ImageController::class,'create'])->name('user_product_image_create');// product id
            Route::post('store/{product_id}',[ImageController::class,'store'])->name('user_product_image_store');// product id
            Route::get('delete/{id}',[ImageController::class,'destroy'])->name('user_product_image_delete');
            Route::get('show',[ImageController::class,'show'])->name('user_product_image_show');
        });
    });






    ## USER Shopcart
    Route::prefix('shopcart')->group(function (){
        Route::get('/',[ShopcartController::class,'index'])->name('user_shopcart');
        Route::post('store/{id}',[ShopcartController::class,'store'])->name('user_shopcart_store');
        Route::get('edit/{id}',[ShopcartController::class,'edit'])->name('user_shopcart_edit');
        Route::post('update/{id}',[ShopcartController::class,'update'])->name('user_shopcart_update');
        Route::get('delete/{id}',[ShopcartController::class,'destroy'])->name('user_shopcart_delete');
        Route::get('show',[ShopcartController::class,'show'])->name('user_shopcart_show');
    });


   ## USER Order
    Route::prefix('order')->group(function () {
        Route::get('/', [OrderController::class, 'index'])->name('user_orders');
        Route::post('create', [OrderController::class, 'create'])->name('user_order_create');
        Route::post('store', [OrderController::class, 'store'])->name('user_order_store');
        Route::get('edit/{id}', [OrderController::class, 'edit'])->name('user_order_edit');
        Route::post('update/{id}', [OrderController::class, 'update'])->name('user_order_update');
        Route::get('delete/{id}', [OrderController::class, 'destroy'])->name('user_order_delete');
        Route::get('show/{id}', [OrderController::class, 'show'])->name('user_order_show');
    });



});


Route::get('/admin/login',[\App\Http\Controllers\Admin\HomeController::class,'login'])->name('admin_login');
Route::post('/admin/logincheck',[\App\Http\Controllers\Admin\HomeController::class,'logincheck'])->name('admin_logincheck');
Route::get('logout',[HomeController::class,'logout'])->name('logout');


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
