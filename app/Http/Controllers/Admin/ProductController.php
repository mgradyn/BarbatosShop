<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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
        return view('admin.manageProduct.add', compact('categories'));
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
        $categories = Category::all();
        $category = Category::where('id', $product->category_id)->first();
        $category_name = $category->name;
        return view('admin.manageProduct.edit', compact('product', 'categories', 'category_name'));
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

        if($request->hasFile('photo'))
        {
            $this->validate($request, [
                'photo' => ['required', 'file', 'image', 'mimes:jpg,jpeg,png'],
            ]);

            $path = 'uploads/products/'.$product->photo;

            if(File::exists($path))
            {
                File::delete($path);
            }

            $file = $request->file('photo');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/products/', $filename);
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
        $path = 'uploads/products/'.$product->photo;
        if(File::exists($path))
        {
            File::delete($path);
        }
        $product->delete();

        return redirect(route('manageProduct'))->with('status', "Product deleted successfully");
    }
}
