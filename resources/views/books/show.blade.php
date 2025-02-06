<x-layout>

    <div class="card card-side bg-base-100 shadow-xl flex">
        <figure class="w-1/2 overflow-hidden">
            <img
                class="object-cover w-full h-full"
                src="{{ asset('storage/' . $book->cover_image) }}"
                alt="Movie" />
        </figure>
        <div class="card-body flex flex-col justify-between w-1/2">
            <div>
                <h2 class="card-title">{{ $book->name }}</h2>
                <p class="text-secondary text-xs mt-1">ISBN {{ $book->isbn }}</p>
                <p class="text-gray-800 text-sm mt-5"><span class="text-black font-bold">Editor:</span> {{ $book->editor->name }}</p>
                <p class="text-gray-800 text-sm mt-3">
                    <span class="text-black font-bold">
                        @if ($book->authors->count() > 1)
                            Authores:
                        @else
                            Author:
                        @endif
                    </span>
                    {{ $book->authors->pluck('name')->implode(', ') }}
                </p>
                <p class="text-gray-800 text-sm mt-3"><span class="text-black font-bold">Bibliography:</span> {{ $book->bibliography }}</p>
                <p class="text-gray-800 text-sm mt-5"><span class="text-black font-bold">Price:</span> <span class="text-accent font-black text-md ms-2">{{ $book->price }} €</span></p>
            </div>
            <div class="card-actions justify-center">
                <button class="btn btn-primary px-20">Buy</button>
            </div>
        </div>
    </div>
{{--    <div class="flex justify-between mt-10 space-x-2">--}}
{{--        @auth--}}
{{--            <div class="flex space-x-2">--}}
{{--                <div class="space-x-6 font-bold flex">--}}
{{--                    <a href="/books/{{$book->id}}/edit" class="btn btn-accent px-8">Edit Book</a>--}}
{{--                </div>--}}
{{--                <div class="space-x-6 font-bold flex">--}}
{{--                    <form method="POST" action="/books/{{ $book->id }}">--}}
{{--                        @csrf--}}
{{--                        @method('DELETE')--}}
{{--                        <button class="btn btn-error px-10" type="submit">Delete Book</button>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        @endauth--}}

{{--            <div class="space-x-6 font-bold flex">--}}
{{--                <a href="/" class="btn btn-neutral px-10">Back to Books</a>--}}
{{--            </div>--}}
{{--    </div>--}}
</x-layout>
