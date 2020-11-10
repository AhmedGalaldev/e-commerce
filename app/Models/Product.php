<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function brands()
    {
        return $this->belongsToMany('App\Models\Brand', 'brand_product');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category', 'category_product');
    }

    public function getPriceAttribute($value)
    {

        return '$' . $value;
    }
    public function getDescriptionAttribute($value)
    {
        return ucfirst($value);
    }
}
