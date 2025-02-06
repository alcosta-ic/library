@props(['books'])
<div class="overflow-x-auto">
    <table class="table">
        <!-- head -->
        <thead>
        <tr>
            <th>
            ISBN
            </th>
            <th>Title / Author</th>
            <th>Editor</th>
            <th>Bibliography</th>
            <th>Price</th>
            <th></th>
        </tr>
        </thead>

        <tbody>
        <!-- row 1 -->
        @foreach($books as $book)
        <tr>
            <th>
                {{ $book->isbn }}
            </th>
            <td>
                <div class="flex items-center gap-3">
                    <div class="avatar">
                        <div class="mask mask-squircle h-12 w-12">
                            <img
                                src="{{ asset('storage/' . $book->cover_image) }}"
                                alt="Book Cover" />
                        </div>
                    </div>
                    <div>
                        <div class="font-bold">{{ $book->name }}</div>
                        <div class="text-sm opacity-50">
                            @foreach($book->authors as $author)
                                {{ $author->name }}@if(!$loop->last), @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </td>
            <td>
                {{ $book->editor->name }}
            </td>
            <td>Purple</td>
            <th>
                <span class="badge badge-accent badge-sm">{{ $book->price }} €</span>
            </th>
            <th>
                <div class="flex gap-2">
                    <a href="/books/{{ $book->id }}/edit" class="btn btn-primary btn-xs">Edit</a>

                    <form method="POST" action="/books/{{ $book->id }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-error btn-xs" type="submit">Delete</button>
                    </form>

                </div>

            </th>
        </tr>
        @endforeach
        </tbody>
    </table>
    <div class="mt-4">
        {{ $books->links() }}
    </div>
</div>
