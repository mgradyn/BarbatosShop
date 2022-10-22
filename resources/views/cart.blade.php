@extends('layouts.app')

@section('content')
    <div class="container mt-5 mb-5">
        <div class="d-flex justify-content-center row">
            <div class="col-md-10">
                @php
                    $i = 0;
                @endphp
                @foreach ($cart_items as $item)
                    <div class="card mb-3">
                        <div class="row g-0">
                            <div class="col-md-3">
                                <img src="{{ asset('uploads/products/' . $item->product()->first()->photo) }}"
                                    class="p-3 img-fluid rounded-start" alt="product photo">
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
                                            <div class="col">{{ 'IDR' . ' ' . $total_price_item[$i] }}</div>
                                        </div>

                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="card-body d-flex justify-content-end">
                                    <a href="{{ route('delete-from-cart', ['item_id' => $item->id]) }}"
                                        class="btn btn-outline-danger"><i class="fa fa-trash"></i></a>
                                </div>

                            </div>
                        </div>
                    </div>
                    @php
                        $i = $i + 1;
                    @endphp
                @endforeach
                {{-- <div class="d-flex justify-content-start">
                    {{ $cart_items->links() }}
                </div> --}}

                <div class="card fixed-bottom  ">
                    <div class="row justify-content-md-center">
                        <div class="col-md-auto p-4 d-flex align-items-center justify-content-center">
                            {{ __('Total Price: IDR ' . $totalPriceAll) }}
                        </div>
                        <div class="col-md-auto p-4 d-flex align-items-center justify-content-center">
                            <button type="submit" class="btn btn-outline-success">
                                {{ __('Purchase') }}
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
