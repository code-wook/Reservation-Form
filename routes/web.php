<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservationController;




 Route::get('/', [ReservationController::class, 'showViewPage'])->name('viewpage.form');
 Route::post('/viewpage', [ReservationController::class, 'submitReservation'])->name('viewpage.store');

 Route::get('/confirmation', function () {  return view('confirmation'); })->name('confirmation');
