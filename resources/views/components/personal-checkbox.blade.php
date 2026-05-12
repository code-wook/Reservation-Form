@props([
    'name',
    'text',
    'required' => false
])

<label class="flex items-start gap-4 p-4 rounded-lg cursor-pointer transition 
              hover:bg-red-50 active:bg-red-100
              w-full">

    <!-- Checkbox -->
    <input 
        type="checkbox" 
        name="{{ $name }}" 
        @if($required) required @endif
        class="mt-1 accent-red-800 cursor-pointer shrink-0"
    >

    <!-- Text Content -->
    <span class="text-sm sm:text-base text-gray-800 leading-relaxed">

        @if($required)
            <span class="text-red-600 font-bold mr-1">*</span>
        @endif

        {!! $text !!}
    </span>

</label>