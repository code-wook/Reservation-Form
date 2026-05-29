@extends('layouts.form')

@section('title', 'General Guidelines on Use of Facilities, Equipment & Vehicles with 10% RENTAL INCREASE –
        Amounts reflected reviewed as of July 9, 2025')

@section('content')

<x-section-box class="accordion border-0 border-t rounded-lg bg-gray-50">

   <div class="overflow-x-auto flex justify-center">
    <table class="w-full max-w-5xl border text-sm bg-white mx-auto">

        <thead class="bg-gray-100">
            <tr>
                <th colspan="4" class="text-center px-5 py-3 border font-bold text-base">
                    Common Facilities
                </th>
            </tr>
            <tr>
                <th rowspan="2" class="text-center px-5 py-4 border align-middle w-1/4">
                    Facility
                </th>
                <th colspan="2" class="text-center px-5 py-4 border w-1/4">
                    Rate (₱)
                </th>
                <th rowspan="2" class="text-center px-5 py-4 border align-middle w-1/2">
                    Remarks
                </th>
            </tr>

            <tr>
                <th class="text-center px-5 py-4 border">Package</th>
                <th class="text-center px-5 py-4 border">Per Hour</th>
            </tr>
        </thead>

        <tbody>

            <tr class="border-t">

                <td class="px-5 py-4 align-top font-medium border-r">
                    1. Performing Arts Hall (PAH)
                </td>

                <td class="px-5 py-4 align-top text-center font-medium border-r">
                    <div class="space-y-12 py-2 ">
                        <div>
                            13,200.00<br>
                            <span class="text-xs font-normal text-gray-600 ">(Whole Day)</span>
                        </div>
                        <div>
                            6,600.00<br>
                            <span class="text-xs font-normal text-gray-600">(Half Day)</span>
                        </div>
                    </div>
                </td>

                <td class="px-5 py-4 align-top text-center text-gray-400 border-r"></td>

                <td class="px-5 py-4 align-top">
                    <div class="space-y-6">
                        
                        <div>
                            <strong class="block mb-1">Package A:</strong>
                            <ul class="list-disc ml-5 space-y-1.5">
                                <li>For shows and events which will take more than 4 hours or less than 8 hours.</li>
                                <li>This price includes the use of lights, sound system, and AC for eight (8) hours, on the day of the show/event only.</li>
                                <li>This price also includes the set-up and practice, one day prior, from 4-10pm.</li>
                            </ul>
                        </div>

                        <div>
                            <strong class="block mb-1">Package B:</strong>
                            <ul class="list-disc ml-5 space-y-1.5">
                                <li>For conferences.</li>
                                <li>Use for nine (9) hours, from 8:00 AM to 5:00 PM or 9:00 AM to 6:00 PM, inclusive of the use of LCD, lights, sound system, and AC.</li>
                            </ul>
                        </div>

                    </div>
                </td>

            </tr>

        </tbody>

    <tbody>

        <tr class="border-t ">
            <td class="px-5 py-4 align-top border-r">
                2. Performing Arts Hall Lobby
            </td>
            <td class="px-5 py-4 align-top border-r">
                <div class="space-y-2">
                    <div>1,100.00 (Whole Day)</div>
                    <div>550.00 (Half Day)</div>
                </div>
            </td>
            <td class="px-5 py-4 align-top border-r">
                <div class="space-y-1">
                    <div>440.00</div>
                </div>
            </td>
            <td class="px-5 py-4 align-top">
                <ul class="list-disc ml-5 space-y-1">
                    <li>If renting PAH/AVR 1 (on top of the ₱13,200.00 or ₱6,600.00)</li>
                    <li>Only if no one is using the PAH/AVR 1</li>
                </ul>
            </td>
        </tr>

        <tr class="border-t">
            <td class="px-5 py-4 align-top border-r">
                3. PAH Holding Room (Beside the Technical Room)
            </td>
            <td class="px-5 py-4 align-top border-r"></td>
            <td class="px-5 py-4 align-top border-r">220.00</td>
            <td class="px-5 py-4 align-top border-r "></td>
        </tr>

        <tr class="border-t">
            <td class="px-5 py-4 align-top border-r">
                4. AVR 1 (Beside PAH)
            </td>
            <td class="px-5 py-4 align-top border-r"></td>
            <td class="px-5 py-4 align-top border-r">462.00</td>
            <td class="px-5 py-4 align-top border-r"></td>
        </tr>

        <tr class="border-t">
            <td class="px-5 py-4 align-top border-r">
                5. ILC
            </td>
            <td class="px-5 py-4 align-top border-r"></td>
            <td class="px-5 py-4 align-top border-r">385.00</td>
            <td class="px-5 py-4 align-top border-r"></td>
        </tr>

        <tr class="border-t">
            <td class="px-5 py-4 align-top border-r">
                6. STIITCH
            </td>
            <td class="px-5 py-4 align-top border-r"></td>
            <td class="px-5 py-4 align-top border-r">495.00</td>
            <td class="px-5 py-4 align-top border-r">
                <ul class="list-disc ml-5">
                    <li>Inclusive of the use of computers provided by the office-in-charge</li>
                </ul>
            </td>
        </tr>

        <tr class="border-t">
            <td class="px-5 py-4 align-top border-r">
                7. Union Hall
            </td>
            <td class="px-5 py-4 align-top border-r"></td>
            <td class="px-5 py-4 align-top border-r">440.00</td>
            <td class="px-5 py-4 align-top border-r"></td>
        </tr>

        <tr class="border-t">
            <td class="px-5 py-4 align-top border-r">
                8. AS Hall
            </td>
            <td class="px-5 py-4 align-top border-r"></td>
            <td class="px-5 py-4 align-top border-r">550.00</td>
            <td class="px-5 py-4 align-top border-r">
                <ul class="list-disc ml-5">
                    <li>Use of IWATA is charged at ₱65.00 per unit per hour.</li>
                </ul>
            </td>
        </tr>

        <tr class="border-t">
            <td class="px-5 py-4 align-top border-r">
                9. Undergraduate Lobby
            </td>
            <td class="px-5 py-4 align-top border-r"></td>
            <td class="px-5 py-4 align-top border-r">110.00</td>
            <td class="px-5 py-4 align-top border-r">
                <ul class="list-disc ml-5 border-r">
                    <li>Exclusive of the electricity (to be computed)</li>
                </ul>
            </td>
        </tr>

        <tr class="border-t">
            <td class="px-5 py-4 align-top border-r">
                10. Joya Gallery
            </td>
            <td class="px-5 py-4 align-top border-r">550.00</td>
            <td class="px-5 py-4 align-top border-r"></td>
            <td class="px-5 py-4 align-top border-r">
                <ul class="list-disc ml-5 space-y-1">
                    <li>Per day</li>
                    <li>For faculty and staff</li>
                    <li>Share of UP Cebu per sale of painting (to be discussed with CCAD)</li>
                </ul>
            </td>
        </tr>

        <tr class="border-t">
            <td class="px-5 py-4 align-top border-r">
                11. Balay Varangao (Guesthouse) Lobby (with AC)
            </td>
            <td class="px-5 py-4 align-top border-r">550.00</td>
            <td class="px-5 py-4 align-top border-r"></td>
            <td class="px-5 py-4 align-top border-r">
                <ul class="list-disc ml-5 space-y-1">
                    <li>Non-UP</li>
                    <li>Rental rate is inclusive use of kitchen and sala</li>
                    <li>Rental is prohibited during periods when the Chancellor is residing on the premises</li>
                </ul>
            </td>
        </tr>

        <tr class="border-t">
            <td class="px-5 py-4 align-top border-r">
                12. Sports Development Center – Gymnasium
            </td>
            <td class="px-5 py-4 align-top border-r"></td>
            <td class="px-5 py-4 align-top border-r">
                <div class="space-y-1">
                    <div>₱500.00 (Day-Use)</div>
                    <div>₱600.00 (Night-Use)</div>
                </div>
            </td>
            <td class="px-5 py-4 align-top border-r"></td>
        </tr>

        <tr class="border-t">
            <td class="px-5 py-4 align-top border-r">
                13. Sports Development Center – Coliseum
            </td>
            <td class="px-5 py-4 align-top border-r"></td>
            <td class="px-5 py-4 align-top border-r">₱1,000.00</td>
            <td class="px-5 py-4 align-top border-r"></td>
        </tr>

        <tr class="border-t">
            <td class="px-5 py-4 align-top border-r">
                14. Sports Development Center – Aquatic Center
            </td>
            <td class="px-5 py-4 align-top border-r"></td>
            <td class="px-5 py-4 align-top border-r">
                ₱700.00 - ₱800.00 / hr. (Day-Use)
            </td>
            <td class="px-5 py-4 align-top"></td>
        </tr>

    </tbody>

    <tbody>

        <tr class="border-t">
            <td rowspan="2" class="px-5 py-4 align-top border-r">
                15. UP High School Ground
            </td>
            <td class="px-5 py-4 align-top text-center border-r">FREE</td>
            <td class="px-5 py-4 align-top border-r"></td>
            <td class="px-5 py-4 align-top border-r">
                <ul class="list-disc ml-5 border-r">
                    <li>For current UP students/faculty/staff</li>
                </ul>
            </td>
        </tr>
        <tr class="border-t">
            <td class="px-5 py-4 align-top border-r"></td>
            <td class="px-5 py-4 align-top border-r">880.00</td>
            <td class="px-5 py-4 align-top border-r">
                <ul class="list-disc ml-5">
                    <li>For the GENERAL PUBLIC</li>
                </ul>
            </td>
        </tr>

        <tr class="border-t">
            <td rowspan="3" class="px-5 py-4 align-top border-r">
                16. Basketball/Tennis Court
            </td>
            <td class="px-5 py-4 align-top text-center border-r">FREE</td>
            <td class="px-5 py-4 align-top border-r"></td>
            <td class="px-5 py-4 align-top border-r">
                <ul class="list-disc ml-5 border-r">
                    <li>For current UP Students/faculty/staff (for DAY USE only)</li>
                </ul>
            </td>
        </tr>
        <tr class="border-t">
            <td class="px-5 py-4 align-top border-r"></td>
            <td class="px-5 py-4 align-top border-r">220.00</td>
            <td class="px-5 py-4 align-top border-r">
                <ul class="list-disc ml-5">
                    <li>For alumni – at least five (5) UP alumni should be present</li>
                </ul>
            </td>
        </tr>
        <tr class="border-t">
            <td class="px-5 py-4 align-top border-r"></td>
            <td class="px-5 py-4 align-top border-r">440.00</td>
            <td class="px-5 py-4 align-top border-r">
                <ul class="list-disc ml-5 space-y-1">
                    <li>For the GENERAL PUBLIC</li>
                    <li>Organizers should provide their own portalets and water supply.</li>
                    <li>If electricity is required, organizers pay additional fee (refer to Item # 17 (Lights))</li>
                </ul>
            </td>
        </tr>

        <tr class="border-t">
            <td class="px-5 py-4 align-top border-r">
                17. LIGHTS for the courts
            </td>
            <td class="px-5 py-4 align-top border-r"></td>
            <td class="px-5 py-4 align-top border-r">110.00</td>
            <td class="px-5 py-4 align-top border-r">
                <ul class="list-disc ml-5">
                    <li>Per unit per hour, regardless of who rented.</li>
                </ul>
            </td>
        </tr>

        <tr class="border-t">
            <td class="px-5 py-4 align-top border-r">
                18. Open Field<br><span class="text-gray-500 text-xs">(Near Admin Bldg.)</span>
            </td>
            <td class="px-5 py-4 align-top border-r"></td>
            <td class="px-5 py-4 align-top border-r">440.00</td>
            <td class="px-5 py-4 align-top border-r">
                <ul class="list-disc ml-5">
                    <li>Organizers should provide their own portalets and water supply. If electricity is required, organizers pay additional fee (refer to Item # 17 (Lights)).</li>
                </ul>
            </td>
        </tr>

        <tr class="border-t">
            <td rowspan="2" class="px-5 py-4 align-top border-r">
                19. Football Field<br><span class="text-gray-500 text-xs border-r">(AS Field)</span>
            </td>
            <td class="px-5 py-4 align-top text-center border-r">FREE</td>
            <td class="px-5 py-4 align-top border-r"></td>
            <td class="px-5 py-4 align-top border-r">
                <ul class="list-disc ml-5">
                    <li>For students/faculty/staff</li>
                </ul>
            </td>
        </tr>
        <tr class="border-t">
            <td class="px-5 py-4 align-top border-r"></td>
            <td class="px-5 py-4 align-top border-r">660.00</td>
            <td class="px-5 py-4 align-top border-r">
                <ul class="list-disc ml-5 space-y-1">
                    <li>For the GENERAL PUBLIC</li>
                    <li>Organizers should provide their own portalets and water supply.</li>
                    <li>If electricity is required, organizers pay additional fee (refer to Item # 17)</li>
                </ul>
            </td>
        </tr>

        <tr class="border-t">
            <td class="px-5 py-4 align-top border-r">
                20. AS/SRP Parking Area
            </td>
            <td class="px-5 py-4 align-top border-r"></td>
            <td class="px-5 py-4 align-top border-r">440.00</td>
            <td class="px-5 py-4 align-top">
                <ul class="list-disc ml-5 space-y-1">
                    <li>Organizers should provide their own portalets and water supply.</li>
                    <li>If electricity is required, organizers pay additional fee (refer to Item # 17)</li>
                </ul>
            </td>
        </tr>

        <tr class="border-t">
            <td class="px-5 py-4 align-top border-r">
                21. Kiosks/Cottages (both AS and Admin Areas)
            </td>
            <td class="px-5 py-4 align-top border-r"></td>
            <td class="px-5 py-4 align-top border-r">330.00</td>
            <td class="px-5 py-4 align-top border-r">
                <ul class="list-disc ml-5">
                    <li>For the GENERAL PUBLIC</li>
                </ul>
            </td>
        </tr>

        <tr class="border-t">
            <td rowspan="2" class="px-5 py-4 align-top border-r">
                22. SRP Boardroom<br><span class="text-gray-500 text-xs border-r">(15 seaters)</span>
            </td>
            <td class="px-5 py-4 align-top border-r">9,350.00</td>
            <td class="px-5 py-4 align-top border-r"></td>
            <td class="px-5 py-4 align-top">
                <ul class="list-disc ml-5 space-y-1">
                    <li>WHOLE DAY (8 hours)</li>
                    <li>With ACs and microphones</li>
                </ul>
            </td>
        </tr>
        <tr class="border-t">
            <td class="px-5 py-4 align-top border-r"></td>
            <td class="px-5 py-4 align-top border-r">550.00</td>
            <td class="px-5 py-4 align-top">
                <ul class="list-disc ml-5">
                    <li>With ACs and microphones</li>
                </ul>
            </td>
        </tr>

        <tr class="border-t">
            <td class="px-5 py-4 align-top border-r">
                23. SRP Auditorium
            </td>
            <td class="px-5 py-4 align-top border-r"></td>
            <td class="px-5 py-4 align-top border-r">990.00</td>
            <td class="px-5 py-4 align-top border-r"></td>
        </tr>

        <tr class="border-t">
            <td class="px-5 py-4 align-top border-r">
                24. SRP Classrooms
            </td>
            <td class="px-5 py-4 align-top border-r"></td>
            <td class="px-5 py-4 align-top border-r">220.00</td>
            <td class="px-5 py-4 align-top border-r"></td>
        </tr>

        <tr class="border-t">
            <td class="px-5 py-4 align-top border-r">
                25. SRP Circle Hall
            </td>
            <td class="px-5 py-4 align-top border-r"></td>
            <td class="px-5 py-4 align-top border-r">550.00</td>
            <td class="px-5 py-4 align-top "></td>
        </tr>

   
</table>
</div>

<div class="overflow-x-auto flex justify-center">
    <table class="w-full max-w-5xl border text-sm bg-white mx-auto">

        <thead class="bg-gray-100">
            <tr>
                <th colspan="4" class="text-center px-5 py-3 border font-bold text-base">
                    Classrooms available for Rent Inclusive of AC (for non-academic activities)
                </th>
            </tr>
            <tr>
                <th rowspan="2" class="text-center px-5 py-4 border align-middle w-1/4">
                    Facility
                </th>
                <th colspan="2" class="text-center px-5 py-4 border w-1/4">
                    Rate (₱)
                </th>
                <th rowspan="2" class="text-center px-5 py-4 border align-middle w-1/2">
                    Remarks
                </th>
            </tr>

            <tr>
                <th class="text-center px-5 py-4 border">Package</th>
                <th class="text-center px-5 py-4 border">Per Hour</th>
            </tr>
        </thead>

        <tbody>

            <tr class="border-t">
                <td class="px-5 py-4 align-top font-medium border-r">
                    1. Large Rooms with ACs
                </td>
                <td class="px-5 py-4 align-top text-center text-gray-400 border-r"></td>
                <td class="px-5 py-4 align-top text-right pr-10 border-r">
                    385.00 
                </td>
                <td class="px-5 py-4 align-top">
                    <ul class="list-disc ml-5 space-y-1">
                        <li>
                            AS right wing:
                            <ul class="list-circle ml-5">
                                <li>AS 162 – AS 164</li>
                                <li>AS 247 – AS 249</li>
                                <li>AS 259 – AS 261</li>
                            </ul>
                        </li>
                    </ul>
                </td>
            </tr>

            <tr class="border-t">
                <td class="px-5 py-4 align-top font-medium border-r">
                    2. Regular Rooms with ACs
                </td>
                <td class="px-5 py-4 align-top text-center text-gray-400 border-r"></td>
                <td class="px-5 py-4 align-top text-right pr-10 border-r">
                    330.00 
                </td>
                <td class="px-5 py-4 align-top">
                    <ul class="list-disc ml-5 space-y-1">
                        <li>
                            SRP:
                            <ul class="list-circle ml-5">
                                <li>Case Room 105</li>
                                <li>ASX Rooms</li>
                                <li>SRP 102 – SRP 103</li>
                                <li>SRP 203A – SRP 203B</li>
                                <li>SRP 204A – SRP 204B</li>
                            </ul>
                        </li>
                    </ul>
                </td>
            </tr>

            <tr class="border-t">
                <td class="px-5 py-4 align-top font-medium border-r">
                    3. Small Rooms with 2 ACs
                </td>
                <td class="px-5 py-4 align-top text-center text-gray-400 border-r"></td>
                <td class="px-5 py-4 align-top text-right pr-10 border-r">
                    275.00 
                </td>
                <td class="px-5 py-4 align-top ">
                    <ul class="list-disc ml-5">
                        <li>SoM Lounge</li>
                    </ul>
                </td>
            </tr>

            <tr class="border-t">
                <td class="px-5 py-4 align-top font-medium border-r">
                    4. Small Rooms with 1 AC
                </td>
                <td class="px-5 py-4 align-top text-center text-gray-400 border-r"></td>
                <td class="px-5 py-4 align-top text-right pr-10 border-r">
                    220.00 
                </td>
                <td class="px-5 py-4 align-top">
                    <ul class="list-disc ml-5 space-y-2">
                        <li>
                            SoM:
                            <ul class="list-circle ml-5">
                                <li>SoM Pantry</li>
                            </ul>
                        </li>
                        <li>
                            AS right wing:
                            <ul class="list-circle ml-5">
                                <li>AS 150 – AS 151</li>
                            </ul>
                        </li>
                        <li>
                            AS left wing:
                            <ul class="list-circle ml-5">
                                <li>AS 135</li>
                                <li>AS 235</li>
                                <li>AS 231</li>
                                <li>AS 206</li>
                                <li>AS 302</li>
                                <li>AS 304</li>
                            </ul>
                        </li>
                        <li>
                            SRP:
                            <ul class="list-circle ml-5">
                                <li>SRP 201A-1</li>
                                <li>SRP 201A-2</li>
                                <li>SRP 201B</li>
                            </ul>
                        </li>
                        <li>Small Room in the PAH</li>
                    </ul>
                </td>
            </tr>

            <tr class="border-t">
                <td class="px-5 py-4 align-top font-medium border-r">
                    5. Computer Laboratories
                </td>
                <td class="px-5 py-4 align-top text-center text-gray-400 border-r"></td>
                <td class="px-5 py-4 align-top text-right pr-10 border-r">
                   
                    <div class=" px-2 py-0.5 mt-1"> 495 </div>
                </td>
                <td class="px-5 py-4 align-top">
                    <ul class="list-disc ml-5 space-y-1">
                        <li>This includes the rent of the regular sized room with 2 ACs</li>
                        <li>and at least 20 computers</li>
                    </ul>
                </td>
            </tr>

            <tr class="border-t">
                <td class="px-5 py-4 align-top font-medium border-r">
                    6. Smart Classroom (CSS)
                </td>
                <td class="px-5 py-4 align-top text-center text-gray-400 border-r"></td>
                <td class="px-5 py-4 align-top text-center text-gray-500 font-medium border-r">
                    TBD
                </td>
                <td class="px-5 py-4 align-top text-center text-gray-400"></td>
            </tr>

            <tr class="border-t">
                <td class="px-5 py-4 align-top font-medium border-r">
                    7. Hybrid Classroom with 360° Camera (SoM)
                </td>
                <td class="px-5 py-4 align-top text-center text-gray-400 border-r"></td>
                <td class="px-5 py-4 align-top text-center text-gray-500 font-medium border-r">
                    TBD
                </td>
                <td class="px-5 py-4 align-top text-center text-gray-400 border-r"></td>
            </tr>

        </tbody>
    </table>
</div>

<div class="overflow-x-auto flex justify-center">
    <table class="w-full max-w-5xl border text-sm bg-white mx-auto border-r">

        <thead class="bg-gray-100">
            <tr>
                <th colspan="4" class="text-center px-5 py-3 border font-bold text-base">
                    Classrooms available for Rent without AC (for non-academic activities)
                </th>
            </tr>
            <tr>
                <th rowspan="2" class="text-center px-5 py-4 border align-middle w-1/4">
                    Facility
                </th>
                <th colspan="2" class="text-center px-5 py-4 border w-1/4">
                    Rate (₱)
                </th>
                <th rowspan="2" class="text-center px-5 py-4 border align-middle w-1/2">
                    Remarks
                </th>
            </tr>
            <tr>
                <th class="text-center px-5 py-4 border">Package</th>
                <th class="text-center px-5 py-4 border">Per Hour</th>
            </tr>
        </thead>

        <tbody>

            <tr class="border-t">
                <td class="px-5 py-4 align-top font-medium border-r">
                    1. Regular Rooms without AC
                </td>
                <td class="px-5 py-4 align-top text-center text-gray-400 border-r"></td>
                <td class="px-5 py-4 align-top text-right pr-10 font-medium border-r">
                    198.00 
                </td>
                <td class="px-5 py-4 align-top">
                    <ul class="list-disc ml-5 space-y-1">
                        <li>
                            Undergraduate Building rooms:
                            <ul class="list-circle ml-5 mt-1">
                                <li>UG 214 – UG 219</li>
                            </ul>
                        </li>
                    </ul>
                </td>
            </tr>

            <tr class="border-t">
                <td class="px-5 py-4 align-top font-medium border-r">
                    2. Small Room without AC
                </td>
                <td class="px-5 py-4 align-top text-center text-gray-400 border-r"></td>
                <td class="px-5 py-4 align-top text-right pr-10 font-medium border-r">
                    143.00 
                </td>
                <td class="px-5 py-4 align-top">
                    <ul class="list-disc ml-5 space-y-2">
                        <li>
                            AS right wing:
                            <ul class="list-circle ml-5 mt-1 space-y-0.5">
                                <li>AS 153</li>
                                <li>AS 165</li>
                                <li>AS 167</li>
                            </ul>
                        </li>
                        <li>
                            AS left wing:
                            <ul class="list-circle ml-5 mt-1">
                                <li>AS 233</li>
                            </ul>
                        </li>
                    </ul>
                </td>
            </tr>

        </tbody>
    </table>
</div>

<div class="overflow-x-auto flex justify-center">
    <table class="w-full max-w-5xl border text-sm bg-white mx-auto">

        <thead class="bg-gray-100">
            <tr>
                <th colspan="4" class="text-center px-5 py-3 border font-bold text-base ">
                    Equipment
                </th>
            </tr>
            <tr>
                <th rowspan="2" class="text-center px-5 py-4 border align-middle w-1/4">
                    Equipment
                </th>
                <th colspan="2" class="text-center px-5 py-4 border w-1/4">
                    Rate (₱)
                </th>
                <th rowspan="2" class="text-center px-5 py-4 border align-middle w-1/2">
                    Remarks
                </th>
            </tr>
            <tr>
                <th class="text-center px-5 py-4 border">Package</th>
                <th class="text-center px-5 py-4 border">Per Hour</th>
            </tr>
        </thead>

        <tbody>

            <tr class="border-t">
                <td rowspan="2" class="px-5 py-4 align-top font-medium border-r">
                    1. WIFI
                </td>
                <td class="px-5 py-4 align-top text-center border-b border-r">1,100.00</td>
                <td class="px-5 py-4 align-top text-center border-b border-r text-gray-400"></td>
                <td class="px-5 py-4 align-top border-b">
                    <ul class="list-disc ml-5">
                        <li>Use of WIFI in PAH and other venues if used for more than <strong>four (4) hours</strong></li>
                    </ul>
                </td>
            </tr>
            <tr>
                <td class="px-5 py-4 align-top text-center border-b border-r">550.00</td>
                <td class="px-5 py-4 align-top text-center border-b text-gray-400 border-r"></td>
                <td class="px-5 py-4 align-top border-b border-r">
                    <ul class="list-disc ml-5">
                        <li>Use of WIFI in PAH and other venues if rented for <strong>not more than four (4) hours</strong></li>
                    </ul>
                </td>
            </tr>

            <tr class="border-t">
                <td class="px-5 py-4 align-top font-medium border-r">
                    2. Piano
                </td>
                <td class="px-5 py-4 align-top text-center border-r ">5,500.00</td>
                <td class="px-5 py-4 align-top text-center text-gray-400 border-r"></td>
                <td class="px-5 py-4 align-top">
                    <ul class="list-disc ml-5 space-y-1">
                        <li>Per instance</li>
                        <li>It cannot be transferred to another location.</li>
                        <li>Damages shall be borne solely by the lessee.</li>
                        <li>Up to maximum of 20% discount</li>
                    </ul>
                </td>
            </tr>

            <tr class="border-t">
                <td class="px-5 py-4 align-top font-medium border-r">
                    3. Sound system
                </td>
                <td class="px-5 py-4 align-top text-center text-gray-400 border-r"></td>
                <td class="px-5 py-4 align-top text-center border-r">110.00</td>
                <td class="px-5 py-4 align-top">
                    <ul class="list-disc ml-5">
                    
                    </ul>
                </td>
            </tr>

            <tr class="border-t">
                <td class="px-5 py-4 align-top font-medium border-r">
                    4. LCD/Multimedia projector/ LDP
                </td>
                <td class="px-5 py-4 align-top text-center text-gray-400 border-r"></td>
                <td class="px-5 py-4 align-top text-center border-r">165.00</td>
                <td class="px-5 py-4 align-top"></td>
            </tr>

            <tr class="border-t">
                <td class="px-5 py-4 align-top font-medium border-r">
                    5. 5000 Lumens Projector
                </td>
                <td class="px-5 py-4 align-top text-center text-gray-400 border-r"></td>
                <td class="px-5 py-4 align-top text-center border-r ">550.00</td>
                <td class="px-5 py-4 align-top"></td>
            </tr>

            <tr class="border-t">
                <td class="px-5 py-4 align-top font-medium border-r">
                    6. IWATA
                </td>
                <td class="px-5 py-4 align-top text-center border-r">660.00/unit</td>
                <td class="px-5 py-4 align-top text-center text-gray-400 border-r"></td>
                <td class="px-5 py-4 align-top">
                    <ul class="list-disc ml-5">
                        <li>Rent for the WHOLE DAY.</li>
                    </ul>
                </td>
            </tr>

            <tr class="border-t">
                <td class="px-5 py-4 align-top font-medium border-r">
                    7. Electric fans in all facilities
                </td>
                <td class="px-5 py-4 align-top text-center text-gray-400 border-r"></td>
                <td class="px-5 py-4 align-top text-center border-r">110.00</td>
                <td class="px-5 py-4 align-top">
                    <ul class="list-disc ml-5 space-y-1">
                        <li>For outsiders only</li>
                        <li>All UP Cebu constituents are entitled to free use of electric fans in all facilities</li>
                    </ul>
                </td>
            </tr>

            <tr class="border-t">
                <td class="px-5 py-4 align-top font-medium border-r">
                    8. LED Wall
                </td>
                <td colspan="2" class="px-5 py-4 align-top text-center font-medium border-r">
                    NOT FOR COMMERCIAL PURPOSE/ STRICTLY FOR SPECIAL OCCASIONS AND EVENTS
                </td>
                <td class="px-5 py-4 align-top"></td>
            </tr>

            <tr class="border-t">
                <td class="px-5 py-4 align-top font-medium border-r">
                    9. Computer units
                </td>
                <td class="px-5 py-4 align-top text-center text-gray-400 border-r"></td>
                <td class="px-5 py-4 align-top text-center border-r">23.00</td>
                <td class="px-5 py-4 align-top">
                    <ul class="list-disc ml-5">
                        <li>For NON-UP constituents</li>
                    </ul>
                </td>
            </tr>

            <tr class="border-t">
                <td rowspan="4" class="px-5 py-4 align-top font-medium border-r">
                    10. Tent
                </td>
                <td class="px-5 py-4 align-top text-center border-b border-r">FREE</td>
                <td class="px-5 py-4 align-top text-center border-b text-gray-400 border-r"></td>
                <td class="px-5 py-4 align-top border-b border-r">
                    <ul class="list-disc ml-5">
                        <li>For academic-related activities requested by the faculty and UP recognized clubs.</li>
                    </ul>
                </td>
            </tr>
            <tr>
                <td class="px-5 py-4 align-top text-center border-b text-gray-400 border-r"></td>
                <td class="px-5 py-4 align-top text-center border-b border-r">110.00</td>
                <td class="px-5 py-4 align-top border-b border-r">
                    <ul class="list-disc ml-5">
                        <li>For non-academic activities requested by UP personnel, faculty, staff, & students</li>
                    </ul>
                </td>
            </tr>
            <tr>
                <td class="px-5 py-4 align-top text-center border-b text-gray-400 border-r"></td>
                <td class="px-5 py-4 align-top text-center border-b border-r">220.00</td>
                <td class="px-5 py-4 align-top border-b border-r">
                    <ul class="list-disc ml-5">
                        <li>For alumni borrowers</li>
                    </ul>
                </td>
            </tr>
            <tr>
                <td class="px-5 py-4 align-top text-center text-gray-400 border-r"></td>
                <td class="px-5 py-4 align-top text-center border-r">330.00</td>
                <td class="px-5 py-4 align-top border-r">
                    <ul class="list-disc ml-5 space-y-1">
                        <li>NON-UP constituents</li>
                        <li>Users should be charged for the transfer, installation, and removal of tents.</li>
                        <li>Tents cannot be brought to the other side of the campus because of the risk involved when workers cross the street to transfer them.</li>
                    </ul>
                </td>
            </tr>

        </tbody>
    </table>
</div>

    </div>

</x-section-box>

@endsection