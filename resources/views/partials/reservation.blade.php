<x-UpLogo /> 

<!-- ========================= -->
<!-- TRANSACTION INFO -->
<!-- ========================= -->

<div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">

    <!-- Transaction Date and Time -->
    <div>
        <label class="block font-sans font-semibold text-sm mb-1">
            Transaction Date and Time
        </label>

        <input
            id="transactionDate"
            name="transactionDate"
            type="text"
            readonly
            class="w-full mb-4 rounded border-red-800 border px-2 py-1 bg-gray-100 text-gray-500 cursor-not-allowed h-8 icon-calendar focus:outline-none focus:ring-2 focus:ring-red-700"
        >
    </div>

    <!-- Reference Number -->
    <div>
        <label class="block font-sans font-semibold text-sm mb-1">
            Reference Number
        </label>

        <input
            type="text"
            id="referenceNumber"
            name="referenceNumber"
            value="{{ $referenceNumber ?? '' }}"
            readonly
            class="w-full border mb-4 border-red-800 rounded px-2 py-1 bg-gray-100 h-8 cursor-not-allowed focus:outline-none focus:ring-2 focus:ring-red-700"
        >
    </div>

</div>

<!-- ========================= -->
<!-- RESERVATION DATE SECTION -->
<!-- ========================= -->

<x-section-box>

    <!-- Reservation Accordion Button -->
    <button
        type="button"
        onclick="toggleReservation()"
        class="w-full flex justify-between items-center px-4 py-3 font-sans font-semibold text-sm bg-red-800 text-white"
    >
        <span>Select your reservation dates using the calendar</span>

        <span
            id="arrowReservation"
            class="arrow flex items-center justify-center w-7 h-7 border border-red-800 rounded-md text-sm transition-transform"
        >
            &gt;
        </span>
    </button>

    <hr class="border-0 border-t border-red-800">

    <!-- Reservation Content -->
    <div
        id="reservationContent"
        class="accordion-content px-4 sm:px-6 md:px-8 pb-6 mt-4 mb-6"
    >

        <h1 class="block text-sm font-semibold mb-6 py-2 text-gray-700 italic">
            Note: Reservations can only be made at least 4 days in advance from today. The maximum reservation period is 3 consecutive days.
        </h1>

        <div class="flex flex-col md:flex-row md:items-start md:justify-between gap-4 md:gap-6">

            <!-- Start & End Date -->
            <div class="flex flex-col md:flex-row gap-4">

                <!-- Start Date -->
                <div>
                    <label class="font-sans block text-sm font-semibold mb-1">
                        Start Date <span class="text-red-600 ml-1">*</span>
                    </label>

                    <input
                        id="startDate"
                        name="startDate"
                        type="date"
                        class="border rounded px-2 py-1 text-sm h-8 w-full sm:w-48 icon-calendar focus:outline-none focus:ring-2 focus:ring-red-800 focus:border-red-800"
                        required
                    >
                </div>

                <!-- End Date -->
                <div>
                    <label class="font-sans block text-sm font-semibold mb-1">
                        End Date <span class="text-red-600 ml-1">*</span>
                    </label>

                    <input
                        id="endDate"
                        name="endDate"
                        type="date"
                        class="border rounded px-2 py-1 text-sm h-8 w-full sm:w-48 icon-calendar focus:outline-none focus:ring-2 focus:ring-red-800 focus:border-red-800"
                        required
                    >
                </div>

            </div>
            <a href="https://docs.google.com/spreadsheets/d/1n-I--vksJnmhFeP11Q7TdubT-m2nPZAU/edit?usp=sharing"
               target="_blank"
               rel="noopener noreferrer"
               class="font-sans text-red-800 underline text-xs sm:text-sm md:self-end break-words"
             >
    UP Cebu Facilities and Other Equipment Calendar. Click CMO Forms then select Facilities Calendar.
</a>

        </div>
    </div>

    </x-section-box>

    <!-- TIME SECTION -->

<x-section-box id="timeSectionWrapper" class="hidden">


        <div id="timeSection" class= "border border-red-800 rounded-lg bg-gray-50 overflow-hidden transition-all duration-500 max-h-0 opacity-0">


        <!-- Time Accordion Button -->
        <button
            type="button"
            onclick="toggleTime()"
            class="w-full flex justify-between items-center px-3 sm:px-4 py-3 font-sans font-semibold text-sm bg-red-800 text-white"
        >
            <span>Select time of reservation (in 24-Hours format)</span>

            <span
                id="arrowTime"
                class="arrow flex items-center justify-center w-7 h-7 border border-red-800 rounded-md text-sm transition-transform"
            >
                &gt;
            </span>
        </button>

        <hr class="border-0 border-t border-red-800">

        <!-- Time Content -->
        <div
            id="timeContent"
            class="accordion-content px-4 sm:px-6 md:px-8 pb-6 mt-6 mb-6 grid grid-cols-1 sm:grid-cols-2 gap-4"
        >

            <!-- Start Time -->
            <div>
                <label class="block text-sm font-sans font-medium mb-1">
                    Start Time <span class="text-red-600 ml-1">*</span>
                </label>

                <input
                    type="text"
                    id="timeFrom"
                    name="timeFrom"
                    class="border rounded px-2 py-1 text-sm h-10 w-full sm:w-60 icon-clock validate-time focus:outline-none focus:ring-2 focus:ring-red-800 focus:border-red-800"
                    required
                >
            </div>

            <!-- End Time -->
            <div>
                <label class="block text-sm font-sans font-medium mb-1">
                    End Time <span class="text-red-600 ml-1">*</span>
                </label>

                <input
                    type="text"
                    id="timeTo"
                    name="timeTo"
                    class="border rounded px-2 py-1 text-sm h-10 w-full sm:w-60 icon-clock validate-time focus:outline-none focus:ring-2 focus:ring-red-800 focus:border-red-800"
                    required
                >
            </div>

        </div>

    </div>

  

</x-section-box>