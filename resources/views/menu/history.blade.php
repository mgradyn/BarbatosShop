@extends('layouts.app')

@section('content')
    <div class="container mt-5 mb-5">
        <div class="d-flex justify-content-center row">
            <div class="col-md-10">
                @if (count($transactions) > 0)
                    <div class="accordion" id="accordion">
                        @foreach ($transactions as $transaction)
                            <x-history-accordion :transaction="$transaction" />
                        @endforeach
                    </div>
                @else
                    <x-empty-info info="Transaction history is empty." />
                @endif
            </div>
        </div>
    </div>
@endsection
