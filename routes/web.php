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

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::view('editor', 'editor');
Route::view('editorTest', 'editor-test');

Route::get('/editorTest', [EditorController::class, 'index'])->name('editorTest');
Route::post('/editorTest', [EditorController::class, 'upload'])->name('editorTest.upload');


require __DIR__.'/auth.php';
