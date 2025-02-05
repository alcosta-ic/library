<x-layout>
    <div class="flex justify-between items-center">
        <x-books.section-heading>Author Details</x-books.section-heading>
        <div class="space-x-6 font-bold flex">
            <a href="/authors" class="btn btn-ghost px-10">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                </svg>
                Back
            </a>
        </div>
    </div>

    <div class="flex justify-normal items-center py-6 space-x-3">
        <figure class=" ">
            <img
                src="{{ asset('storage/' . $author->photo) }}"
                alt="Logo"
                class="max-w-12 image-full"/>
        </figure>
        <div class="text-center px-2 py-3">
            <p class="card-title text-md font-normal">{{ $author->name }}</p>
        </div>
    </div>
    <div class="flex justify-between mt-3 space-x-2">
        @auth
            <div class="flex space-x-2">
                <div class="space-x-6 font-bold flex">
                    <a href="/authors/{{$author->id}}/edit" class="btn btn-accent px-8">Edit Author</a>
                </div>
                <div class="space-x-6 font-bold flex">
                    <form method="POST" action="/authors/{{ $author->id }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-error px-10" type="submit">Delete Author</button>
                    </form>
                </div>
            </div>
        @endauth
    </div>

    <h3 class="mt-10 font-bold text-primary text-lg">Books belonging to {{$author->name}}</h3>
    @if ($author->books->isEmpty())
        <p class="text-gray-600 mt-4">No books found for this author.</p>
    @else
        <div class="grid lg:grid-cols-4 gap-4 mt-6">
            @foreach ($author->books as $book)
                <a href="/books/{{ $book['id'] }}" >
                    <x-books.book-card :$book />
                </a>
            @endforeach
        </div>
    @endif

</x-layout>
