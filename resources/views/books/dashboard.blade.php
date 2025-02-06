<div>
    <div class="flex justify-between items-center mb-6">
        <x-books.section-heading>Recent Books</x-books.section-heading>
        @auth
            <div class="space-x-6 font-bold flex">
                <a href="/" class="btn btn-ghost">See all</a>
            </div>
        @endauth
    </div>
    <div class="grid lg:grid-cols-4 gap-4 mt-6">
        @foreach($books as $book)
            <a href="/books/{{ $book['id'] }}" >
                <x-books.book-card :book="$book" />
            </a>
        @endforeach

    </div>
</div>
