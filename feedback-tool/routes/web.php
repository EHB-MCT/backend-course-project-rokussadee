<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AutoCompleteController;
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
        Route::get('/form/{form:slug}', [FormController::class, 'getForm'])->name('form');
        Route::get('/form/{form:slug}/edit', [FormController::class, 'editForm'])->name('editform');
        Route::get('/create', [FormController::class, 'creator'])->name('createform');
        Route::post('/post', [FormController::class, 'postForm'])->name('postform');
    });

    Route::prefix('question')->name('question.')->group(function() {
        Route::post('post/{form:id}', [QuestionController::class, 'postQuestion'])->name('postquestion');
        Route::patch('/update/{id}', [QuestionController::class, 'update'])->name('update');
    });

    Route::prefix('admin')->name('admin.')->group( function() {
        Route::get('/users', [UserController::class, 'getIndex'])->name('admin');
    });

    Route::get('ajax-autocomplete-search', [AutoCompleteController::class,'selectSearch']);});



require __DIR__.'/auth.php';
