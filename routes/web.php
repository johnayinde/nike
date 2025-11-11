<?php

use App\Http\Controllers\AdminBookingController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\BookingPaymentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\GuestsController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SiteBlogController;
use App\Http\Controllers\SiteContactController;
use App\Http\Controllers\SiteGalleryController;
use App\Http\Controllers\UserController;
use App\Http\Webhooks\WebhookController;
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



// Route::get('/admin/home', 'HomeController@index')->name('admin.home');
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


Route::get('/contact', [SiteContactController::class,'index'])->name('contact');
Route::post('/contact', [SiteContactController::class,'create'])->name('contact_msg');
Route::get('/gallery', [SiteGalleryController::class,'index'])->name('gallery');
Route::get('/admin/gallery', [GalleryController::class, 'index'])->name('admin.gallery');
Route::post('/admin/gallery', [GalleryController::class, 'create'])->name('upload_img');
Route::patch('/admin/update_image/{id}', [GalleryController::class, 'update'])->name('gallery_update');
Route::get('admin/delete_img/{id}/{image}', [GalleryController::class, 'destroy'])->name('delete_img');
Route::get('/booking', [BookingController::class, 'index'])->name('booking');
Route::match(['GET', 'POST'],'/payment', [BookingController::class, 'initialize'])->name('payment');
Route::get('/payment/callback', [BookingController::class, 'callback'])->name('payment.callback');

// Paystack Webhook
Route::post('/webhooks/paystack', [WebhookController::class, 'handlePaystackWebhook'])
    ->name('webhooks.paystack')
    ->withoutMiddleware(['web', 'csrf']);

Route::get('/payment/process/{booking}', [BookingController::class, 'processPayment'])->name('payment.process');
Route::post('/booking/{booking}/send-payment-link', [BookingPaymentController::class, 'sendPaymentLink'])
    ->middleware('throttle:5,1')
    ->name('booking.send-payment-link');
Route::patch('/update_profile', [UserController::class, 'update'])->name('update_profile');
Route::patch('/password', [UserController::class, 'password'])->name('password');
Route::post('/search', [SearchController::class, 'search'])->name('search');
Route::get('/blog', [SiteBlogController::class, 'index'])->name('blog');
Route::get('/blog_details', [SiteBlogController::class, 'view'])->name('blog_details');
Route::get('/admin/blog', [BlogController::class, 'index'])->name('admin_blog');
Route::post('/admin/blog', [BlogController::class, 'create'])->name('upload_blog');
Route::patch('/admin/update_blog/{id}', [BlogController::class, 'update'])->name('blog_update');
Route::get('admin/blog/delete/{id}',[BlogController::class, 'destroy'])->name('delete_blog');
Route::get('/admin/admin', [AdminController::class, 'index'])->name('admin');
Route::post('admin/admin', [AdminController::class, 'create'])->name('new_admin');
Route::patch('/admin/update/{id}', [AdminController::class, 'update'])->name('update_admin');
Route::get('/admin/delete/{id}',[AdminController::class, 'destroy'])->name('delete');
Route::get('admin/profile', [UserController::class, 'index'])->name('profile');
Route::patch('admin/change_profile', [UserController::class, 'update'])->name('change_profile');
Route::post('admin/password', [UserController::class, 'password'])->name('password');
Route::get('admin/guests', [GuestsController::class, 'index'])->name('guests');
Route::post('admin/new_guest', [GuestsController::class, 'create'])->name('new_guest');
Route::get('/admin/delete_guest/{id}',[GuestsController::class, 'destroy'])->name('delete_guest');
Route::get('/admin/bookings',[AdminBookingController::class, 'index'])->name('bookings');
Route::post('/admin/new_booking',[AdminBookingController::class, 'create'])->name('new_booking');
Route::patch('/admin/post_booking/{id}',[AdminBookingController::class, 'post'])->name('post_booking');
Route::patch('/admin/cancel_booking/{id}',[AdminBookingController::class, 'cancel'])->name('cancel_booking');
Route::patch('/admin/unpay_booking/{id}',[AdminBookingController::class, 'unpay'])->name('unpay_booking');
Route::get('/admin/messages', [ContactController::class, 'index'])->name('messages');
Route::get('/admin/delete_msg/{id}',[ContactController::class, 'destroy'])->name('delete_msg');

