<x-layout>
    <x-books.section-heading>New Book</x-books.section-heading>

    <x-books.form method="POST" action="/books/{{ $book->id }}" enctype="multipart/form-data">
        @method('PATCH')
        <x-books.input label="ISBN" name="isbn" placeholder="9792298333748" value="{{ $book->isbn }}" />
        <x-books.input label="Name" name="name" placeholder="Novels of the Austin River" value="{{ $book->name }}" />

        <x-books.select label="Editor" name="editor_id">
            <option value="" disabled selected>-- Select an Editor --</option>
            @foreach ($editors as $editor)
                <option value="{{ $editor->id }}" {{ $editor->id == $book->editor_id ? 'selected' : '' }}>
                    {{ $editor->name }}
                </option>
                @endforeach
        </x-books.select>
        <div class="mb-4">
            <label class="block text-gray-700">Authors</label>
            <div class="relative">
                <button type="button" class="w-full p-4 bg-white rounded-md text-left" id="dropdownButton">
                    -- Authors Selected--
                </button>
                <div id="dropdown" class="absolute w-full mt-1 bg-white border border-gray-300 rounded-md shadow-lg hidden">
                    <div class="max-h-60 overflow-auto">
                        @foreach($authors as $author)
                            <label class="flex items-center p-2 bg-white hover:bg-gray-100">
                                <input
                                    type="checkbox"
                                    name="authors[]"
                                    value="{{ $author->id }}"
                                    class="form-checkbox bg-white mr-2"
                                    @if(in_array($author->id, $book->authors->pluck('id')->toArray())) checked @endif
                                >
                                <span>{{ $author->name }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <x-books.input label="Bibliography" name="bibliography" placeholder="About the book" value="{{ $book->bibliography }}" />
        <x-books.input label="Cover Image" name="cover_image" type="file" />
        @if ($book->cover_image)
            <div class="w-20">
                <img src="{{ asset('storage/' . $book->cover_image) }}" alt="Book Cover">
            </div>
        @endif
        <x-books.input label="Price" name="price" placeholder="20.00" value="{{ $book->price }}"/>
        <div class="flex space-x-2">
            <div>
                <x-books.button class="px-20 btn-success">Update</x-books.button>
            </div>
            <div>
                <a href="/books/{{ $book->id }}" class="px-20 btn btn-error">Cancel</a>
            </div>
        </div>
    </x-books.form>
</x-layout>

<script>
    document.getElementById('dropdownButton').addEventListener('click', function () {
        const dropdown = document.getElementById('dropdown');
        dropdown.classList.toggle('hidden');
    });
</script>
