<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Cart_item;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','isCustomer']);
    }

    public function index()
    {
        $cart = Cart::where('user_id', Auth::user()->id)->first();

        if ($cart)
        {
            $cart_items = $cart->cartItems()->get();

            if (count($cart_items))
            {
                
                $totalPriceAll = 0;

                foreach($cart_items as $cart_item)
                {
                    $product = $cart_item->product()->first();
                    $totalPrice = ($product->price * $cart_item->qty);
                    $totalPriceAll = $totalPriceAll + $totalPrice;

                    $cart_item->totalPrice = $totalPrice;
                    $cart_item->product = $product;
                }
                $cart->totalPriceAll = $totalPriceAll;
                $cart->cart_items = $cart_items;
            }
            
        }
        return view('menu.cart', ['cart'=> $cart]);  
        
    }

    public function addToCart(Request $request, $product_id)
    {
        $this->validate($request, [
            'qty' => ['required', 'integer', 'min:1'],
        ]);

        $cart = Cart::firstOrCreate([
            'user_id' => Auth::user()->id,
        ]);
        
        $cartItem = Cart_item::updateOrCreate(
            ['cart_id' => $cart->id, 'product_id' => $product_id],
            ['qty' => $request->input('qty')]
        );
        return Redirect::back()->with('status-success','Product is added to cart!');
    }

    public function destroyItem($id)
    {
        $cartItem = Cart_item::find($id);

        if(!$cartItem){
            return redirect(route('cart'))->with('status-error','Error, no item to remove!');
        }

        $cartItem->delete();

        return redirect(route('cart'))->with('status-success', "item removed successfully");
    }   
}