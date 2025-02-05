@props(['label', 'name'])
@php
    $defaults = [
        'id' => $name,
        'name' => $name,
        'class' => 'rounded-xl bg-white border border-white/10 px-5 py-4 w-full'
    ];
@endphp
<x-books.field :$label :$name>
    <select {{ $attributes($defaults) }}>
        {{ $slot }}
    </select>
</x-books.field>
