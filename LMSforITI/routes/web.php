<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookBorrowController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StudentController;


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



Route::get('/', function () {
    return view('welcome');
});


//Authentication routes
Route::middleware('guest')->group(function () {
    Route::get('login',[LoginController::class,'login'])->name('login');
    Route::post('login-admin',[LoginController::class,'adminlogin'])->name('login.admin');
    Route::post('login-user',[LoginController::class,'userlogin'])->name('login.user');
    Route::match(['get','post'],'register-user',[LoginController::class,'userregister'])->name('register.user');
});


//Admin routes
Route::prefix('/admin')->group(function(){
    Route::group(['middleware'=>['auth:admin']],function(){
        Route::post('/logout',[LoginController::class,'logout'])->name('admin.logout');
        Route::get('/dashboard',[AdminController::class,'dashboard']);
        Route::match(['get','post'],'details',[AdminController::class,'details']);

        Route::get('admins',[AdminController::class,'admins']);
        Route::match(['get','post'],'adminEdit-admin/{id?}',[AdminController::class,'addedit']);
        Route::get('delete-admin/{id}',[AdminController::class,'deleteadmin']);

        //admin/books
        Route::resource('books',BookController::class);
        Route::get('delete-book/{id}',[BookController::class,'destroy']);
        Route::get('borrowed-books',[BookController::class,'borrowedbooks']);

        //admin/students
        Route::get('students',[AdminController::class,'showstudents']);
        Route::get('delete-user/{id}',[AdminController::class,'deleteuser']);

    });
});

//Student routes
Route::prefix('/student')->group(function(){
    Route::group(['middleware'=>['auth:web']],function(){
        Route::post('/logout',[LoginController::class,'logoutuser'])->name('user.logout');
        Route::get('/dashboard',[StudentController::class,'dashboard']);

        Route::match(['get','post'],'details',[StudentController::class,'details']);

        //student/books
        Route::get('books',[BookController::class,'books']);
        Route::get('/borrow/{id}',[BookBorrowController::class,'borrow']);
        Route::match(['get','post'],'/borrowed-books/{id?}',[BookBorrowController::class,'borrowedbooks']);

    });
});



