@props([
    'name',
    'rows' => 4,        // default rows
])

<div class="accordion-content pb-4 mt-2">
    <textarea
        name="{{ $name }}"
        rows="{{ $rows }}"
        placeholder="Enter your answer here"
        {{ $attributes->merge([
            'class' => 'w-full border rounded-md p-2 text-sm'
        ]) }}
    ></textarea>
</div>