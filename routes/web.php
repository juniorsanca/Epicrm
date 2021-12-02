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

Route::group(['domain' => '{user:domain}.'.config('app.short_url'), 'as' => 'tenant.'], function () {
    Route::get('/', 'TenantController@show')->name('show');
});

Route::redirect('/', '/home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/invitation/{user}', 'TenantController@invitation')->name('invitation');

Route::get('/password', 'Auth\PasswordController@create')->name('password.create');

Route::post('/password', 'Auth\PasswordController@store')->name('password.store');


Route::group(['as' => 'admin.', 'namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth']], function () {

    Route::get('tenants/{tenant}/suspend', 'TenantController@suspend')->name('tenants.suspend');

    Route::resource('tenants', 'TenantController');

    Route::resource('users', 'UserController');

    Route::resource('roles', 'RoleController');

    Route::resource('asset-groups', 'AssetGroupController');

    Route::resource('assets', 'AssetController');

    Route::post('images/media', 'ImageController@storeMedia')->name('images.storeMedia');

    Route::resource('images', 'ImageController');

    Route::post('documents/media', 'DocumentController@storeMedia')->name('documents.storeMedia');

    Route::resource('documents', 'DocumentController');

    Route::resource('notes', 'NoteController');

    Route::get('profile', 'ProfileController@edit')->name('profile.edit');

    Route::put('profile', 'ProfileController@update')->name('profile.update');
});

/* ---------[ DEBUT CODE JUNIOR - REGISTER POUR LES ADMIN TENANTS]----------- */

    Route::get('manager/lo', [\App\Http\Controllers\ManagerController::class, 'create']);
    Route::post('/man', [App\Http\Controllers\ManagerController::class, 'store'])->name('manager.store');    