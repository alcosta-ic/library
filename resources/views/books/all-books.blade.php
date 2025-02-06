<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Books') }}
            </h2>
            <div class="space-x-4 font-bold flex sm">
                <a href="/books/create" class="btn btn-outline btn-neutral btn-sm text-xs">Add New Book</a>
            </div>
        </div>
    </x-slot>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
                <x-books.book-table :$books/>
            </div>
        </div>
    </div>
</x-app-layout>
