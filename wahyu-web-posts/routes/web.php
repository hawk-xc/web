<?php

use \App\Models\post;
use \App\Models\User;
use App\Http\Controllers\dashboardCategoryResource;
use App\Http\Controllers\dashboardPostResource;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\SigninController;
use App\Models\category;
use Illuminate\Contracts\View\View;
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

Route::get('/', [PostsController::class, 'index'])->middleware('auth');

Route::get('/posts', [PostsController::class, 'posts'])->middleware('auth');

Route::get('/post/{post}', [PostsController::class, 'post'])->middleware('auth');

Route::get('/category', function () {
    return view('category', [
        'title' => 'category',
        'active' => 'category',
        'categories' => collect(\App\Models\category::get())
    ]);
})->middleware('auth');

Route::get('/category/{category:name}', function (category $category) {
    return view('Posts', [
        'title' => 'posts kategori : ' . $category->name,
        'active' => 'posts',
        'posts' => $category->Posts
    ]);
})->middleware('auth');

Route::get('/author/{User:username}', function (User $User) {
    return view('Posts', [
        'title' => 'posts penulis : ' . $User->name,
        'active' => 'posts',
        'posts' => $User->Posts
    ]);
})->middleware('auth');

Route::get('/signup', [SigninController::class, 'register'])->middleware('guest');

Route::post('register', [SigninController::class, 'store'])->middleware('guest');

Route::get('/signin', [SigninController::class, 'login'])->name('login')->middleware('guest');

Route::post('/signin', [SigninController::class, 'loginAuth'])->middleware('guest');

Route::get('/signout', [SigninController::class, 'signout'])->middleware('auth');

// route for dashboard
Route::get('/dashboard', function (): View {
    $data = [
        'title' => 'Dashboard',
    ];

    return view('dashboardContent.index', $data);
})->middleware('auth');

Route::resource('dashboard/posts', dashboardPostResource::class)->middleware('auth')->except('show');
Route::resource('dashboard/categories', dashboardCategoryResource::class)->except('show')->middleware('is_admin');
