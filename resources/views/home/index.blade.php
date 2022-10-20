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

                @foreach ($categories as $category)
                    @if (count($category->products))
                        <div class="card mt-3">
                            <div class="card-header">{{ __($category->name) }} <a
                                    href="{{ route('category', ['slug' => $category->slug]) }}">View All</a></div>

                            <div class="card-body">
                                <div class="d-flex flex-row flex-nowrap overflow-auto">
                                    @foreach ($category->products as $product)
                                        <div class="card m-2" style="min-width: 180px; max-width: 180px;">
                                            <img src="{{ asset('uploads/products/' . $product->photo) }}"
                                                class="card-img-top" alt="image-product">
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
                    @endif
                @endforeach



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
