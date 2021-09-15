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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
/////// admin controlller ///////
Route::get('/dashboard', 'PageController@dashboard')->name('home');
Route::get('/main', 'PageController@main')->name('admin.main');
Route::post('/main/store/{id}','PageController@store')->name('main.store');
Route::get('/services', 'PageController@services')->name('admin.serviecs');
Route::post('/services/store', 'PageController@servicesStore')->name('services.store');
Route::get('/services/delete/{id}', 'PageController@servicesDelete')->name('service.delete');
Route::get('/services/edit/{id}', 'PageController@servicesEdit')->name('service.edit');
Route::post('/services/update/{id}', 'PageController@servicesUpdate')->name('services.update');
Route::get('/protfolio', 'PageController@protfolio')->name('admin.protfolio');
Route::get('/contact', 'PageController@contact')->name('admin.contact');
Route::get('/about', 'PageController@about')->name('admin.about');

///////frontend controller////////
Route::get('/','PageController@index');

