<x-layout>
    <x-books.section-heading>Editor - {{ $editor->name }}</x-books.section-heading>

    <x-books.form method="POST" action="/editors/{{ $editor->id }}" enctype="multipart/form-data">
        @method('PATCH')
        <x-books.input label="Name" name="name" placeholder="Novels of the Austin River" value="{{ $editor->name }}" />

        <x-books.input label="Logo" name="logo" type="file" />
        @if ($editor->logo)
            <div class="w-20">
                <img src="{{ asset('storage/' . $editor->logo) }}" alt="Logo">
            </div>
        @endif

        <div class="flex space-x-2">
            <div>
                <x-books.button type="submit" class="px-20 btn-success">Update</x-books.button>
            </div>
            <div>
                <a href="/editors/{{$editor->id}}" class="px-20 btn btn-error">Cancel</a>
            </div>
        </div>

    </x-books.form>
</x-layout>


