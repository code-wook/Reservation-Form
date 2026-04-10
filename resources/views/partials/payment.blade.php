<x-section-box class="accordion border-0 border-t border-red-800 rounded-lg bg-gray-50">

  <button type="button" 
      class="w-full relative flex items-center px-6 py-6 font-sans font-semibold bg-red-800 text-white text-sm">
      
      <span class="flex-1 text-center text-lg sm:text-xl font-bold">
          Payment Method
      </span>

      <span class="arrow flex-shrink-0 w-6 h-6 
                   border border-red-800 rounded text-sm 
                   flex items-center justify-center">
          &gt;
      </span>
  </button>

  <hr class="border-0 border-t border-red-800">

  <!-- Table-like Container -->
  <div class="px-6 py-4 space-y-3">

    <!-- Row -->
    <!-- GCash Row with logo -->
<label class="flex items-center justify-between border border-gray-300 rounded px-4 py-3 bg-white">
  <div class="flex items-center space-x-3">
    <input type="radio" name="payment_method" value="gcash" class="form-radio h-4 w-4 text-red-600 accent-red-800">
    <span class="font-sans text-sm">GCash</span>
  </div>
  
  <!-- Logo -->
  <img src="https://upload.wikimedia.org/wikipedia/commons/5/52/GCash_logo.svg" alt="GCash Logo" class="h-6 w-auto">
</label>


    <!-- Row -->
    <label class="flex items-center justify-between border border-gray-300 rounded px-4 py-3 bg-white">
      <div class="flex items-center space-x-3">
        <input type="radio" name="payment_method" value="maya" class="form-radio h-4 w-4 text-red-600 accent-red-800">
        <span class="font-sans text-sm">Maya</span>
      </div>

      <img src="https://upload.wikimedia.org/wikipedia/commons/e/e6/Maya_logo.svg" alt="Maya Logo" class="h-6 w-auto">

    </label>

    <!-- Credit / Debit Card Row with multiple logos -->
<label class="flex items-center justify-between border border-gray-300 rounded px-4 py-3 bg-white">
  <div class="flex items-center space-x-3">
    <input type="radio" name="payment_method" value="card" class="form-radio h-4 w-4 text-red-600 accent-red-800">
    <span class="font-sans text-sm">Credit / Debit Card</span>
  </div>

  <!-- Logos container -->
  <div class="flex items-center space-x-2">
    <img src="https://upload.wikimedia.org/wikipedia/commons/5/5c/Visa_Inc._logo_%282021%E2%80%93present%29.svg" alt="Visa Logo" class="h-6 w-auto">
    <img src="https://upload.wikimedia.org/wikipedia/commons/2/2a/Mastercard-logo.svg" alt="Mastercard Logo" class="h-6 w-auto">
    <img src="https://upload.wikimedia.org/wikipedia/commons/f/fa/American_Express_logo_%282018%29.svg" alt="Amex Logo" class="h-6 w-auto">
  </div>
</label>


  </div>

</x-section-box>