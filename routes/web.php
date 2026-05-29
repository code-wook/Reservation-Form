<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservationController;


 Route::get('/', [ReservationController::class, 'showViewPage'])->name('viewpage.form');
 Route::post('/viewpage', [ReservationController::class, 'submitReservation'])->name('viewpage.store');
 Route::get('/rental-rates', function () {
    return view('partials.RentalRates');
})->name('rental-rates');
 Route::get('/confirmation', function () {

    // Prevent direct access
    if (!session('success')) {
        return redirect()->route('viewpage.form');
    }

    // Fully clear ALL reservation-related session data
    session()->forget([
        'reservation',
        'reservation.referenceNumber',
        'reservation.data',
        'form_token'
    ]);

    // Optional: regenerate session for safety
    session()->regenerate();

    return view('confirmation');
})->name('confirmation');