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

Route::get('/', 'HomeController@index')->name('home');

Route::get('dashboard', function () {
    return view('dashboard');
});

Route::get('/advertisement/payment', function () {
    return view('advertisement.payment');
});

Route::get('/advertisement', 'AdvertisementController@create')->name('advertisementCreate');

Route::put('/advertisements/activate/{id}', 'AdvertisementController@activate')->name('advertisementActivate');

Route::put('/advertisements/deactivate/{id}', 'AdvertisementController@deactivate')->name('advertisementDeactivate');

Route::middleware(['auth'])->get('/advertisements', 'AdvertisementController@index')->name('advertisementIndex');

Route::middleware(['auth'])->get('/categories', 'CategoryController@index')->name('categoryIndex');

Route::middleware(['auth'])->get('/banners', 'BannerController@index')->name('bannerIndex');

Route::post('/advertisement/submit', 'AdvertisementController@submit')->name('advertisementSubmit');

Route::post('/category/submit', 'CategoryController@submit')->name('categorySubmit');

Route::delete('/category/delete/{id}', 'CategoryController@delete')->name('categoryDelete');

Route::get('/category/{id}', 'CategoryController@getCategorySingle')->name('categorySingle');

Route::get('/advertisement/{id}', 'AdvertisementController@getAdvertisementSingle')->name('advertisementSingle');

Route::post('/banner/submit', 'BannerController@submit')->name('bannerSubmit');

Route::delete('/banner/delete/{id}', 'BannerController@delete')->name('bannerDelete');

Route::post('/contacts/submit', 'ContactController@submit')->name('contactsSubmit');

Auth::routes(['register' => false]);

// Route::get('/home', 'HomeController@index')->name('home');
