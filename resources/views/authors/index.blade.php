<x-layout>
    <div>
        <div class="flex justify-between items-center mb-6">
            <x-books.section-heading>Authors</x-books.section-heading>
            @auth
                <div class="space-x-6 font-bold flex">
                    <a href="/authors/create" class="btn btn-outline btn-neutral">Add New Author</a>
                </div>
            @endauth
        </div>

        <div class="grid lg:grid-cols-4 gap-4 mt-6">
            @foreach($authors as $author)
                <a href="/authors/{{ $author['id'] }}" >
                    <x-books.author-card :$author />
                </a>
            @endforeach
        </div>
    </div>
</x-layout>
