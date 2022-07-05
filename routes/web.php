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

    Auth::routes();

// * Controller
    Route::get('/', 'Controller@dashboard')->name('dashboard');

    Route::get('/dashboard', 'Controller@dashboard')->name('dashboard');

// * UserController
    Route::get('/user/{role}/list', 'UserController@index')->name('user.index');

    Route::get('/user/{role}/create', 'UserController@create')->name('user.create');

    Route::post('/user/{role}/store', 'UserController@store')->name('user.store');

    Route::get('/user/{role}/{slug}/show', 'UserController@show')->name('user.show');

    Route::put('/user/{role}/{slug}/update', 'UserController@update')->name('user.update');

    Route::delete('/user/{role}/{slug}/destroy', 'UserController@destroy')->name('user.destroy');

    Route::get('/user/{slug}/details', 'UserController@details')->name('user.details');

// * ExamController
    Route::get('/exam/list', 'ExamController@index')->name('exam.index');

    Route::get('/exam/create', 'ExamController@create')->name('exam.create');

    Route::post('/exam/store', 'ExamController@store')->name('exam.store');

    Route::get('/exam/{slug}/details', 'ExamController@show')->name('exam.details');

    Route::put('/exam/{slug}/update', 'ExamController@update')->name('exam.update');

    Route::delete('/exam/{slug}/destroy', 'ExamController@destroy')->name('exam.destroy');

    // Login

    // Listado de Registros

    // Listado de Resultados

    // Landing de Pago

    // Landing de Correcciones

    // Landing de Resultados