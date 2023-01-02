@extends('layouts.app')

@section('content')
    <div class="container">
        <x-alert />
        <div class="row justify-content-center">
            <div class="col-md">
                <div class="search__container">
                    <x-search name="home" />
                </div>

                @if (request('search'))
                    <div class="card mt-3">
                        <div class="card-header">{{ __('Search Result') }} </div>

                        <div class="card-body">
                            @if ($productCount < 1)
                                <p>{{ 'Your search - ' . request('search') . ' - did not match any products.' }}</p>
                            @else
                                <div class="row row-cols-xl-5">
                                    @foreach ($categories as $category)
                                        @foreach ($category->products as $product)
                                            <div class="col d-flex justify-content-center">
                                                <x-card :category="$category" :product="$product" />
                                            </div>
                                        @endforeach
                                    @endforeach

                                </div>
                            @endif
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
                                            <div class="me-4">
                                                <x-card :category="$category" :product="$product" />
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection
