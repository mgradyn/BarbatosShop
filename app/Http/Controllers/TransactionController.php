<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Transaction;
use App\Models\Transaction_detail;
use Illuminate\Support\Facades\Auth;


class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','isCustomer']);
    }

    public function index()
    {
        $transactions = Transaction::where('user_id', Auth::user()->id)->get();

        // dd($transactions);

        foreach ($transactions as $transaction)
        {
            $transactionDetails = $transaction->transactionDetails()->get();
            $totalPriceTransaction = 0;
            $totalQuantityTransaction = 0;

            foreach ($transactionDetails as $transactionDetail)
            {
                $subQuantity = $transactionDetail->qty;

                $subProduct = $transactionDetail->product()->first();

                // $subProduct = $transactionDetail->product()->withTrashed()->first();
                
                $transactionDetail->product = $subProduct;

                $subPrice = $transactionDetail->product->price * $subQuantity;

                $transactionDetail->subPrice = $subPrice;

                $totalPriceTransaction = $totalPriceTransaction + $subPrice;

                $totalQuantityTransaction = $totalQuantityTransaction + $subQuantity;
            }
            $transaction->totalPriceTransaction =  $totalPriceTransaction;

            $transaction->totalQuantityTransaction = $totalQuantityTransaction;

            $transaction->transactionDetails = $transactionDetails;
        }
    
        return view('history', ['transactions'=> $transactions]);   
    }

    public function addToTransaction($cart_id)
    {
        $cart = Cart::find($cart_id);

        if(!$cart){
            return redirect(route('home'))->with('status-error','Error, cart is empty!');
        }

        $transaction = Transaction::Create([
            'user_id' => Auth::user()->id,
        ]);

        $cart_items = $cart->cartItems()->get();

        if (count($cart_items))
        {
            foreach($cart_items as $cart_item)
            {
                $transactionDetail = Transaction_detail::Create([
                    'transaction_id' => $transaction->id, 
                    'product_id' => $cart_item->product_id,
                    'qty' => $cart_item->qty,
                ]);
                // dd($transactionDetail);
            }
        }

        $cart->delete();

        return redirect(route('home'))->with('status-success','Thank you for purchasing!');
    }
}
