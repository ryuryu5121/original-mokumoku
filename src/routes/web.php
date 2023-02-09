<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
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


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';



Route::get('/test', function() {
    return view('test');
});

Route::get('/',[EventController::class, 'index'] )->name('event.index');

Route::get('/category/index',[CategoryController::class, 'index'] )->name('category.index');

Route::get('/event/register', [EventController::class, 'register'] )->name('event.register');

Route::post('/event/create',[EventController::class, 'create'] )->name('event.create');

Route::get('/event/{id}',[EventController::class, 'show'])->name('event.show');

Route::get('/event/edit/{id}', [EventController::class, 'edit'])->name('event.edit');

Route::post('event/update', [EventController::class, 'update'])->name('event.update');

Route::post('event/delete/{id}', [EventController::class, 'delete'])->name('event.delete');

Route::get('/chat',[ChatController::class, 'index'])->name('chat.index');

Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
->name('logout');