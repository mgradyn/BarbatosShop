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

        if (count($transactions))
        {
            $cart_items = $cart->cartItems()->get();

            // if (count($cart_items))
            // {
                
            //     $totalPriceItem = [];
            //     $totalPriceAll = 0;

            //     foreach($cart_items as $cart_item)
            //     {
            //         $totalPrice = ($cart_item->product()->first()->price * $cart_item->qty);
            //         $totalPriceAll = $totalPriceAll + $totalPrice;
            //         array_push($totalPriceItem, $totalPrice);
            //     }
            // }
        }
        // return view('history', ['cart_items' => $cart_items, 'total_price_item' => $totalPriceItem, 'totalPriceAll' => $totalPriceAll]);   
    }

    public function addToTransaction($cart_id)
    {
        $cart = Cart::find($cart_id);

        if(!$cart){
            return redirect(route('home'))->with('status','Error, cart is empty!');
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
            // dd($cart_item);

            // $cart_item->delete();
        }

        $cart->delete();

        return redirect(route('home'))->with('status','Thank you for purchasing!');
    }
}
