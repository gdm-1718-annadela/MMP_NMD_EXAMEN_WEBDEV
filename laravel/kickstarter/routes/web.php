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


Route::get('/', 'PagesController@home');

Route::get('/projects', 'ProjectController@projects');
Route::get('/projects/create', 'ProjectController@createProject')->name('createProject');
Route::post('/projects/create/save', 'ProjectController@saveProject')->name('saveProject');
Route::get('/projects/edit/{project_id}', 'ProjectController@editProject')->name('editProject');
Route::patch('/projects/update/{project_id}', 'ProjectController@updateProject')->name('updateProject');
Route::get('/projects/delete/{project_id}', 'ProjectController@deleteProject')->name('deleteProject');
Route::get('/projects/{project_id}', 'ProjectController@detailProject')->name('detailProject');
Route::get('/projects/{project_id}/doneren', 'ProjectController@donateProject')->name('donateProject');

Route::get('/news', 'PagesController@news');
Route::get('/news/{artikel_id}', 'PagesController@getDetail');

Route::get('/about', 'PagesController@about');
Route::get('/contact', 'PagesController@contact');
Route::post('/contact', 'ContactMailController@send')->name('contactmail');
Route::get('/privacy', 'PagesController@privacy');
Route::get('/account', 'PagesController@account');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/credits', 'PaymentController@getStripeForm');
Route::post('/stripe', 'PaymentController@postStripePayment')->name('stripe.post');

Route::post('api/convert', 'APIController@postConvert')->name('api.convert');

Route::post('/projects/{project_id}/imageUpload', 'ImageUploadController@store')->name('imageUpload');
Route::post('/account/{profiel_id}/profileImage', 'UserController@store')->name('profileImage');

Route::get('/projects/{image_id}/imageDelete', 'ImageUploadController@delete')->name('imageDelete');
Route::post('/projects/{project_id}/reactieUpload', 'ReactieUploadController@store')->name('reactieUpload');

Route::get('sendtestmail', 'MailController@sendMail');

Route::get('/projects/{project_id}/makePdf', 'ProjectController@pdfmaker')->name('pdfmaker');

Route::get('/projects/{project_id}/kijker', 'ProjectController@kijker')->name('kijker');
Auth::routes();