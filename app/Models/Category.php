<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'name', 'slug'
    ];

    // public function scopeFindCategory($query, $filter)
    // {
    //     $query->when($filter ?? false, function($query, $search) {
    //         return $query->firstWhere("id", $search);
    //     });
    // }
}
