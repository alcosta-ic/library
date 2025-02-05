<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Recent Books') }}
            </h2>
            <div class="space-x-6 font-bold flex">
                <a href="/" class="btn btn-ghost">See all</a>
            </div>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
{{--                <x-books.book-table :$books/>--}}
{{--                <x-welcome />--}}
{{--                @include('books.dashboard')--}}
                <x-books.dashboard :$books/>
            </div>
        </div>
    </div>
</x-app-layout>
