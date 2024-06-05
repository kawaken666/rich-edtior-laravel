<?php

use App\Http\Controllers\EditorController;
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

Route::view('/', 'editor');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/editor', [EditorController::class, 'index'])->name('editor');
Route::post('/editor', [EditorController::class, 'upload'])->name('editor.upload');
Route::post('/editor/save', [EditorController::class, 'save'])->name('editor.save');

require __DIR__.'/auth.php';
