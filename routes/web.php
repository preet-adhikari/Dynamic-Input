<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\BloggerController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('/',[BloggerController::class,'BloggerLogin'])->name('blogger.login')->middleware('isBloggerLoggedIn');
Route::get('/BloggerRegister',[BloggerController::class,'BloggerRegister'])->name('blogger.register')->middleware('isBloggerLoggedIn');
Route::post('/Blogger-Register',[BloggerController::class,'register'])->name('blogger.signup');
Route::post('/Blogger-Login',[BloggerController::class,'signin'])->name('blogger.signin');

//The blog after log in
Route::get('/blog',[BlogController::class,'index'])->name('blog.index');
Route::get('/blog/viewSinglePost/{slug}',[BlogController::class,'viewSinglePost'])->name('blog.viewPost');
Route::get('/blog/create',[BlogController::class,'createPost'])->name('blog.createPost');
Route::post('/blog/createPost',[BlogController::class,'addPost'])->name('blog.addPost');
Route::get('/blog/edit-Post/{slug}',[BlogController::class,'editPost'])->name('blog.edit-Post');
Route::post('/blog/update-Post/{id}',[BlogController::class,'updatePost'])->name('blog.updatePost');
Route::get('/blog/deletePost/{slug}',[BlogController::class,'deletePost'])->name('blog.postDelete');
//BlogsitePosts

Route::group(['middleware' => 'auth','web'],function () {
    Route::get('admin/view-posts', [PostController::class, 'index'])->name('view.posts');
    Route::get('admin/add-post', [PostController::class, 'create'])->name('add.post');
    Route::post('admin/addPost', [PostController::class, 'store'])->name('post.store');
    Route::get('admin/edit-post/{slug}', [PostController::class, 'edit'])->name('post.edit');
    Route::post('admin/update-post/{id}', [PostController::class, 'update'])->name('post.update');
    Route::get('admin/delete-post/{slug}', [PostController::class, 'destroy'])->name('post.delete');
});




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
