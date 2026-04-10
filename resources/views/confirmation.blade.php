@extends('layouts.form')

@section('title', 'Reservation Confirmed')

@section('content')
<div class="flex flex-col items-center justify-center min-h-[70vh] text-center py-12 px-4 sm:py-16 sm:px-6 lg:px-8">
    <!-- Green circle with check -->
    <div class="w-24 h-24 sm:w-36 sm:h-36 rounded-full bg-green-500 flex items-center justify-center mb-6 sm:mb-8 shadow-xl">
        <i class="fas fa-check text-white text-5xl sm:text-7xl"></i>
    </div>

    <!-- Success text -->
    <h1 class="text-2xl sm:text-4xl font-bold text-gray-900 mb-2 sm:mb-3">Success!</h1>
    <p class="text-gray-700 text-base sm:text-lg max-w-xs sm:max-w-md mb-3 sm:mb-4">
        Thank you! Your reservation has been confirmed.
    </p>


</div>
@endsection