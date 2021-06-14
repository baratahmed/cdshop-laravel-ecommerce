<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Category extends Model
{
    use HasFactory;

    public function categories(){
        return $this->hasMany('App\Models\Category','parent_id');
    }

    public function posts(){
        return $this->hasMany(Product::class);
    }
}
