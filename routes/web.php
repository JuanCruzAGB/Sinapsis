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

// * Controller
    Route::get('/', 'Controller@dashboard')->name('index');

    Route::get('/dashboard', 'Controller@dashboard')->name('dashboard');

// * Auth
    Auth::routes();

    Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

// * CartController
    Route::get('/cart', 'CartController@index')->name('cart.index');

    Route::put('/cart/update', 'CartController@update')->name('cart.update');

// * EvaluationController
    Route::get('/evaluations/list', 'EvaluationController@index')->name('evaluation.index');

    Route::put('/evaluations/update', 'EvaluationController@update')->name('evaluation.update');

// * ExamController
    Route::get('/exams/list', 'ExamController@index')->name('exam.index');

    Route::get('/exams/create', 'ExamController@create')->name('exam.create');

    Route::post('/exams/store', 'ExamController@store')->name('exam.store');

    Route::middleware([ 'exam', ])->group(function () {
        Route::get('/exams/{slug}/show', 'ExamController@show')->name('exam.show');
    
        Route::put('/exams/{slug}/update', 'ExamController@update')->name('exam.update');
    
        Route::delete('/exams/{slug}/destroy', 'ExamController@destroy')->name('exam.destroy');
    });

// * UserController
    Route::middleware([ 'role', ])->group(function () {
        Route::get('/users/{role}/list', 'UserController@index')->name('user.index');

        Route::get('/users/{role}/create', 'UserController@create')->name('user.create');

        Route::post('/users/{role}/store', 'UserController@store')->name('user.store');

        Route::middleware([ 'user', ])->group(function () {
            Route::get('/users/{role}/{slug}/show', 'UserController@show')->name('user.show');

            Route::put('/users/{role}/{slug}/update', 'UserController@update')->name('user.update');

            Route::delete('/users/{role}/{slug}/destroy', 'UserController@destroy')->name('user.destroy');
        });
    });

    Route::middleware([ 'user', ])->group(function () {
        Route::get('/users/{slug}/profile', 'UserController@details')->name('user.details');
    });