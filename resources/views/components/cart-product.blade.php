<div class="card mb-3">
    <div class="row g-0">
        <div class="col-md-3 d-flex justify-content-center">
            <img src="{{ asset('storage/uploads/products/' . $item->product->photo) }}"
                class="p-3 img-fluid rounded-start" alt="product photo" style="min-width: 210px; min-height: 210px;">
        </div>
        <div class="col-md-7">
            <div class="card-body">
                <h3 class="card-title">{{ $item->product()->first()->name }}</h5>
                    <div class="row mt-3">
                        <div class="col-md-3" scope="row">{{ __('Quantity') }}</div>
                        <div class="col">{{ $item->qty }}</div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-3" scope="row">{{ __('Total Price') }}</div>
                        <div class="col">{{ 'IDR' . ' ' . $item->totalPrice }}</div>
                    </div>

            </div>
        </div>
        <div class="col-md-2">
            <div class="card-body d-flex justify-content-end">
                <a href="{{ route('delete-from-cart', ['item_id' => $item->id]) }}" class="btn btn-outline-danger"><i
                        class="fa fa-trash"></i></a>
            </div>

        </div>
    </div>
</div>
