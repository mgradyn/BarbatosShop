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
        $products = Product::latest()->filter(request('search'))->paginate(15)->withQueryString();

        return view('admin.manageProduct.index', ['products' => $products]);

        // cara 1
        // $products = Product::all();
        // $request_search = request('search');

        // if ($request_search){
        //     $products= Product::where("name", "LIKE", "%$request_search%")->get();
        // }

        // cara 2
        // $products = Product::latest();
        
        // $request_search = request('search');

        // if ($request_search){
        //     $products->where("name", "LIKE", "%$request_search%");
        // }
        // $products = $products->get();
    }

    public function add()
    {
        $categories = Category::all();
        return view('admin.manageProduct.add', ['categories' => $categories]);
    }

    // private function generateId($name)
    // {
    //     $product = User::where('name', $name)->latest('id')->first();
    //     if ($product !== null)
    //     {
    //         $id = $product->id;
    //         return $id + 1;
    //     }
    //     return 0;
    // }

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

        return redirect(route('manageProduct'))->with('status', "Product Added Successfully");

    }

    public function edit($id)
    {
        $product = Product::find($id);

        if(!$product){
            return redirect(route('manageProduct'));
        }

        $categories = Category::all();

        // $category = (Category::latest()->findCategory($product->category_id)->get())[0];
        $category = Category::firstWhere('id', $product->category_id);
        $category_name = $category->name;
        return view('admin.manageProduct.edit', ['product'=>$product, 'categories'=>$categories, 'category_name'=>$category_name]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => ['required', 'string'],
            'category_name' => ['required'],
            'detail' => ['required'],
            'price' => ['required', 'integer'],
        ]);

        $product = Product::find($id);

        if(!$product)
        {    
            return redirect(route('manageProduct'))->with('status', "Found no product that match id");
        }

        if($request->hasFile('photo'))
        {
            $this->validate($request, [
                'photo' => ['required', 'file', 'image', 'mimes:jpg,jpeg,png'],
            ]);

            // $path = 'uploads/products/'.$product->photo;
            if (Storage::disk('public')->exists('uploads/products/' . $product->photo)) {
                Storage::delete('uploads/products/' . $product->photo);
            }

            // if(File::exists($path))
            // {
            //     File::delete($path);
            // }

            $file = $request->file('photo');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            // $file->move('uploads/products/', $filename);
            $file->storeAs('uploads/products', $filename);
            $product->photo = $filename;
        }

        $category = Category::firstOrCreate([
            'name' => $request->input('category_name'),
        ]);

        $category_id =  $category->id; 

        $product->name = $request->input('name');
        // $product->slug = preg_replace('/\s+/', '-', $request->input('name')) . "-" . $product->generateId($request->input('name'));
        $product->category_id = $category_id;
        $product->detail = $request->input('detail');
        $product->price = $request->input('price');
        $product->update();

        return redirect(route('manageProduct'))->with('status', "Product updated successfully");
    }


    public function destroy($id)
    {
        $product = Product::find($id);

        if(!$product){
            return redirect(route('manageProduct'))->with('status', "Found no product that match id");
        }

        // $path = 'uploads/products/'.$product->photo;
        // if(File::exists($path))
        // {
        //     File::delete($path);
        // }

        if (Storage::disk('public')->exists('uploads/products/' . $product->photo)) {
            Storage::delete('uploads/products/' . $product->photo);
        }

        $product->delete();

        return redirect(route('manageProduct'))->with('status', "Product deleted successfully");
    }
}
