<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.manageProduct.index', compact('products'));
    }

    public function add()
    {
        $categories = Category::all();
        return view('admin.manageProduct.add', compact('category'));
    }

    private function generateId($name)
    {
        $product = User::where('name', $name)->latest('id')->first();
        if ($product !== null)
        {
            $id = $product->id;
            return $id + 1;
        }
        return 0;
    }

    public function insert(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string'],
            'category_name' => ['required'],
            'detail' => ['required'],
            'price' => ['required', 'integer'],
            'photo' => ['required', 'file', 'image', 'mimes:jpg,jpeg,png'],
        ]);

        $file = $request->file('photo');
        $ext = $file->getClientOriginalExtension();
        $filename = time().'.'.$ext;
        $file->move('uploads/products/', $filename);
        // $product->photo = $filename;


        $category = Category::firstOrCreate([
            'name' -> $request->input('category_name'),
        ]);

        $category_id =  $category->id;  

        Product::create([
            'name' -> $request->input('name'),
            'slug' -> preg_replace('/\s+/', '-', $request->input('name')) . "-" . $product->generateId($request->input('name')),
            'category_id' -> $category_id,
            'detail'-> $request->input('detail'),
            'price'-> $request->input('price'),
            'photo' -> $filename,
        ]);

        return redirect('manageProduct')->with('status', "Product Added Successfully");

    }
}
