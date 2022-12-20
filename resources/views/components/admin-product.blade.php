<div class="card mb-3">
    <div class="row g-0">
        <div class="col-md-3 p-2 d-flex justify-content-center">
            <img src="{{ asset('storage/uploads/products/' . $product->photo) }}" class="img-fluid rounded border"
                alt="product photo" style="min-height: 180px; min-width: 180px;">
        </div>
        <div class="col-md-6">
            <div class="card-body">
                <h5 class="card-title">{{ $product->name }}</h5>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card-body d-flex justify-content-end">
                <a href="{{ route('edit-product', ['id' => $product->id]) }}" class="btn btn-outline-warning me-1"><i
                        class="fas fa-edit"></i></a>
                <a href="{{ route('delete-product', ['id' => $product->id]) }}" class="btn btn-outline-danger"><i
                        class="fas fa-trash"></i></a>
            </div>
        </div>
    </div>
</div>
