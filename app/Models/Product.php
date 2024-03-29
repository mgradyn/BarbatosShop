<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    // use SoftDeletes;

    protected $table = 'products';

    // protected $dates = ['deleted_at'];

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
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function cartItem()
    {
        return $this->hasMany(Cart_item::class, 'product_id', 'id');
    }

    public function transactionDetail()
    {
        return $this->hasMany(Transaction_detail::class, 'product_id', 'id');
    }
}
