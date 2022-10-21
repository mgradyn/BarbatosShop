@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 ">

                @if ($product)
                    <div class="card mb-3">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="{{ asset('uploads/products/' . $product->photo) }}"
                                    class="p-4 img-fluid rounded-start" alt="product photo">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr>
                                                <td colspan="2">
                                                    <h3 class="card-title">{{ $product->name }}</h5>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-3" scope="row">Detail</td>
                                                <td>{{ $product->detail }}</td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-3" scope="row">Price</td>
                                                <td>{{ 'IDR' . ' ' . $product->price }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="empty__product">
                        There is no product to display
                    </div>
                @endif

            </div>
        </div>
    </div>
@endsection
