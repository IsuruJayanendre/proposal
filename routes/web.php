<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PaymentController;
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
    return view('user.home');
});

Route::get('/pay', function () {
    return view('user.payment');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/home',[HomeController::class,'index']);

Route::get('/addpost',[PostController::class,'create'])->name('addpost');
Route::get('/post/find',[PostController::class,'index'])->name('post.find');
Route::get('/post/{id}', [PostController::class, 'show'])->name('post.show');
Route::get('/post/search',[PostController::class,'search'])->name('post.search');

Route::post('/post/store',[PostController::class,'store'])->name('post.store');

Route::get('/post/pending',[PostController::class,'pending'])->name('post.pending');
Route::get('/post/approved',[PostController::class,'approved'])->name('post.approved');
Route::get('/post/removed',[PostController::class,'removed'])->name('post.removed');

Route::post('/posts/approve/{id}', [PostController::class, 'approve'])->name('posts.approve');
Route::post('/posts/remove/{id}', [PostController::class, 'remove'])->name('posts.remove');
Route::post('/posts/restore/{id}', [PostController::class, 'restore'])->name('posts.restore');

Route::get('/test',[PostController::class,'test'])->name('test');

Route::get('/users', [UserController::class, 'view'])->name('users');
Route::get('/profile', [UserController::class, 'profile'])->name('profile');

Route::get('/payment', [PaymentController::class, 'index'])->name('payment.page');
Route::post('/payment/process', [PaymentController::class, 'store'])->name('payment.store');
Route::get('/payments', [PaymentController::class, 'view'])->name('payments');
Route::get('/confirm', [PaymentController::class, 'confirm'])->name('confirm');
Route::post('/done', [PaymentController::class, 'done'])->name('done');