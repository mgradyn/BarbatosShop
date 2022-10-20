<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','isAdmin']);
    }
    
    public function insert(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string'],
        ]);

        $category = Category::firstOrCreate([
            'name' -> $request->input('name'),
            'slug' -> Str::slug($request->input('name'), '-'),
        ]);

        return;
    }
}
