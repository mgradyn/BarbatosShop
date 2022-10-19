<?php

namespace Database\Seeders;
use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::firstOrCreate([
            'name' => "Food",
            'slug' => "Food",
        ]);
        Category::firstOrCreate([
            'name' => "Figure",
            'slug' => "Figure",
        ]);
        Category::firstOrCreate([
            'name' => "Book",
            'slug' => "Book",
        ]);
        Category::firstOrCreate([
            'name' => "Camera",
            'slug' => "Camera",
        ]);
        Category::firstOrCreate([
            'name' => "Laptop",
            'slug' => "Laptop",
        ]);
    }
}
