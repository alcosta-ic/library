<x-layout>
    <div>
           <x-books.form action="/search" class="my-6">
               <x-input name="q" placeholder="Find your book..." class="w-full" value=""/> {{-- value="" - clear input--}}
           </x-books.form>

        <div class="flex justify-between items-center mb-6">
            <x-books.section-heading>Books</x-books.section-heading>
            @auth
                <div class="space-x-6 font-bold flex">
                    <a href="/books/create" class="btn btn-outline btn-neutral">Add New Book</a>
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
</x-layout>
