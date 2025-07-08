<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\BookingConfirmationController;
use App\Http\Controllers\RoomsController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/services', function () {
    return view('services');
});


Route::prefix('rooms')->group(function () {
    Route::get('/', [RoomsController::class, 'index']);
    Route::get('/all', [RoomsController::class, 'all']);
    Route::get('/details/{room}', [RoomsController::class, 'details']);
    Route::get('/search', [RoomsController::class, 'searchAvailable']);
    Route::get('/types', [RoomsController::class, 'getRoomTypes']);
    Route::get('/amenities', [RoomsController::class, 'getAmenities']);
    Route::get('/price-range', [RoomsController::class, 'getPriceRange']);
    Route::get('/featured', [RoomsController::class, 'getFeaturedRooms']);
    Route::get('/compare', [RoomsController::class, 'compareRooms']);
    Route::get('/{room}', [RoomsController::class, 'show']);
    Route::get('/{room}/availability', [RoomsController::class, 'getAvailabilityCalendar']);
});

Route::post('/bookings', [BookingController::class, 'createBooking']);
Route::get('/bookings', [BookingController::class, 'getUserBookings']);
/*Route::middleware('auth:sanctum')->group(function () {
    // Booking routes
    
    Route::post('/bookings/{booking}/confirm', [BookingController::class, 'confirmBooking']);
    Route::post('/bookings/{booking}/cancel', [BookingController::class, 'cancelBooking']);
    
});*/

Route::prefix('payment')->group(function () {
    Route::get('/',[PaymentController::class,'index']);
});

 Route::get('/confirmation',[BookingConfirmationController::class,'index']);

Route::get('/user/{id}', function ($id) {
    return view('user', ['userId' => $id]);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
