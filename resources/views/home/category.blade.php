@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md">

                @if (count($products))
                    <div class="card mt-3 mb-3">
                        <div class="card-header">{{ __($category_name) }}</div>

                        <div class="card-body">
                            <div class="row row-cols-5">
                                @foreach ($products as $product)
                                    <div class="col card m-2" style="min-width: 180px; max-width: 180px;">
                                        <img src="{{ asset('uploads/products/' . $product->photo) }}" class="card-img-top"
                                            alt="image-product">
                                        <div class="card-body">
                                            <p class="card-text text-truncate">{{ $product->name }}</p>
                                            <h5 class="card-title">
                                                {{ 'IDR' . ' ' . $product->price }}
                                            </h5>
                                        </div>

                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        {{ $products->links() }}
                    </div>
                @endif

            </div>
        </div>
    </div>
@endsection
