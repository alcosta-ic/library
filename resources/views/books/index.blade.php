<x-layout>

    <div>
           <x-books.form action="/search" class="my-6">
               <x-input name="q" placeholder="Find your book..." class="w-full" value=""/> {{-- value="" - clear input--}}
           </x-books.form>

            {{-- Buttons for sorting books --}}
            <div class="flex justify-center space-x-4 mb-6">
                <a href="{{ route('books.index', ['sort_by' => 'name', 'sort_order' => request('sort_by') === 'name' && request('sort_order') === 'asc' ? 'desc' : 'asc']) }}"
                   class="btn {{ request('sort_by') === 'name' ? 'btn-ghost btn-outline' : 'btn-ghost' }}">
                    A-Z {{ request('sort_by') === 'name' ? (request('sort_order') === 'asc' ? '🔼' : '🔽') : '↕️' }}
                </a>

                <a href="{{ route('books.index', ['sort_by' => 'price', 'sort_order' => request('sort_by') === 'price' && request('sort_order') === 'asc' ? 'desc' : 'asc']) }}"
                   class="btn {{ request('sort_by') === 'price' ? 'btn-ghost btn-outline' : 'btn-ghost' }}">
                    Price {{ request('sort_by') === 'price' ? (request('sort_order') === 'asc' ? '🔼' : '🔽') : '↕️' }}
                </a>

                <form action="{{ route('export-books') }}" method="get">
                    <button type="submit" class="btn btn-ghost btn-outline">Export Books to Excel</button>
                </form>
            </div>

        <div class="flex justify-between items-center mb-6">
            <x-books.section-heading>Books</x-books.section-heading>
{{--            @auth--}}
{{--                <div class="space-x-6 font-bold flex">--}}
{{--                    <a href="/books/create" class="btn btn-outline btn-neutral">Add New Book</a>--}}
{{--                </div>--}}
{{--            @endauth--}}
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
