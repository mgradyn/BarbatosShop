@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md">
                <div class="search__container">
                    <form action="{{ route('home') }}">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search Product" name="search"
                                value={{ request('search') }}>
                            <button class="btn btn-secondary" type="submit">Search</button>
                        </div>
                    </form>
                </div>

                @if (request('search'))
                    <div class="card mt-3">
                        <div class="card-header">{{ __('Search Result') }} </div>

                        <div class="card-body">
                            <div class="row">
                                @foreach ($categories as $category)
                                    @foreach ($category->products as $product)
                                        <a class="col text-decoration-none text-reset"
                                            href="{{ route('view-product', ['slug' => $category->slug, 'id' => $product->id]) }}">
                                            <div class="card m-2" style="min-width: 180px; max-width: 180px;">
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
                                @endforeach
                            </div>
                        </div>
                    </div>
                @else
                    @foreach ($categories as $category)
                        @if (count($category->products))
                            <div class="card mt-3">
                                <div class="card-header">{{ __($category->name) }} <a
                                        href="{{ route('category', ['slug' => $category->slug]) }}">View All</a></div>

                                <div class="card-body">
                                    <div class="d-flex flex-row flex-nowrap overflow-auto">
                                        @foreach ($category->products as $product)
                                            <a class="text-decoration-none text-reset"
                                                href="{{ route('view-product', ['slug' => $category->slug, 'id' => $product->id]) }}">
                                                <div class="card m-2" style="min-width: 180px; max-width: 180px;">
                                                    <img src="{{ asset('storage/uploads/products/' . $product->photo) }}"
                                                        class="card-img-top img-fluid" alt="image-product"
                                                        style="min-height: 180px; max-height: 180px;">
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
                        @endif
                    @endforeach
                @endif

                {{-- <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div> --}}


            </div>
        </div>
    </div>
@endsection
