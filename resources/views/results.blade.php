<x-layout>
    <div class="flex items-center justify-between mb-6">
        <x-books.section-heading>Results</x-books.section-heading>
        <a href="/" class="btn btn-ghost flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
            </svg>
            Back </a>
    </div>

    <div class="grid lg:grid-cols-4 gap-4 mt-6">
        @foreach ($books as $book)
        <x-books.book-card :book="$book"/>
            @endforeach
    </div>
</x-layout>
