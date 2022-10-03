<?php
use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsFromAuthorController;
use App\Http\Controllers\PostsFromCategoryController;

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

// Various posts indexes
Route::get('/posts', [PostController::class, 'index']);
Route::get('/categories/{category:slug}', PostsFromCategoryController::class);
Route::get('/authors/{author:slug}', PostsFromAuthorController::class);

// Single post
Route::get('/posts/{post:slug}', [PostController::class, 'show']);
// Create post
Route::get('/post/create', [PostController::class, 'create'])->middleware('auth');
Route::post('/post/store', [PostController::class, 'store'])->middleware('auth');

// Create user
Route::get('/user/create', [UserController::class, 'create'])->middleware('guest');
Route::post('/user/store', [UserController::class, 'store'])->middleware('guest');

// Auth
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login')->middleware('guest');
Route::post('/login', [AuthenticatedSessionController::class, 'store'])->middleware('guest');
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->middleware('auth');
