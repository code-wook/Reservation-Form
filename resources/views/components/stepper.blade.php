<!-- Stepper Header -->
<div class="relative px-2 sm:px-4 md:px-0">

  <!-- Base line -->
  <div class="absolute top-4 sm:top-6 md:top-7 left-0 right-0 h-1 bg-gray-200 z-0 rounded-full"></div>

  <!-- Progress line -->
  <div class="stepper-line-progress absolute top-4 sm:top-6 md:top-7 left-0 h-1 bg-red-800 z-0 transition-all duration-300 rounded-full" style="width:0%"></div>

  <!-- Circles Row -->
  <div class="flex justify-between relative z-10 pointer-events-none">
    
    <!-- Step 1 -->
    <div class="flex flex-col items-center">
      <button type="button" class="stepper-step flex items-center justify-center w-8 h-8 sm:w-10 sm:h-10 md:w-12 md:h-12 text-xs sm:text-sm md:text-lg rounded-full border-2 border-[#991B1B] bg-red-800 text-white font-bold transition-all duration-300" data-step="0">
        1
      </button>
      <span class="mt-1 text-[9px] sm:text-[10px] md:text-xs text-center text-red-800">Reservation Date & Time</span>
    </div>

    <!-- Step 2 -->
    <div class="flex flex-col items-center">
      <button type="button" class="stepper-step flex items-center justify-center w-8 h-8 sm:w-10 sm:h-10 md:w-12 md:h-12 text-xs sm:text-sm md:text-lg rounded-full border-2 border-[#991B1B] bg-white text-[#991B1B] font-bold transition-all duration-300" data-step="1">
        2
      </button>
      <span class="mt-1 text-[9px] sm:text-[10px] md:text-xs text-center text-red-800">Details & Equipment</span>
    </div>

    <!-- Step 3 -->
    <div class="flex flex-col items-center">
      <button type="button" class="stepper-step flex items-center justify-center w-8 h-8 sm:w-10 sm:h-10 md:w-12 md:h-12 text-xs sm:text-sm md:text-lg rounded-full border-2 border-[#991B1B] bg-white text-[#991B1B] font-bold transition-all duration-300" data-step="2">
        3
      </button>
      <span class="mt-1 text-[9px] sm:text-[10px] md:text-xs text-center text-red-800">Personal Information</span>
    </div>

    <!-- Step 4 -->
    <div class="flex flex-col items-center">
      <button type="button" class="stepper-step flex items-center justify-center w-8 h-8 sm:w-10 sm:h-10 md:w-12 md:h-12 text-xs sm:text-sm md:text-lg rounded-full border-2 border-[#991B1B] bg-white text-[#991B1B] font-bold transition-all duration-300" data-step="3">
        4
      </button>
      <span class="mt-1 text-[9px] sm:text-[10px] md:text-xs text-center text-red-800">Review & Consent</span>
    </div>

  </div>
</div>