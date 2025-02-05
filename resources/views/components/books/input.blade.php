@props(['label', 'name'])
@php
    $defaults = [
        'type' => 'text',
        'id' => $name,
        'name' => $name,
        'class' => 'rounded-xl bg-white border border-white/10 px-5 py-4 w-full',
        'value' => old($name)
    ];
@endphp
<x-books.field :$label :$name>
    <input {{ $attributes($defaults) }}>
</x-books.field>
