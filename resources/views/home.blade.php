<x-layout>
    <div>
{{--        <x-forms.form action="/search" class="mt-6">--}}
{{--            <x-forms.input :label="false" name="q" placeholder="Find yor book..." />--}}
{{--        </x-forms.form>--}}

        <h1> Popular Books</h1>

        <div class="flex space-x-4 my-4">
            <x-books.book-card></x-books.book-card>
            <x-books.book-card></x-books.book-card>
            <x-books.book-card></x-books.book-card>
            <x-books.book-card></x-books.book-card>
            <x-books.book-card></x-books.book-card>
{{--            <x-book-card></x-book-card>--}}
{{--            <x-book-card></x-book-card>--}}
{{--            <x-book-card></x-book-card>--}}
{{--            <x-book-card></x-book-card>--}}
        </div>
    </div>
</x-layout>
