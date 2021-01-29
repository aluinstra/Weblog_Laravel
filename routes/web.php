<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\FileUploadController;

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

Route::get('/posts/topic', [PostController::class, 'topic'])->name('posts.topic');

Route::get('/upload-file/{postID}', [FileUploadController::class, 'createForm']);

Route::post('/upload-file/{postID}', [FileUploadController::class, 'fileUpload'])->name('file-upload');

Route::get('/weeklyUpdate', [PostController::class, 'emailUpdate'])->name('posts.weeklyUpdate');

Route::resources([
    'users' => UserController::class,
    'posts' => PostController::class,
    'replies' => ReplyController::class,
]);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// Route::delete('/logout/{}', [AuthenticatedSessionController::class, 'destroy'])->name('auth.destroy');

require __DIR__ . '/auth.php';
