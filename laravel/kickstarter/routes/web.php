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
Route::post('/projects/{project_id}/imageUpload', 'ImageUploadController@store')->name('imageUpload');
Route::get('/projects/{image_id}/imageDelete', 'ImageUploadController@delete')->name('imageDelete');
Route::post('/projects/{project_id}/reactieUpload', 'ReactieUploadController@store')->name('reactieUpload');
Route::get('/projects/{project_id}/makePdf', 'ProjectController@pdfmaker')->name('pdfmaker');
Route::get('/projects/{project_id}/kijker', 'ProjectController@kijker')->name('kijker');

Route::get('/news', 'NewsController@news');
Route::get('/news/create', 'NewsController@create')->name('createNews');
Route::post('/news/create/save', 'NewsController@save')->name('saveNews');
Route::get('/news/delete/{news_id}', 'NewsController@delete')->name('deleteNews');
Route::get('/news/edit/{news_id}', 'NewsController@edit')->name('editNews');
Route::post('/news/update/{news_id}', 'NewsController@update')->name('updateNews');

Route::get('/categorie/create', 'ProjectController@createCategorie')->name('createCategorie');
Route::post('/categorie/create/save', 'ProjectController@saveCategorie')->name('saveCategorie');
Route::get('/categorie/{categorie_id}', 'ProjectController@deleteCategorie')->name('categoryDelete');

Route::post('/user/update/{user_id}', 'UserController@update')->name('updateUser');
Route::get('/edituser/{user_id}', 'UserController@edit')->name('editUser');
Route::get('/registreer/{user_id}', 'UserController@delete')->name('deleteUser');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/contact', 'PagesController@contact');
Route::get('/about', 'PagesController@about');
Route::get('/privacy', 'PagesController@privacy');
Route::get('/account', 'PagesController@account');
Route::post('/account/{profiel_id}', 'UserController@store')->name('profileImage');

Route::get('/admin', 'AdminController@table');
Route::get('/admin/users', 'AdminController@users');
Route::get('/admin/projects', 'AdminController@projects');
Route::get('/admin/images', 'AdminController@images');
Route::get('/admin/news', 'AdminController@news');
Route::get('/admin/categorie', 'AdminController@category');
Route::get('/admin/donation', 'AdminController@donation');
Route::get('/admin/pages', 'AdminController@pages');
Route::get('/admin/reaction', 'AdminController@reaction');

Route::post('/stripe', 'PaymentController@postStripePayment')->name('stripe.post');
Route::get('/credits', 'PaymentController@getStripeForm');
Route::post('api/convert', 'APIController@postConvert')->name('api.convert');
Route::get('/reaction/{reaction_id}', 'ReactionController@deleteReaction')->name('reactionDelete');

Route::get('sendtestmail', 'MailController@sendMail');
Route::post('/contact', 'ContactMailController@send')->name('contactmail');

Auth::routes();
