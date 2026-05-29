<!-- ========================= -->
<!-- SINGLE ACCORDION BOX: RESERVATION DETAILS -->
<!-- ========================= -->

<x-section-box class="accordion border-0 border-t border-red-800 rounded-lg bg-gray-50">

    <!-- HEADER BUTTON -->
    <button type="button"
        class="accordion-btn w-full relative flex items-center px-6 py-6 font-sans font-semibold bg-red-800 text-white text-sm">

        <span class="flex-1 text-center text-lg sm:text-xl font-bold">
            Reservation Details
        </span>

        <span class="arrow flex-shrink-0 w-6 h-6 
                     border border-red-800 rounded text-sm 
                     flex items-center justify-center bg-red-800 text-white">
            &gt;
        </span>
    </button>

    <hr class="border-0 border-t border-red-800">

    <!-- CONTENT WRAPPER -->
    <div class="accordion-content px-3 sm:px-6 pb-6">

        <!-- ========================= -->
<!-- FACILITY + SEARCH ROW -->
<!-- ========================= -->

<div class="mt-3 pb-2 sm:pb-8 px-3 sm:px-6">

  <!-- GRID ROW -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-start">

    <!-- FACILITY -->
    <div class="space-y-2">

        <label class="block text-sm font-semibold">
            Select Facility <span class="text-red-600">*</span>
        </label>

        <x-facility-input />

    </div>

    <!-- NEED EQUIPMENT -->
    <div class="space-y-2">

        <label class="block text-sm font-semibold">
            Do you need Equipment?
        </label>

        <div class="flex items-center gap-6 mt-2">

            <label class="flex items-center gap-2 text-sm">
                <input
                    type="radio"
                    name="needSearchEquipment"
                    value="yes"
                >
                Yes
            </label>

            <label class="flex items-center gap-2 text-sm">
                <input
                    type="radio"
                    name="needSearchEquipment"
                    value="no"
                    checked
                >
                No
            </label>

        </div>

    </div>

</div>

<!-- SEARCH EQUIPMENT -->
<div
    id="searchEquipmentWrapper"
    class="hidden mt-6"
>

    <div class="space-y-2">

        <label class="block text-sm font-semibold">
            Search Equipment
        </label>

        <div class="flex gap-2 items-center">

            <input
                id="equipmentSearchInput"
                type="text"
                placeholder="Search equipment..."
                class="w-full border rounded-md px-3 py-2 text-sm bg-white focus:outline-none focus:ring-2 focus:ring-red-700 focus:border-red-700"
            />

            <button
                type="button"
                id="equipmentSearchBtn"
                class="bg-red-800 text-white px-4 py-2 rounded text-sm h-[38px] hover:bg-red-900 whitespace-nowrap"
            >
                Search
            </button>

        </div>

        <p class="text-xs text-gray-500 italic mt-1">
            Use search to check which facilities include the equipment you need.
        </p>

    </div>

</div>
</div>

<!-- RESULTS -->
<div id="equipmentSearchResults" class="hidden px-3 sm:px-6 mt-6 pb-6">
    <div class="w-full flex justify-center">

        <!-- narrower container -->
        <div class="w-full max-w-3xl">

            <h4 class="font-semibold text-sm mb-6 ">
                Search Results
            </h4>

            <div class="flex justify-center">
                <table class="w-full border text-sm">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border px-2 py-1">Facility Name</th>
                            <th class="border px-2 py-1">Quantity</th>
                            <th class="border px-2 py-1">Other Equipment</th>
                        </tr>
                    </thead>

                    <tbody id="equipmentSearchTableBody"></tbody>
                </table>
            </div>

        </div>

    </div>
</div>
        <hr class="border-0 border-t border-red-800">

        <!-- ========================= -->
        <!-- PURPOSE -->
        <!-- ========================= -->
        <div class="mt-3 pb-2 sm:pb-4 px-3 sm:px-6">
            <h2 class="font-sans font-semibold text-sm sm:text-base px-3 sm:px-6 py-1 sm:py-2 mb-2">
                State the purpose of your request which includes the type of activity (ex. API),
                whether free use, in partnership with outside org., fund source, etc.
                <span class="text-red-600 ml-1">*</span>
            </h2>

            <x-accordion-textarea name="purpose"
                class="focus:outline-none focus:ring-2 focus:ring-red-700" />
        </div>

        <hr class="border-0 border-t border-red-800">

        <!-- ========================= -->
        <!-- OTHER EQUIPMENT -->
        <!-- ========================= -->
        <div class="mt-3 pb-2 sm:pb-4 px-3 sm:px-6">

            <h2 class="font-sans font-semibold text-sm sm:text-base px-3 sm:px-6 py-1 sm:py-2 mb-2">
                Do you need other equipment?
                (Please see the approved rental rates and inclusive equipment use package for each venue.
                Subject to rental computation)
                <span class="text-red-600 ml-1">*</span>
            </h2>
           <p class="text-xs sm:text-sm text-gray-600 italic px-3 sm:px-6 mb-3">
    <a href="{{ route('rental-rates') }}"
       target="_blank"
       rel="noopener noreferrer"
       class="text-red-800 font-semibold underline hover:text-red-900 mb-6">
        General Guidelines on Use of Facilities, Equipment & Vehicles with 10% RENTAL INCREASE –
        Amounts reflected reviewed as of July 9, 2025
    </a>
</p>
            <x-accordion-radio name="needEquipment" />

            <!-- EQUIPMENT ACCORDION -->
            <div id="otherEquipmentAccordion"
                class="transition-all duration-300 ease-in-out mt-2">

                <hr class="border-0 border-t border-red-800 mx-3 sm:mx-6 mb-4">

                <h3 class="font-sans text-base sm:text-lg font-semibold px-3 sm:px-6 py-2 sm:py-3 mb-3">
                    Equipment Usage
                </h3>


               <div class="border border-red-800 rounded-lg mx-3 sm:mx-6 mb-6">

    <div id="equipmentRows" class="space-y-4 px-3 sm:px-6 pt-4 pb-6 sm:pb-4">
        <x-equipment-row :index="1" />
    </div>

    <div class="px-3 sm:px-6 pb-6">
        <button type="button"
                class="add-equipment-btn mt-2 text-sm font-semibold text-red-800 border border-red-800 px-4 py-2 rounded bg-red-800 text-white">
                Add More Equipment
        </button>
    </div>

</div>
            </div>

        <hr class="border-0 border-t border-red-800">

        <!-- ========================= -->
        <!-- OTHER DETAILS -->
        <!-- ========================= -->
        <div class="mt-3 pb-2 sm:pb-4 px-3 sm:px-6">
            <h2 class="font-sans font-semibold text-sm sm:text-base px-3 sm:px-6 py-1 sm:py-2 mb-2">
                Other details of the reservation
                (Please include instructions of the reservation ex: no. of chairs, tables,
                physical arrangements, etc.)
                <span class="text-red-600 ml-1">*</span>
            </h2>

            <x-accordion-textarea name="otherDetails"
                class="focus:outline-none focus:ring-2 focus:ring-red-700" />
        </div>

        <hr class="border-0 border-t border-red-800">

        <!-- ========================= -->
        <!-- PERSONAL EQUIPMENT -->
        <!-- ========================= -->
        <div class="mt-3 pb-2 sm:pb-4 px-3 sm:px-6">

            <h2 class="font-sans font-semibold text-sm sm:text-base px-3 sm:px-6 py-1 sm:py-2 mb-2">
                Do you have personal equipment or instrument to bring?
                <span class="text-red-600 ml-1">*</span>
            </h2>

            <x-accordion-radio name="personalEquipment" />

            <!-- CONDITIONAL INPUT -->
            <div id="personalEquipmentInput"
                class="max-h-0 opacity-0 overflow-hidden transition-all duration-300 ease-in-out mt-2">

                <label class="block text-sm sm:text-base font-sans font-semibold px-2 pb-2 mb-1">
                    Enter personal equipment or instrument
                    <span class="text-red-600 ml-1">*</span>
                </label>

                <input type="text"
                    name="personalEquipmentDetails"
                    class="w-full sm:w-1/2 border rounded-md px-3 py-2 text-sm mb-4 block"
                    placeholder="Enter here">
            </div>

        </div>

    </div>

</div>
</x-section-box>