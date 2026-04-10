@props([
    'name',
    'text',
    'required' => false
])

<div class="flex items-start pl-4 gap-3 mb-6">   
    <input type="checkbox" name="{{ $name }}" @if($required) required @endif class="mt-1 accent-red-800">
    <label class="text-sm text-gray-800 leading-relaxed">
        {!! $text !!}
    </label>
</div>
