<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'category_id',
        'detail',
        'price',
        'photo'
    ];

    public function scopeFilter($query, $filter)
    {
        $query->when($filter ?? false, function($query, $filter) {
            return $query->where("name", "LIKE", "%$filter%");
        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
