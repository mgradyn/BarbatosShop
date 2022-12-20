@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md">

                @if (count($products))
                    <div class="card mt-3 mb-3">
                        <div class="card-header">{{ __($category->name) }}</div>

                        <div class="card-body">
                            <div class="row row-cols-xl-5">
                                @foreach ($products as $product)
                                    <div class="col d-flex justify-content-center">
                                        <x-card :category="$category" :product="$product" />
                                    </div>
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
