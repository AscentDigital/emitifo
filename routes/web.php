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

Route::get('/', 'SessionsController@login');
Route::post('/', 'SessionsController@sigin');
Route::get('/logout', 'SessionsController@destroy');
Route::get('/register', 'SessionsController@create');

Route::get('/messages', 'MessagesController@show');
Route::get('/messages/create', 'MessagesController@create');
Route::post('/messages/create', 'MessagesController@store');
Route::get('/messages/{message}/logs', 'MessagesController@smslist');


Route::get('/campaign', 'CampaignsController@show');
Route::get('/campaign/create', 'CampaignsController@create');
Route::post('/campaign/create', 'CampaignsController@store');

Route::get('/keyword', 'KeywordsController@show');
Route::get('/keyword/create', 'KeywordsController@create');
Route::post('/keyword/create', 'KeywordsController@store');


Route::get('/subscribers', 'SubscribersController@show');

Route::get('/dashboard','DashboardController@show');

Route::get('/admin/', 'AdminHomeController@show');

Route::get('/admin/companies/create', 'CompaniesController@create');
Route::post('/admin/companies/create', 'CompaniesController@store');
Route::get('/admin/companies/{company}/edit', 'CompaniesController@edit');
Route::patch('/admin/companies/{company}/edit', 'CompaniesController@update');
Route::get('/admin/companies/', 'CompaniesController@show');

Route::get('/profile/', 'ProfileController@show');

Route::get('/company/', 'CompanyController@show');
