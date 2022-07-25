<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AutoCompleteController;
use \App\Http\Controllers\FormController;
use \App\Http\Controllers\UserController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\SessionController;

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
        Route::get('/form/{form:slug}/edit', [FormController::class, 'editForm'])->name('editform');
        Route::get('/create', [FormController::class, 'creator'])->name('createform');
        Route::post('/post', [FormController::class, 'postForm'])->name('postform');
        Route::patch('/updatedescription/{slug}', [FormController::class, 'updateDescription'])->name('updatedescription');
    });

    Route::prefix('sessions')->name('sessions.')->group(function () {
        Route::get('/', [SessionController::class, 'getIndex'])->name('sessions');
        Route::get('session/{session:slug}/edit', [SessionController::class, 'sessionAccess'])->name('sessionAccess');
    });

    Route::prefix('question')->name('question.')->group(function() {
        Route::post('post/{form:id}', [QuestionController::class, 'postQuestion'])->name('postquestion');
        Route::patch('/updatetitle/{id}', [QuestionController::class, 'updateTitle'])->name('updatetitle');
    });

    Route::prefix('admin')->name('admin.')->group( function() {
        Route::get('/users', [UserController::class, 'getIndex'])->name('admin');
    });

    Route::get('ajax-autocomplete-search', [AutoCompleteController::class,'selectSearch']);
});

Route::prefix('forms')->name('content.')->group(function(){
    Route::get('/form/{form:slug}', [FormController::class, 'getForm'])->name('form');
    Route::post('/saveformresult/{slug}', [FormController::class, 'saveFormResult'])->name('saveformresult');
});




require __DIR__.'/auth.php';
