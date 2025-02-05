@props(['editor'])

<div class="card bg-base-100 shadow-xl py-0">
    <div class="flex justify-normal items-center p-3">
        <figure class="p-5 ">
            <img
                src="{{ asset('storage/' . $editor->logo) }}"
                alt="Logo"
                class="max-w-12 image-full"/>
        </figure>
        <div class="card-body text-center px-2 py-3">
            <h3 class="card-title text-sm">{{ $editor->name }}</h3>
        </div>
    </div>
</div>
