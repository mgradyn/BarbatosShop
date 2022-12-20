@extends('layouts.app')

@section('content')
    <div class="container mt-5 mb-5">
        <div class="d-flex justify-content-center row">
            <div class="col-md-10">
                <x-alert />
                <div class="d-flex mb-3">
                    <div>
                        <x-search name="manageProduct" />
                    </div>
                    <div class="ms-auto">
                        <a href="{{ route('add-product') }}" class="btn btn-secondary">Add Product <i
                                class="fas fa-plus"></i></a>
                    </div>
                </div>
                @foreach ($products as $product)
                    <x-admin-product :product="$product" />
                @endforeach
                <div class="d-flex justify-content-start">
                    {{ $products->links() }}
                </div>

            </div>
        </div>
    </div>
@endsection
