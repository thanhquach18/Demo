<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\userController as adminUsers;
use App\Http\Controllers\admin\dashboardController as adminDashboard;
use App\Http\Controllers\admin\blogController as adminBlog;
use App\Http\Controllers\admin\newController as adminNew;
use App\Http\Middleware\checkLogin as checkLoginMid;
use App\Http\Controllers\frontend\dashboardController as frontendashboard;


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

Route::get('/', [frontendashboard::class, 'indexweb'])->name('website.index');
Route::get('/blog/{slug}', [frontendashboard::class, 'singleBlog'])->name('website.blog.single');

/**
 * Namespace admin 
 */
Route::group(['prefix' => 'administrator'], function(){
   
    
    Route::get('login',[adminUsers::class, 'login'])->name('login.get');
    Route::post('login',[adminUsers::class, 'loginPost']);
    
    Route::get('logout',[adminUsers::class, 'logout'])->name('logout.get');

    Route::middleware([checkLoginMid::class])->group(function () {
        Route::get('/',[adminDashboard::class, 'index'])->name('dashboard.index');

        /* Change Password */
        Route::get('/change-password',[adminUsers::class, 'changePassword'])->name('user.change.password');
        Route::post('/change-password',[adminUsers::class, 'changePasswordPost']);

        Route::get('blog', [adminBlog::class,'indexblog'])->name('blog.index');
        Route::get('blog/delete/{id}', [adminBlog::class, 'deleteBlog'])->name('blog.delete');
        Route::get('blog/edit/{id}', [adminBlog::class, 'edit'])->name('blog.edit');
        Route::post('blog/edit/{id}', [adminBlog::class, 'editPost']);

        Route::get('blog/insert', [adminBlog::class, 'insert'])->name('blog.create');
        Route::post('blog/insert', [adminBlog::class, 'insertPost']);

    
    });
    
});