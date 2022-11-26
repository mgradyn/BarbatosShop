@extends('layouts.app')

@section('content')
    <div class="container mt-5 mb-5">
        <div class="d-flex justify-content-center row">
            <div class="col-md-10">
                @if ($cart && $cart->cart_items)
                    @foreach ($cart->cart_items as $item)
                        <div class="card mb-3">
                            <div class="row g-0">
                                <div class="col-md-3">
                                    <img src="{{ asset('storage/uploads/products/' . $item->product->photo) }}"
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
                                                <div class="col">{{ 'IDR' . ' ' . $item->totalPrice }}</div>
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
                    @endforeach
                    <div class="card fixed-bottom  ">
                        <div class="row justify-content-md-center">
                            <div class="col-md-auto p-4 d-flex align-items-center justify-content-center">
                                {{ __('Total Price: IDR ' . $cart->totalPriceAll) }}
                            </div>
                            <div class="col-md-auto p-4 d-flex align-items-center justify-content-center">
                                <form method="POST" action="{{ route('add-to-transaction', ['cart_id' => $cart->id]) }}"
                                    id="add_transaction_form" enctype="multipart/form-data">
                                    @csrf
                                    <button class="btn btn-outline-success" type="submit">
                                        {{ __('Purchase') }}
                                    </button>
                                </form>
                            </div>

                        </div>
                    </div>
                @else
                    <div class="empty__cart">
                        <div class="card mb-3">
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h3 class="card-title">{{ __('Add item to cart first') }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                {{-- <div class="d-flex justify-content-start">
                    {{ $cart_items->links() }}
                </div> --}}


            </div>
        </div>
    @endsection
