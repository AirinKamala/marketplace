<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Str;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['productName','slug', 'price', 'stock'];

    protected function setSLug ($productName) {
        $this->productName = $productName;
        $this->attributes['slug'] = Str::slug($this->productName, '-');
    }
}
