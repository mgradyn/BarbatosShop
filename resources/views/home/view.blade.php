@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 ">

                @if ($product)
                    <div class="card mb-3">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="{{ asset('uploads/products/' . $product->photo) }}"
                                    class="p-4 img-fluid rounded-start" alt="product photo">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h3 class="card-title">{{ $product->name }}</h5>
                                        <div class="row mt-3">
                                            <div class="col-md-3" scope="row">{{ __('Detail') }}</div>
                                            <div class="col">{{ $product->detail }}</div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-md-3" scope="row">{{ __('Price') }}</div>
                                            <div class="col">{{ 'IDR' . ' ' . $product->price }}</div>
                                        </div>
                                        @isCustomer
                                            <form method="POST"
                                                action="{{ route('add-to-cart', ['product_id' => $product->id]) }}"
                                                id="add_cart_form" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group row mt-3">
                                                    <label for="qty"
                                                        class="col-md-3 col-form-label">{{ 'Qty' }}</label>
                                                    <div class="col">
                                                        <input type="number"
                                                            class="form-control @error('qty') is-invalid @enderror"
                                                            id="qty" name="qty" value="{{ $cartItem_qty }}">
                                                        @error('qty')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-outline-secondary mt-3">
                                                    {{ __('Purchase') }}
                                                </button>
                                            </form>
                                        @endisCustomer
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="empty__product">
                        There is no product to display
                    </div>
                @endif

            </div>
        </div>
    </div>
@endsection
