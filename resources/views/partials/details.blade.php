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
    <div class="accordion-content px-4 pb-4 mt-2">

        <!-- ========================= -->
        <!-- FACILITY -->
        <!-- ========================= -->
        <div class="mt-3 pb-2 sm:pb-4 px-3 sm:px-6">
            <h2 class="font-sans font-semibold text-sm sm:text-base px-3 sm:px-6 py-1 sm:py-2 mb-2">
                Choose Facility Here
                <span class="text-red-600 ml-1">*</span>
            </h2>

            <x-facility-input />
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

            <x-accordion-radio name="needEquipment" />

            <!-- EQUIPMENT ACCORDION -->
            <div id="otherEquipmentAccordion"
                class="transition-all duration-300 ease-in-out mt-2">

                <hr class="border-0 border-t border-red-800 mx-3 sm:mx-6 mb-4">

                <h3 class="font-sans text-base sm:text-lg font-semibold px-3 sm:px-6 py-2 sm:py-3 mb-3">
                    Equipment Usage
                </h3>

                <div id="equipmentRows" class="space-y-4 px-3 sm:px-6 pb-6 sm:pb-4">
                    <x-equipment-row :index="1" />
                </div>

                <div class="px-3 sm:px-6 pb-10">
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
</x-section-box>