<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
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
Route::middleware(['web', 'auth'])->group(function () {
    // Secure routes
    Route::get('dashboard', function () {
       return view('admin.pages.dashboard');
    })->name('dashboard');


    // Route without authenticated
    Route::withoutMiddleware('auth')->group(function() {
        // Authenticator Routes
        Route::get('/register', 'UserController@register')->name('register');
        Route::post('/signin', 'UserController@signin')->name('signin');
        Route::get('/logout', 'UserController@logout')->name('logout');
        Route::resource('login', 'UserController')->only(['index', 'store']);


        //Client routes
        Route::get('/', function () {
            return view('pages.hero');
        });
        Route::get('/tag/{tag_name}', function (Request $request) {
            $title = $request->tag_name;
            return view('pages.tag', compact('title'));
        });

        Route::get('/topic/{name}', function (Request $request) {
            $title = 'Agenda';
            return view('pages.details', compact('title'));
        })->name('blog');
    });
});

