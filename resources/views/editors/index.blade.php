<x-layout>
    <div>
{{--           <x-books.form action="/search" class="my-6">--}}
{{--               <x-input name="q" placeholder="Find your editor..." class="w-full" value=""/> --}}{{-- value="" - clear input--}}
{{--           </x-books.form>--}}

        <div class="flex justify-between items-center mb-6">
            <x-books.section-heading>Editors</x-books.section-heading>
            @auth
                <div class="space-x-6 font-bold flex">
                    <a href="/editors/create" class="btn btn-outline btn-neutral">Add New Editor</a>
                </div>
            @endauth
        </div>

        <div class="grid lg:grid-cols-4 gap-4 mt-6">
            @foreach($editors as $editor)
                <a href="/editors/{{ $editor['id'] }}" >
                    <x-books.editor-card :$editor />
                </a>
            @endforeach
        </div>
    </div>
</x-layout>
