@props(['book'])

<div class="card bg-base-100 shadow-xl py-0">
    <figure class="px-5 pt-5">
        <img
            src="https://th.bing.com/th/id/R.dd3fa9fbf6c8dea8f18dc3f12f8b2484?rik=CC64yhHdRiXf0g&pid=ImgRaw&r=0"
            alt="Book"
            class="max-w-32 image-full"/>
    </figure>
    <div class="card-body text-center px-2 py-4">
        <div class="items-center">
            <h3 class="card-title text-sm">
                {{ $book->name }}
                The complete novels of Jane Austen
            </h3>
            <p class="text-xs">Jane Austen</p>
        </div>
        <div class="flex justify-between items-center px-4">
            <div>
                <p class="text-xl text-accent font-bold">20 €</p>
            </div>

            <div class="card-actions">
                <button class="btn btn-primary btn-sm text-sm text-neutral-50">Buy Now</button>
            </div>
        </div>

    </div>
</div>
