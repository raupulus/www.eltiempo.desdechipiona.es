<?php

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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/services', function () {
    return view('services');
})->name('services');

/******************************************
 *           Rutas de errores
 ******************************************/
Route::group(['prefix' => 'error'], function() {
    Route::get('/404', function() {
        return view('errors.404');
    })->name('error-404');

    Route::get('/500', function() {
        return view('errors.500');
    })->name('error-500');
});

/******************************************
 *            PANEL DE GESTIÓN
 ******************************************/
Route::group(['prefix' => 'panel'], function() {
    Route::get('/', function() {
        return view('panel.index');
    })->name('panel-index');

    Route::get('/login', function() {
        return view('panel.login');
    })->name('panel-login');

    Route::get('/forgot-password', function() {
        return view('panel.forgot-password');
    })->name('panel-forgot-password');

    Route::get('/register', function() {
        return view('panel.register');
    })->name('panel-register');

    Route::get('/404', function() {
        return view('panel.errors.404');
    })->name('panel-404');

    Route::get('/500', function() {
        return view('panel.errors.500');
    })->name('panel-500');

    Route::get('/blank', function() {
        return view('panel.blank');
    })->name('panel-blank');

    ## DEMOS
    Route::group(['prefix' => 'demos'], function() {
        Route::get('/charts', function () {
            return view('panel.demos.charts');
        })->name('panel-demo-charts');

        Route::get('/tables', function () {
            return view('panel.demos.tables');
        })->name('panel-demo-tables');
    });
});
