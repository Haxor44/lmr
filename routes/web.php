<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\BookingConfirmationController;
use App\Http\Controllers\RoomsController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PesapalPaymentController;
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
Route::get('/emails', [BookingController::class, 'sendBookingConfirmation']);
Route::get('/mybookings', [BookingController::class, 'getUserBookings']);
Route::get('/bookings', [BookingController::class, 'showUserBookings']);
Route::get('/pay', [BookingController::class, 'makePayment']);
Route::get('/transaction', [BookingController::class, 'getTransaction']);
/*Route::middleware('auth:sanctum')->group(function () {
    // Booking routes
    
    Route::post('/bookings/{booking}/confirm', [BookingController::class, 'confirmBooking']);
    Route::post('/bookings/{booking}/cancel', [BookingController::class, 'cancelBooking']);
    
});*/

// Pesapal Payment Routes
Route::prefix('payments')->group(function () {
    Route::get('/{booking}/show', [PesapalPaymentController::class, 'show'])->name('payments.show');
    Route::post('/{booking}/initiate', [PesapalPaymentController::class, 'initiate'])->name('payments.initiate');
    Route::get('/callback', [PesapalPaymentController::class, 'callback'])->name('payments.callback');
    Route::post('/ipn', [PesapalPaymentController::class, 'ipn'])->name('payments.ipn');
    Route::get('/status/{orderTrackingId}', [PesapalPaymentController::class, 'checkStatus'])->name('payments.status');
    Route::post('/{payment}/refund', [PesapalPaymentController::class, 'requestRefund'])->name('payments.refund');
    Route::get('/history', [PesapalPaymentController::class, 'history'])->name('payments.history');
    
    // Keep old payment controller for backward compatibility
    Route::get('/',[PaymentController::class,'index'])->name('payments.index');
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
