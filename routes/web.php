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
Route::middleware(['auth'])->group(function () {
    // Secure routes
    Route::get('dashboard', function () {
       return view('admin.pages.dashboard');
    })->name('dashboard');
    Route::get('/user/profile', 'LoginController@profile')->name('profile');
    Route::get('/users/list', 'UserController@List');
    Route::get('/roles/list', 'RoleController@List');
    Route::get('/permissions/list', 'PermissionController@List');
    Route::get('/tags/list', 'TagController@List');
    Route::get('/blogs/list', 'BlogController@List');
    Route::resource('users', 'UserController');
    Route::resource('roles', 'RoleController');
    Route::resource('permissions', 'PermissionController');
    Route::resource('tags', 'TagController');
    Route::resource('blogs', 'BlogController');

    // Route without authenticated
    Route::withoutMiddleware('auth')->group(function() {
        // Authenticator Routes
        Route::get('/register', 'LoginController@register')->name('register');
        Route::post('/signin', 'LoginController@signin')->name('signin');
        Route::get('/logout', 'LoginController@logout')->name('logout');
        Route::resource('login', 'LoginController')->only(['index', 'store']);

        //Client routes
        Route::get('/', 'Web\WebController@index');
        Route::get('/tag/{id}', 'Web\WebController@individualTag');
        Route::get('/blog/{id}', 'Web\WebController@individualBlog')->name('blog');
    });
});

