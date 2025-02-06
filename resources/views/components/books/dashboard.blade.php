<div>
{{--    <div class="flex justify-between items-center mb-6">--}}
{{--        <x-books.section-heading>Recent Books</x-books.section-heading>--}}
{{--        @auth--}}
{{--            <div class="space-x-6 font-bold flex">--}}
{{--                <a href="/" class="btn btn-ghost">See all</a>--}}
{{--            </div>--}}
{{--        @endauth--}}
{{--    </div>--}}
    <div class="grid lg:grid-cols-5 gap-4">
        @foreach($books as $book)
            <a href="/books/{{ $book['id'] }}" >
                <x-books.book-card class="sm" :book="$book" />
            </a>
        @endforeach
    </div>
</div>
