<x-layout>
    <x-books.section-heading>Author - {{ $author->name }}</x-books.section-heading>

    <x-books.form method="POST" action="/authors/{{ $author->id }}" enctype="multipart/form-data">
        @method('PATCH')
        <x-books.input label="Name" name="name" placeholder="Jane Austin" value="{{ $author->name }}" />

        <x-books.input label="Photo" name="photo" type="file" />
        @if ($author->photo)
            <div class="w-20">
                <img src="{{ asset('storage/' . $author->photo) }}" alt="Photo Athor">
            </div>
        @endif

        <div class="flex space-x-2">
            <div>
                <x-books.button type="submit" class="px-20 btn-success">Update</x-books.button>
            </div>
            <div>
                <a href="/authors/{{$author->id}}" class="px-20 btn btn-error">Cancel</a>
            </div>
        </div>

    </x-books.form>
</x-layout>


