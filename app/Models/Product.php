<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\ProductImage;
use App\Models\ProductAttribute;

class Product extends Model
{
    use HasFactory;

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function attributes(){
        return $this->hasMany(ProductAttribute::class,'product_id');
    }

    public function images(){
        return $this->hasMany(ProductImage::class,'product_id');
    }
}
