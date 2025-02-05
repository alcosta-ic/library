<x-layout>
    <x-books.section-heading>New Author</x-books.section-heading>

    <x-books.form method="POST" action="/authors" enctype="multipart/form-data">

        <x-books.input label="Name" name="name" placeholder="Jane Austin" />

        <x-books.input label="Photo" name="photo" type="file" />

        <div class="flex space-x-2">
            <div>
                <x-books.button type="submit" class="px-20 btn-success">Save</x-books.button>
            </div>
            <div>
                <a href="/authors" class="px-20 btn btn-error">Cancel</a>
            </div>
        </div>

    </x-books.form>
</x-layout>


