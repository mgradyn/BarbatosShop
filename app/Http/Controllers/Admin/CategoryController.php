<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function insert(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string'],
        ]);

        $category = Category::firstOrCreate([
            'name' -> $request->input('name'),
            'slug' -> preg_replace('/\s+/', '-', $request->input('name')),
        ]);

        return;
    }
}
