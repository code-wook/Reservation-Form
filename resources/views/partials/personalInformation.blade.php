  <!-- ================= PERSONAL INFORMATION ================= -->
  <x-section-box>
    <button type="button" id="personalToggle"
            class="w-full relative flex items-center px-6 py-6 font-sans font-semibold bg-red-800 text-white text-sm">

        <span class="flex-1 text-center text-lg sm:text-xl font-bold">
            Personal Information
        </span>

        <!-- Arrow at right -->
        <span id="personalArrow"
              class="w-6 h-6 flex items-center justify-center
                    border border-red-800 rounded text-sm">
            &gt; <!-- default expanded -->
        </span>
    </button>

    <hr class="border-0 border-t border-red-800">

    <div id="personalContent" class="px-8 py-6 space-y-6">

      <!-- NAME ROW -->
      <div class="flex flex-col md:flex-row md:gap-16">

        <!-- Last Name -->
        <div class="flex flex-col mb-2 md:mb-0">
          <label class="block font-semibold text-gray-800 mb-1 mt-2 text-sm">
            Last Name <span class="text-red-600">*</span>
          </label>
          <input type="text" name="lastName" placeholder="Enter your last name" required
                class="border border-gray-300 rounded px-3 py-2 text-sm w-full md:w-48 
                        focus:outline-none focus:ring-2 focus:ring-red-800 focus:border-red-800">
          <p class="text-gray-500 text-xs mt-1 italic"></p>
        </div>

        <!-- First Name -->
        <div class="flex flex-col mb-2 md:mb-0">
          <label class="block font-semibold text-gray-800 mb-1 mt-2 text-sm">
            First Name <span class="text-red-600">*</span>
          </label>
          <input type="text" name="firstName" placeholder="Enter your first name" required
                class="border border-gray-300 rounded px-3 py-2 text-sm w-full md:w-48 
                        focus:outline-none focus:ring-2 focus:ring-red-800 focus:border-red-800">
          <p class="text-gray-500 text-xs mt-1 italic"></p>
        </div>

        <!-- Middle Initial -->
        <div class="flex flex-col">
          <label class="block font-semibold text-gray-800 mb-1 mt-2 text-sm">
            Middle Initial
          </label>
          <input type="text" name="middleName" placeholder="Enter middle initial"
                class="border border-gray-300 rounded px-3 py-2 text-sm w-full md:w-48 
                        focus:outline-none focus:ring-2 focus:ring-red-800 focus:border-red-800">
          <p class="text-gray-500 text-xs mt-1 italic">(Optional)</p>
        </div>

      </div>

      <!-- Contact Number and Email -->
<div class="w-full">

<label class="block font-bold text-red-800 text-lg mb-1">
  Contact Details <span class="text-red-600">*</span>
</label>
 
<p class="text-gray-500 text-xs italic mb-4">
  Provide at least one: Mobile Number or Telephone Number.
</p>

  <!-- Mobile + Telephone (SIDE BY SIDE) -->
  <div class="flex flex-col md:flex-row md:gap-16">

    <!-- Mobile Number -->
    <div class="flex flex-col w-full md:w-1/2">
      <label class="font-semibold text-gray-800 text-sm">
        Mobile Number 
      </label>

      <input type="tel" name="mobileNumber" id="mobileNumber"
        pattern="[0-9]*"
        inputmode="numeric"
        maxlength="11"
        placeholder="Enter mobile number"
        class="border border-gray-300 rounded px-3 py-2 text-sm w-full
        focus:outline-none focus:ring-2 focus:ring-red-800">

      <p class="text-gray-500 text-xs mt-1 italic">(e.g., 09XXXXXXXXX)</p>
    </div>

    <!-- Landline Number -->
    <div class="flex flex-col w-full md:w-1/2">
      <label class="font-semibold text-gray-800 text-sm">
        Landline Number
      </label>

      <input type="tel" name="landlineNumber" id="landlineNumber"
        inputmode="numeric"
        maxlength="11"
        pattern="[0-9]*"
        placeholder="Enter landline number"
        class="border border-gray-300 rounded px-3 py-2 text-sm w-full
               focus:outline-none focus:ring-2 focus:ring-red-800">

      <p class="text-gray-500 text-xs mt-1 italic">
         (e.g., 02XXXXXXXXX or 032XXXXXXX)
      </p>
    </div>

  </div>

<!-- Email (HALF WIDTH BELOW) -->
<!-- Email ROW (same structure as mobile/telephone) -->
<div class="flex flex-col md:flex-row md:gap-16 mt-4">

  <div class="flex flex-col w-full md:w-1/2">
    <label class="font-semibold text-gray-800 text-sm">
      Email <span class="text-red-600">*</span>
    </label>

    <div class="flex items-center border border-gray-300 rounded px-3 py-2 gap-2 w-full focus-within:ring-2 focus-within:ring-red-800">
      
      <!-- Envelope Icon -->
      <svg xmlns="http://www.w3.org/2000/svg" 
           class="w-5 h-5 text-red-900" 
           fill="none" 
           viewBox="0 0 24 24" 
           stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" 
              d="M3 8l9 6 9-6M4 6h16a2 2 0 012 2v10a2 2 0 01-2 2H4a2 2 0 01-2-2V8a2 2 012-2z" />
      </svg>

      <input type="email" name="email"
        placeholder="Enter your email"
        required
        class="flex-1 bg-transparent text-sm focus:outline-none">
    </div>

    <p class="text-gray-500 text-xs mt-1 italic">(e.g., name@example.com)</p>
  </div>

</div>

<!-- ================= ORGANIZATION ================= -->
<div class="flex flex-col mt-6">
  <label class="font-semibold text-gray-800 text-sm">
    Organization or Company Name <span class="text-red-600">*</span>
  </label>

  <!-- Blade Component -->
  <x-organization />

</div>
  </div>

</div>

  </x-section-box>

  <script>
document.addEventListener('DOMContentLoaded', function () {

    const select = document.getElementById('organizationSelect');
    const container = document.getElementById('otherOrganizationContainer');
    const input = document.getElementById('otherOrganizationInput');

    if (!select) return;

    select.addEventListener('change', function () {
        if (this.value === 'others') {
            container.classList.remove('hidden');
            input.setAttribute('required', true);
        } else {
            container.classList.add('hidden');
            input.removeAttribute('required');
            input.value = '';
        }
    });

});
</script>