<?php

use App\Http\Controllers\Api\RoomAvailabilityController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Room Availability API Routes
Route::prefix('rooms')->group(function () {
    Route::post('/check-availability', [RoomAvailabilityController::class, 'checkAvailability'])
        ->name('api.rooms.check-availability');
    
    Route::get('/available', [RoomAvailabilityController::class, 'getAllRooms'])
        ->name('api.rooms.available');
    
    Route::post('/validate-booking', [RoomAvailabilityController::class, 'validateBooking'])
        ->name('api.rooms.validate-booking');
    
    Route::get('/{id}/details', [RoomAvailabilityController::class, 'getRoomDetails'])
        ->name('api.rooms.details');
});