@php
$equipmentOptions = [
    'Aircon',
    'Computer Units',
    'Electric Fans',
    'Iwata',
    'Multimedia Projector',
    'Sound System',
    'Tent',
    'Wifi'
];
@endphp

<div class="equipment-row border border-gray-200 rounded-md p-4 relative">
    <!-- DELETE BUTTON -->
    <button type="button"
        class="delete-equipment hidden absolute top-2 right-2 text-xs text-red-700 border border-red-700 px-2 py-1 rounded">
        Delete
    </button>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <!-- Equipment Select -->
        <div>
            <label class="block text-sm font-semibold mb-1">
                Other Equipment <span class="text-red-600">*</span>
            </label>
            <select name="otherEquipment[{{ $index }}]"
                class="w-full border rounded-md py-2 px-3 text-sm focus:outline-none focus:ring-2 focus:ring-red-800">
                <option value="">Select equipment</option>
                @foreach($equipmentOptions as $equipment)
                    <option value="{{ $equipment }}">{{ $equipment }}</option>
                @endforeach
            </select>
        </div>

        <!-- Units Input -->
        <div>
            <label class="block text-sm font-semibold mb-1">
                No. Units <span class="text-red-600">*</span>
            </label>
            <input type="number" name="numberUnits[{{ $index }}]" min="0" max="999" step="1"
                pattern="\d{1,3}"
                class="w-full border rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-red-700"
                oninput="this.value=this.value.replace(/\D/g,'').slice(0,3)">
            <span class="text-xs text-gray-500">
                Enter the number of units needed
            </span>
        </div>
    </div>
</div>
