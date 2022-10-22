<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::with(['products' => function($query) {
            $query->filter(request('search'));
        }])->get();

        return view('home.index', ['categories' => $categories]);
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->first();

        if(!$category){
            return redirect(route('home'));
        }
        $products = $category->products()->paginate(10);

        return view('home.category', ['products' => $products, 'category' => $category]);
    }

    public function viewProduct($slug, $id)
    {
        $category = Category::where('slug', $slug)->first();
        
        if($category){
            $product = $category->products()->find($id);
            if ($product){
                $cart = Auth::user()->cart()->first();
                $cartItem_qty = null;
                if ($cart)
                {
                    $cart_id = $cart->id;
                    $cartItem = $product->cartItem()->where('product_id', '=', $product->id)->where('cart_id', '=', $cart_id)->first();
                    if ($cartItem)
                    {
                        $cartItem_qty = $cartItem->qty;
                    }
                    
                }
                return view('home.view', ['product' => $product, 'cartItem_qty'=>$cartItem_qty]);
            }
        }
        return redirect(route('home'));
    }
}
