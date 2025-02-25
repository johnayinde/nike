<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');





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



Route::get('/admin/home', 'HomeController@index')->name('home');
Route::get('/about', function () {
    return view('about');
});
Route::get('/superior', function () {
    return view('superior');
});
Route::get('/superior_double', function () {
    return view('superior_double');
});
Route::get('/executive', function () {
    return view('executive');
});
Route::get('/diplomatic', function () {
    return view('diplomatic');
});
Route::get('/presidential', function () {
    return view('presidential');
});
Route::get('/self_catering', function () {
    return view('self_catering');
});
Route::get('/facilities', function () {
    return view('facilities');
});
Route::get('/conferencing', function () {
    return view('conferencing');
});
Route::get('/packages', function () {
    return view('packages');
});
Route::get('/menus', function () {
    return view('menus');
});


Route::get('/contact', 'SiteContactController@index')->name('contact');
Route::post('/contact', 'SiteContactController@create')->name('contact_msg');
Route::get('/gallery', 'SiteGalleryController@index')->name('gallery');
Route::get('/admin/gallery', 'GalleryController@index')->name('gallery');
Route::post('/admin/gallery', 'GalleryController@create')->name('upload_img');
Route::patch('/admin/update_image/{id}', 'GalleryController@update')->name('gallery_update');
Route::get('admin/delete_img/{id}/{image}','GalleryController@destroy')->name('delete_img');
Route::get('/booking', 'BookingController@index')->name('booking');
Route::match(['GET', 'POST'],'/payment', 'BookingController@initialize')->name('payment');
Route::get('/rave/callback', 'BookingController@callback')->name('callback');
Route::patch('/update_profile', 'UserController@update')->name('update_profile');
Route::patch('/password', 'UserController@password')->name('password');
Route::post('/search', 'SearchController@search')->name('search');
Route::get('/blog', 'SiteBlogController@index')->name('blog');
Route::get('/blog_details', 'SiteBlogController@view')->name('blog_details');
Route::get('/admin/blog', 'BlogController@index')->name('admin_blog');
Route::post('/admin/blog', 'BlogController@create')->name('upload_blog');
Route::patch('/admin/update_blog/{id}', 'BlogController@update')->name('blog_update');
Route::get('admin/blog/delete/{id}','BlogController@destroy')->name('delete_blog');
Route::get('/admin/admin', 'AdminController@index')->name('admin');
Route::post('admin/admin', 'AdminController@create')->name('new_admin');
Route::patch('/admin/update/{id}', 'AdminController@update')->name('update_admin');
Route::get('/admin/delete/{id}','AdminController@destroy')->name('delete');
Route::get('admin/profile', 'UserController@index')->name('profile');
Route::patch('admin/change_profile', 'UserController@update')->name('change_profile');
Route::post('admin/password', 'UserController@password')->name('password');
Route::get('admin/guests', 'GuestsController@index')->name('guests');
Route::post('admin/new_guest', 'GuestsController@create')->name('new_guest');
Route::get('/admin/delete_guest/{id}','GuestsController@destroy')->name('delete_guest');
Route::get('/admin/bookings','AdminBookingController@index')->name('bookings');
Route::post('/admin/new_booking','AdminBookingController@create')->name('new_booking');
Route::patch('/admin/post_booking/{id}','AdminBookingController@post')->name('post_booking');
Route::patch('/admin/cancel_booking/{id}','AdminBookingController@cancel')->name('cancel_booking');
Route::patch('/admin/unpay_booking/{id}','AdminBookingController@unpay')->name('unpay_booking');
Route::get('/admin/messages','ContactController@index')->name('messages');
Route::get('/admin/delete_msg/{id}','ContactController@destroy')->name('delete_msg');

