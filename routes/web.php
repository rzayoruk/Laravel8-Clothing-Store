<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;








Route::get('/home', function () {
    return view('home.index',['name'=>'rizayoruk']);
});
///////
Route::get('/', function () {
    return view('home.index');
});



Route::get('/home/{id}',[HomeController::class,'test'])->where('id','[0-9]+')->name('test');

Route::redirect('/anasayfa','/home')->name('anasayfa');


///////////
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
