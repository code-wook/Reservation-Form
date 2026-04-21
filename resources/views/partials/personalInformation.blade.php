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
    <div class="flex flex-col md:flex-row md:gap-16 space-y-4 md:space-y-0">

      <!-- Contact Number -->
      <div class="flex flex-col w-full md:w-48">
        <label class="block font-semibold text-gray-800 text-sm">
          Contact No. <span class="text-red-600">*</span>
        </label>
        <input type="tel" name="contactNumber"
               pattern="[0-9]*"
               inputmode="numeric" 
               maxlength="11"
               placeholder="Enter your contact number" 
               required
               class="border border-gray-300 rounded px-3 py-2 text-sm w-full 
                      focus:outline-none focus:ring-2 focus:ring-red-800 focus:border-red-800">
        <p class="text-gray-500 text-xs mt-1 italic">(e.g., 091XXXXXXXX)</p>
      </div>

<!-- Email -->
<div class="flex flex-col w-full md:w-80">
  <label class="block font-semibold text-gray-800 text-sm">
    Email <span class="text-red-600">*</span>
  </label>
  <div class="flex items-center border border-gray-300 rounded px-3 py-2 gap-2 w-full focus-within:ring-2 focus-within:ring-red-800">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-red-900" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l9 6 9-6M4 6h16a2 2 0 012 2v10a2 2 0 01-2 2H4a2 2 0 01-2-2V8a2 2 0 012-2z" />
    </svg>
    <input type="email" name="email" placeholder="Enter your email" required class="flex-1 bg-transparent text-sm focus:outline-none">
  </div>
  <p class="text-gray-500 text-xs mt-1 italic">(e.g., name@example.com)</p>
</div>


    </div>

    <!-- Organization -->
    <div class="flex flex-col w-full md:w-96">
      <label class="font-sans block font-semibold text-gray-800 text-sm">
        Organization or Company Name <span class="text-red-600">*</span>
      </label>
      <textarea rows="2" name="organization" placeholder="Enter organization details" required
                class="border border-gray-300 rounded px-3 py-2 text-sm w-full focus:outline-none focus:ring-2 focus:ring-red-800 focus:border-red-800"></textarea>
      <p class="text-gray-500 text-xs mt-1 mb-4 italic">(e.g., University of Cebu, ITC Department)</p>
    </div>

  </div>

</x-section-box>

<!-- ================= I HEREBY CERTIFY ================= -->
<x-section-box>
  <button type="button" id="certifyToggle" class="w-full relative flex items-center px-6 py-6 font-sans font-semibold bg-red-800 text-white text-sm">
    <span class="flex-1 text-center text-lg sm:text-xl font-bold">
      Certification and Consent
    </span>
    <span id="certifyArrow" class="w-6 h-6 flex items-center justify-center border border-red-800 rounded text-sm">
      &gt; <!-- default expanded -->
    </span>
  </button>

  <hr class="border-0 border-t border-red-800">

  <div id="certifyContent" class="px-8 py-6 space-y-4">
    <p class="text-sm text-gray-800">
      I hereby certify that:
    </p>

      <!-- ================= I HEREBY CERTIFY ================= -->
      <x-consent-container id="certify" title="I hereby certify">
        <span class="text-red-600">*</span>
        <x-personal-checkbox name="certifyEmail" required text="That the <strong>EMAIL</strong> entered above is used to send information regarding my request. I understand that my request cannot be processed if an incorrect email is provided. I will check my email for the status of this request, including the amount to pay (if necessary).<br><br>That over-the-counter payments should be made during office hours only: <strong>Mondays – Fridays, 8:00 AM – 5:00 PM</strong>.<br><br>That for online payments, I will visit the <strong>UP Cebu website</strong> and click <strong>Online Forms Payment Forms</strong>." />

        <span class="text-red-600">*</span>
        <x-personal-checkbox name="certifyInfo" required text="That all information given above is true and correct." />

        <span class="text-red-600">*</span>
        <x-personal-checkbox name="consentData" required text="The personal information will be used by the <strong>University</strong> to process such requests. Therefore, I grant my consent to process the data pursuant to <strong>Data Privacy Act of 2012 and other applicable laws.</strong> I understand that my request will not be processed if the information provided is erroneous or incomplete." />
      </x-consent-container>
    </div>
  </div>
</x-section-box>

