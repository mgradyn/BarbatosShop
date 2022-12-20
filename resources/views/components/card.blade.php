<a class="text-decoration-none text-reset"
    href="{{ route('view-product', ['slug' => $category->slug, 'id' => $product->id]) }}">
    <div class="card my-2" style="min-width: 180px; max-width: 180px;">
        <img src="{{ asset('storage/uploads/products/' . $product->photo) }}" class="card-img-top img-fluid"
            alt="image-product" style="min-height: 180px; max-height: 180px;">
        <div class="card-body">
            <p class="card-text text-truncate">{{ $product->name }}</p>
            <h5 class="card-title">
                {{ 'IDR' . ' ' . $product->price }}
            </h5>
        </div>

    </div>
</a>
