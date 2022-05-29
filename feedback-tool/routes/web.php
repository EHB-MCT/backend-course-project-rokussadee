<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\FormController;
use \App\Http\Controllers\UserController;
use App\Http\Controllers\QuestionController;

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

//Route::middleware(/)

Route::middleware(['auth', 'verified'])->group(function(){
    Route::get('/', function () {
        return view('dashboard');
    })->middleware(['auth'])->name('dashboard');

    Route::prefix('forms')->name('content.')->group(function() {
        Route::get('/', [FormController::class, 'getIndex'])->name('forms');
        Route::get('/{form:slug}', [FormController::class, 'getForm'])->name('form');
        Route::get('/{form:slug}/edit', [FormController::class, 'editForm'])->name('editform');
    });

    Route::patch('question/update/{id}', [QuestionController::class, 'update'])->name('question.update');

    Route::prefix('admin')->name('admin.')->group( function() {
        Route::get('/users', [UserController::class, 'getIndex'])->name('admin');
    });
});



require __DIR__.'/auth.php';
