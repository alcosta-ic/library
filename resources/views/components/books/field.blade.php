@props(['label', 'name'])
<div>
    @if ($label)
        <x-books.label :$name :$label />
    @endif
    <div class="mt-1">
        {{ $slot }}
        <x-books.error :error="$errors->first($name)" />
    </div>
</div>
