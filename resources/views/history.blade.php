@extends('layouts.app')

@section('content')
    <div class="container mt-5 mb-5">
        <div class="d-flex justify-content-center row">
            <div class="col-md-10">
                @if ($transactions)
                    <div class="accordion" id="accordion">
                        @foreach ($transactions as $transaction)
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne" {{ 'heading' . $transaction->id }}>
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target={{ '#collapse' . $transaction->id }} aria-expanded="true"
                                        aria-controls={{ 'collapse' . $transaction->id }}>
                                        {{ __('Transaction Date') . ' ' . $transaction->created_at }}

                                    </button>
                                </h2>
                                <div id={{ 'collapse' . $transaction->id }} class="accordion-collapse collapse show"
                                    aria-labelledby={{ 'heading' . $transaction->id }} data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="table-responsive">
                                            <table class="table table-invoice">
                                                <thead>
                                                    <tr>
                                                        <th>{{ __('Name') }}</th>
                                                        <th width="20%">{{ __('Quantity') }}</th>
                                                        <th class="text-right" width="20%">{{ __('Sub Price') }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($transaction->transactionDetails as $transactionDetail)
                                                        <tr>
                                                            <td>
                                                                {{ $transactionDetail->product->name }}
                                                            </td>
                                                            <td>{{ $transactionDetail->qty }}
                                                            </td>
                                                            <td class="text-right">
                                                                {{ __('IDR ') . $transactionDetail->subPrice }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>{{ __('Total') }}</th>
                                                        <th>
                                                            {{ $transaction->totalQuantityTransaction . __(' Items(s)') }}
                                                        </th>
                                                        <th class="text-right">
                                                            {{ __('IDR ') . $transaction->totalPriceTransaction }}</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="empty__transaction">
                        <div class="card mb-3">
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h3 class="card-title">{{ __('Transaction empty') }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
