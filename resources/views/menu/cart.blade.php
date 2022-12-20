@extends('layouts.app')

@section('content')
    <div class="container mt-5 mb-5">
        <div class="d-flex justify-content-center row">
            <div class="col-md-10">
                @if ($cart && $cart->cart_items)
                    @foreach ($cart->cart_items as $item)
                        <x-cart-product :item="$item" />
                    @endforeach
                    <div class="card fixed-bottom  ">
                        <div class="row justify-content-md-center">
                            <div class="col-md-auto p-2 d-flex align-items-center justify-content-center">
                                {{ __('Total Price: IDR ' . $cart->totalPriceAll) }}
                            </div>
                            <div class="col-md-auto p-2 d-flex align-items-center justify-content-center">
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
                    <x-empty-info info="Please add item to cart first." />
                @endif
            </div>
        </div>
    @endsection
