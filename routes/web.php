<?php

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

Route::get('/', [\App\Http\Controllers\PostController::class, 'index'])->name('home');
//Route::get('/', function () {
//    return view('welcome');
//})->name('home');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    return view('dashboard');
    return redirect(route('home'));
})->name('dashboard');

Route::middleware(['auth'])->group(function() {

    Route::get('create', [\App\Http\Controllers\PostController::class, 'create'])->name('post.create');
    Route::get('p/{post}', [\App\Http\Controllers\PostController::class, 'show'])->name('post.show');
    Route::post('create', [\App\Http\Controllers\PostController::class, 'store'])->name('post.store');

});

Route::middleware(['role:admin'])->group(function () {
    Route::get('admin', [\App\Http\Controllers\ApproveController::class , 'index'])->name('admin.index');
    Route::get('admin/p/{post}', [\App\Http\Controllers\ApproveController::class , 'show'])->name('admin.post');
});
