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


// Route::get('/home', function () {
//     return view('Home');
// });



//redirect
Route::get('/', 'HomeController@home');
Route::get('/home', 'HomeController@home')->name('home');
Route::get('/aboutus', 'HomeController@aboutus')->name('aboutus');
Route::get('/blog', 'HomeController@blog')->name('blog');
Route::get('/post', 'HomeController@post')->name('post');
//contact
Route::get('/contact', 'HomeController@contact')->name('contact');
Route::post('/contact/send', 'HomeController@send')->name('contact.send');
//register
Route::get('/register', 'RegisterController@register')->name('register');
Route::post('/register/check', 'RegisterController@check')->name('register.check');
//login
Route::get('/login', 'LoginController@login')->name('login');
Route::post('/login/check', 'LoginController@check')->name('login.check');
//logged in- edit profile
Route::get('/updateprofile', 'ProfileController@updateprofile')->name('updateprofile');
Route::post('/updateprofile/check', 'ProfileController@check')->name('updateprofile.check');
//logout
Route::get('/logout','LoginController@logout')->name('logout');
Route::get('file-upload', 'FileUploadController@fileUpload')->name('file.upload');
Route::post('file-upload/create', 'FileUploadController@fileUploadPost')->name('file.upload.post');
Route::post('file-upload/delete', 'FileUploadController@delete')->name('file.upload.delete');
//forgot reset pass
Route::get('/forgotpass', 'ForgotResetAccController@forgotpass')->name('forgotpass');
Route::post('/resetpass1', 'ForgotResetAccController@check')->name('forgotpass.check');
Route::get('/resetpass', 'ForgotResetAccController@resetpass')->name('forgotpass.resetpass');
 Route::post('/setnewpass','ForgotResetAccController@setnewpass')->name('setnewpass');

Route::post('/spec_cate/postcreate', 'Spec_CateController@postcreate')->name('spec_cate.postcreate');
Route::post('/spec_cate/postdelete', 'Spec_CateController@postdelete')->name('spec_cate.postdelete');
Route::post('/likepost', 'Spec_PostController@likepost')->name('likepost');
Route::post('/unlikepost', 'Spec_PostController@unlikepost')->name('unlikepost');

Route::post('/commentdelete', 'Spec_PostController@commentdelete')->name('commentdelete');
//specific post
Route::resource('spec_post', 'Spec_PostController');
Route::resource('spec_category', 'Spec_CateController');
