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
                
                $totalPriceItem = [];
                $totalPriceAll = 0;

                foreach($cart_items as $cart_item)
                {
                    $totalPrice = ($cart_item->product()->first()->price * $cart_item->qty);
                    $totalPriceAll = $totalPriceAll + $totalPrice;
                    array_push($totalPriceItem, $totalPrice);
                }
                return view('cart', ['cart_id'=> $cart->id, 'cart_items' => $cart_items, 'total_price_item' => $totalPriceItem, 'totalPriceAll' => $totalPriceAll]);   
            }
            
        }
        return redirect(route('home'))->with('status', "Add product to cart to fill your cart");
        
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
        return Redirect::back()->with('status','Product is added to cart!');
    }

    public function destroyItem($id)
    {
        $cartItem = Cart_item::find($id);

        if(!$cartItem){
            return redirect(route('cart'))->with('status','Error, no item to remove!');
        }

        $cartItem->delete();

        return redirect(route('cart'))->with('status', "item removed successfully");
    }

    // public function destroy($id)
    // {
    //     $cart = Cart::find($id);

    //     if(!$cart){
    //         return redirect(route('home'))->with('status','Error, no cart to delete!');
    //     }

    //     $cart->delete();

    //     return redirect(route('home'))->with('status', "Cart removed successfully");
    // }
}