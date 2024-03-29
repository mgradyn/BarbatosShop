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

        $productCount = 0;
        foreach($categories as $category)
        {
            foreach ($category->products as $product)
            {
                $productCount += 1;
            }
        }

        return view('home.index', ['categories' => $categories, 'productCount' => $productCount]);
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
                $cartItem_qty = null;
                if (Auth::check() && Auth::user()->role_as == '0'){
                    $cart = Auth::user()->cart()->first();
                    if ($cart)
                    {
                        $cart_id = $cart->id;
                        $cartItem = $product->cartItem()->where('product_id', '=', $product->id)->where('cart_id', '=', $cart_id)->first();
                        if ($cartItem)
                        {
                            $cartItem_qty = $cartItem->qty;
                        }
                        
                    }
                }
               
                return view('home.view', ['product' => $product, 'cartItem_qty'=>$cartItem_qty]);
            }
        }
        return redirect(route('home'));
    }
}
