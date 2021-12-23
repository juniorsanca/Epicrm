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

Route::redirect('/', '/welcome');

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

    Route::resource('leads', 'LeadController');
    //Route::get('leads', 'LeadController');


    Route::get('export', 'LeadController@export')->name('leads.export');

    Route::post('import', 'LeadController@import')->name('leads.import');

    Route::get('profile', 'ProfileController@edit')->name('profile.edit');

    Route::put('profile', 'ProfileController@update')->name('profile.update');
});

//Route::get('admin/leads/export', [\App\Http\Controllers\Admin\LeadController::class, 'exportIntoExcel'])->middleware('auth')->name('admin.leads.export');

/* ---------[ DEBUT CODE JUNIOR - REGISTER POUR LES ADMIN TENANTS]----------- */
/*--[FRONTEND]--*/
    Route::get('register', [\App\Http\Controllers\ManagerController::class, 'register'])->name('register');

    Route::post('/newuser', [App\Http\Controllers\ManagerController::class, 'store'])->name('manager.store');

    Route::get('/', [\App\Http\Controllers\WelcomeController::class, 'index']);
    Route::get('about', [\App\Http\Controllers\WelcomeController::class, 'about']);
    Route::get('feature', [\App\Http\Controllers\WelcomeController::class, 'feature']);
    Route::get('price', [\App\Http\Controllers\WelcomeController::class, 'price']);

    Route::get('help', [\App\Http\Controllers\WelcomeController::class, 'help']);
    Route::get('guide', [\App\Http\Controllers\WelcomeController::class, 'guide']);
    Route::get('excel', [\App\Http\Controllers\WelcomeController::class, 'excel']);
    Route::get('gestion', [\App\Http\Controllers\WelcomeController::class, 'gestion']);
    Route::get('prospects', [\App\Http\Controllers\WelcomeController::class, 'prospects']);


/*----------[ABONNEMENTS]----------*/
    Route::get('plans/home', [\App\Http\Controllers\PlanController::class, 'planhome'])->name('plans.home');
    Route::get('plans', [\App\Http\Controllers\PlanController::class, 'index'])->name('plans.index');
    Route::get('plans/{plan}', [\App\Http\Controllers\PlanController::class, 'show'])->name('plans.show');

    Route::get('subscription', [\App\Http\Controllers\SubscriptionController::class, 'create'])->name('subscription.index');

    Route::get('create/plan', [\App\Http\Controllers\SubscriptionController::class, 'createPlan'])->name('create.plan');
    Route::post('store/plan', [\App\Http\Controllers\SubscriptionController::class, 'storePlan'])->name('store.plan');
