<!-- ================= AGREEMENT ================= -->
<x-section-box>
  <button type="button" id="certifyToggle" class="w-full relative flex items-center px-6 py-6 font-sans font-semibold bg-red-800 text-white text-sm">
    
    <span class="flex-1 text-center text-lg sm:text-xl font-bold">
      Agreement
    </span>

    <span id="certifyArrow" class="w-6 h-6 flex items-center justify-center border border-red-800 rounded text-sm">
      &gt;
    </span>

  </button>

  <hr class="border-0 border-t border-red-800">

  <div id="certifyContent" class="px-8 py-6 space-y-4">

    <!--  Helper / Instruction Text -->
   <p class="text-sm text-gray-600 italic text-center">
  Please read the statements below and check all required boxes to proceed with your reservation.
</p>

    <x-consent-container id="certify" title="">

      <x-personal-checkbox 
          name="certifyEmail" 
          required 
          text="That the <strong>EMAIL</strong> entered above is used to send information regarding my request. I understand that my request cannot be processed if an incorrect email is provided. I will check my email for the status of this request, including the amount to pay (if necessary).<br><br>That over-the-counter payments should be made during office hours only: <strong>Mondays – Fridays, 8:00 AM – 5:00 PM</strong>.<br><br>That for online payments, I will visit the <strong>UP Cebu website</strong> and click <strong>Online Forms Payment Forms</strong>."
      />

      <x-personal-checkbox 
          name="certifyInfo" 
          required 
          text="That all information given above is true and correct."
      />

      <x-personal-checkbox 
          name="consentData" 
          required 
          text="The personal information will be used by the <strong>University</strong> to process such requests. Therefore, I grant my consent to process the data pursuant to <strong>Data Privacy Act of 2012 and other applicable laws.</strong> I understand that my request will not be processed if the information provided is erroneous or incomplete."
      />

    </x-consent-container>

  </div>
</x-section-box>