<div class="flex flex-col-reverse sm:flex-row justify-center sm:justify-between w-full sm:w-2/3 mx-auto mt-8 gap-4 sm:gap-8">
    
    <!-- BACK BUTTON -->
    <button type="button"
        class="w-full sm:w-48 text-center py-3 rounded-full border-2 border-red-600 
        text-red-800 font-semibold bg-white mb-4 btn-back transition-all">
        {{ $backText ?? 'Return' }}
    </button>

    <!-- NEXT / SUBMIT BUTTON (controlled by JS) -->
    <button type="button" 
        class="w-full sm:w-48 py-3 rounded-full border-2 border-red-600 
               text-white font-semibold bg-red-800 mb-4 next-btn 
               transition-all duration-200"
        id="nextBtn">
        Next
    </button>

</div>