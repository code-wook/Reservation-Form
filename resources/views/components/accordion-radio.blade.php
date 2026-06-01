@props([
    'name',
    'yesLabel' => 'Yes',
    'noLabel' => 'No',
    'class' => '',
])

<div class="accordion-content px-3 sm:px-6 pb-4 mt-4 {{ $class }}">
   <div class="flex justify-center items-center gap-12 sm:gap-20 w-full sm:w-1/2 mx-auto">


        <label class="flex items-center gap-2">
            <input type="radio" name="{{ $name }}" value="yes" class="accent-red-800 focus:ring-red-700">
            <span>{{ $yesLabel }}</span>
        </label>

        <label class="flex items-center gap-2">
           <input type="radio" name="{{ $name }}" value="no" class="accent-red-800 focus:ring-red-700">
            <span>{{ $noLabel }}</span>
        </label>

    </div>
</div>