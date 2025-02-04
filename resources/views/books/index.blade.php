<x-layout>
    <div>
        {{--        <x-forms.form action="/search" class="mt-6">--}}
        {{--            <x-forms.input :label="false" name="q" placeholder="Find yor book..." />--}}
        {{--        </x-forms.form>--}}

{{--        <h1 class="font-bold"> Books</h1>--}}
        <x-books.section-heading>Books</x-books.section-heading>

        <div class="grid lg:grid-cols-4 gap-4 mt-4">
            @foreach($books as $book)
                <x-books.book-card :$book></x-books.book-card>
                @endforeach
            <x-books.book-card></x-books.book-card>
            <x-books.book-card></x-books.book-card>
            <x-books.book-card></x-books.book-card>
            <x-books.book-card></x-books.book-card>
            <x-books.book-card></x-books.book-card>
        </div>
    </div>
</x-layout>
