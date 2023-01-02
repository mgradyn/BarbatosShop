<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','isAdmin']);
    }

    public function index()
    {
        $products = Product::latest()->filter(request('search'))->paginate(10)->withQueryString();

        return view('admin.manageProduct.index', ['products' => $products]);
    }

    public function add()
    {
        $categories = Category::all();
        return view('admin.manageProduct.productForm', ['title' =>'Add','categories' => $categories]);
    }

    public function insert(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string'],
            'category_name' => ['required', 'string'],
            'detail' => ['required'],
            'price' => ['required', 'integer'],
            'photo' => ['required', 'file', 'image', 'mimes:jpg,jpeg,png'],
        ]);

        $file = $request->file('photo');
        $ext = $file->getClientOriginalExtension();
        $filename = time().'.'.$ext;
        $file->storeAs('uploads/products', $filename);
        // move('uploads/products/', $filename);
        // $product->photo = $filename;


        $category_name = $request->input('category_name');

        $category = Category::firstOrCreate([
            'name' => $category_name,
            'slug' => preg_replace('/\s+/', '-', $category_name),
        ]);

        $category_id =  $category->id;  

        Product::create([
            'name' => $request->input('name'),
            // 'slug' => preg_replace('/\s+/', '-', $request->input('name')) . "-" . $product->generateId($request->input('name')),
            'category_id' => $category_id,
            'detail'=> $request->input('detail'),
            'price'=> $request->input('price'),
            'photo' => $filename,
        ]);

        return redirect(route('manage-product'))->with('status-success', "Product Added Successfully");

    }

    public function edit($id)
    {
        $product = Product::find($id);

        if(!$product){
            return redirect(route('manage-product'));
        }

        $categories = Category::all();

        $category = Category::firstWhere('id', $product->category_id);
        $category_name = $category->name;

        return view('admin.manageProduct.productForm', ['title' =>'Update', 'product'=>$product, 'categories'=>$categories, 'category_name'=>$category_name]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => ['required', 'string'],
            'category_name' => ['required', 'string '],
            'detail' => ['required'],
            'price' => ['required', 'integer'],
        ]);

        $product = Product::find($id);

        if(!$product)
        {    
            return redirect(route('manage-product'))->with('status-error', "Found no product that match id");
        }

        if($request->hasFile('photo'))
        {
            $this->validate($request, [
                'photo' => ['required', 'file', 'image', 'mimes:jpg,jpeg,png'],
            ]);

            if (Storage::disk('public')->exists('uploads/products/' . $product->photo)) {
                Storage::delete('uploads/products/' . $product->photo);
            }

            $file = $request->file('photo');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->storeAs('uploads/products', $filename);
            $product->photo = $filename;
        }

        $category_name = $request->input('category_name');

        $category = Category::firstOrCreate([
            'name' => $category_name,
            'slug' => preg_replace('/\s+/', '-', $category_name),
        ]);

        $category_id =  $category->id; 

        $product->name = $request->input('name');
        $product->category_id = $category_id;
        $product->detail = $request->input('detail');
        $product->price = $request->input('price');
        $product->update();

        return redirect(route('manage-product'))->with('status-success', "Product updated successfully");
    }


    public function destroy($id)
    {
        $product = Product::find($id);

        if(!$product){
            return redirect(route('manage-product'))->with('status-error', "Found no product that match id");
        }

        if (Storage::disk('public')->exists('uploads/products/' . $product->photo)) {
            Storage::delete('uploads/products/' . $product->photo);
        }

        $product->delete();

        return redirect(route('manage-product'))->with('status-success', "Product deleted successfully");
    }
}
