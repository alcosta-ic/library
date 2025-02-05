<x-layout>
    <x-books.section-heading>New Editor</x-books.section-heading>

    <x-books.form method="POST" action="/editors" enctype="multipart/form-data">

        <x-books.input label="Name" name="name" placeholder="Novels of the Austin River" />

        <x-books.input label="Logo" name="logo" type="file" />

        <div class="flex space-x-2">
            <div>
                <x-books.button type="submit" class="px-20 btn-success">Save</x-books.button>
            </div>
            <div>
                <a href="/editors" class="px-20 btn btn-error">Cancel</a>
            </div>
        </div>

    </x-books.form>
</x-layout>


