@php
$organizations = [
    "UPC CAO (Accounting Office)",
    "UPC BAC (BAC Secretariat)",
    "UPC CBO (Budget Office)",
    "UPC CCAD (College of Communication, Art, and Design)",
    "UPC CCAD-OCS (CCAD - Office of the College Secretary)",
    "UPC CMO (Campus Maintenance Office)",
    "UPC COS (College of Science)",
    "UPC COS-OCS (College of Science - Office of the College Secretary)",
    "UPC COS-OD (College of Science - Office of the Dean)",
    "UPC CS-RC (College of Science - Research Center)",
    "UPC CSS (College of Social Sciences)",
    "UPC CSS-OCS (CSS - Office of the College Secretary)",
    "UPC CVSC (Central Visayas Studies Center)",
    "UPC CCO (Cash Office)",
    "UPC DBES (Department of Biology and Environmental Science)",
    "UPC DBES-PROJ (DBES - Projects)",
    "UPC DCS (Department of Computer Science)",
    "UPC Dorm (Dormitory)",
    "UPC FabLab (Fablab UP Cebu)",
    "UPC GAD (Gender and Development)",
    "UPC HRDO (Human Resource and Development Office)",
    "UPC LIB (Library Services)",
    "UPC HSU (Health Services Unit)",
    "UPC ITC (Information Technology Center)",
    "UPC LO (Legal Office)",
    "UPC MBA (Master of Business Administration)",
    "UPC MED (Master of Education)",
    "UPC Math (Mathematics Program)",
    "UPC NSTP (National Service Training Program)",
    "UPC OC (Office of the Chancellor)",
    "UPC OC-PROJ (Office of the Chancellor - Projects)",
    "UPC OCA (Office of Campus Architect)",
    "UPC OCEP (Office of Continuing Education & Pahinungod)",
    "UPC OSA (Office of Student Affairs)",
    "UPC OUR (Office of the University Registrar)",
    "UPC OVCA (Office of the Vice Chancellor for Administration)",
    "UPC OVCAA (Office of the Vice Chancellor for Academic Affairs)",
    "UPC PIO (Public Information Office)",
    "UPC SOM (School of Management)",
    "UPC SOM-OCS (School of Management - Office of the College Secretary)",
    "UPC SPMO (Supply and Property Management Office)",
    "UPC SRP (SRP Campus Administrator)",
    "UPC SSU (Safety and Security Unit)",
    "UPC TLRC (Teaching and Learning Resource Center)",
    "UPC TTBDO (Technology Transfer and Business Development Office)",
    "UPC OASH (Office of Anti Sexual Harassment)",
    "UPC OICA (Office for Initiatives in Culture and Arts)",
    "UPC Pahinungod",
    "UPC OIL (Office of International Linkages)",
    "UPC REC (Research and Ethics Committee)"
];
@endphp

<select name="organization" id="organizationSelect"
    class="border border-gray-300 rounded px-3 py-2 text-sm w-full md:w-1/2
           focus:outline-none focus:ring-2 focus:ring-red-800">

    <option value="">Select organization</option>

    @foreach($organizations as $org)
        <option value="{{ $org }}">{{ $org }}</option>
    @endforeach

    <option value="others">Others</option>
</select>

<!-- ONLY ONE container -->
<div id="otherOrganizationContainer" class="mt-2 hidden">

    <label class="block text-sm font-semibold mb-1">
        Please Specify <span class="text-red-600">*</span>
    </label>

    <input type="text"
        name="otherOrganization"
        id="otherOrganizationInput"
        placeholder="Enter organization"
        class="border border-gray-300 rounded px-3 py-2 text-sm w-full md:w-1/2
               focus:outline-none focus:ring-2 focus:ring-red-800">
</div>