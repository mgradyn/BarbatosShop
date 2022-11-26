@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md">

                @if (count($products))
                    <div class="card mt-3 mb-3">
                        <div class="card-header">{{ __($category->name) }}</div>

                        <div class="card-body">
                            <div class="row">
                                @foreach ($products as $product)
                                    <a class="col text-decoration-none text-reset"
                                        href="{{ route('view-product', ['slug' => $category->slug, 'id' => $product->id]) }}">
                                        <div class="col card m-2" style="min-width: 180px; max-width: 180px;">
                                            <img src="{{ asset('storage/uploads/products/' . $product->photo) }}"
                                                class="card-img-top" alt="image-product">
                                            <div class="card-body">
                                                <p class="card-text text-truncate">{{ $product->name }}</p>
                                                <h5 class="card-title">
                                                    {{ 'IDR' . ' ' . $product->price }}
                                                </h5>
                                            </div>

                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        {{ $products->links() }}
                    </div>
                @else
                    <div class="empty__product">
                        <div class="card mb-3">
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h3 class="card-title">{{ __('There are no products to display') }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>
@endsection
