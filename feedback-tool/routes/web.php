<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AutoCompleteController;
use \App\Http\Controllers\FormController;
use \App\Http\Controllers\UserController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\SessionController;
use \App\Http\Controllers\MailController;

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
        Route::get('/formresult/{id}', [FormController::class, 'getFormResult'])->name('formresult');
        Route::get('/create', [FormController::class, 'creator'])->name('createform');
        Route::post('/post', [FormController::class, 'postForm'])->name('postform');
        Route::patch('/updatedescription/{slug}', [FormController::class, 'updateDescription'])->name('updatedescription');
    });

    Route::prefix('sessions')->name('sessions.')->group(function () {
        Route::get('/', [SessionController::class, 'getIndex'])->name('sessions');
        Route::get('/create', [SessionController::class, 'creator'])->name('createsession');
        Route::post('/post', [SessionController::class, 'postSession'])->name('postsession');
        Route::get('/session/{session:slug}/edit', [SessionController::class, 'sessionAccess'])->name('editsession');
    });

    Route::prefix('question')->name('question.')->group(function() {
        Route::post('post/{form:id}', [QuestionController::class, 'postQuestion'])->name('postquestion');
        Route::patch('/updatetitle/{id}', [QuestionController::class, 'updateTitle'])->name('updatetitle');
    });

    Route::prefix('admin')->name('admin.')->group( function() {
        Route::get('/users', [UserController::class, 'getIndex'])->name('users');
        Route::get('/user/{id}', [UserController::class, 'getUser'])->name('user');
    });

    Route::get('ajax-autocomplete-search', [AutoCompleteController::class,'selectSearch']);

    Route::get('send-mail', [MailController::class, 'index'])->name('sendmail');
});

Route::prefix('forms')->name('content.')->group(function(){
    Route::get('/form/{form:slug}/{session}', [FormController::class, 'getForm'])->name('form');
    Route::post('/saveformresult/{slug}/{respondent}/{session:id}', [FormController::class, 'saveFormResult'])->name('saveformresult');
});

Route::prefix('sessions')->name('sessions.')->group(function() {
    Route::get('/session/{session:slug}', [SessionController::class, 'sessionAccess'])->name('sessionaccess');
});




require __DIR__.'/auth.php';
