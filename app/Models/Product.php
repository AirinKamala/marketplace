<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Str;
use function Laravel\Prompts\search;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['productName', 'slug', 'price', 'stock'];

    protected function setSLug($productName)
    {
        $this->productName = $productName;
        $this->attributes['slug'] = Str::slug($this->productName, '-');
    }

    public function categories()
    {
        return $this->belongsTo(Category::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    // untuk categories
    public function scopeFilter(Builder $query, array $filters): void
    {
        $query->when($filters['search'] ?? false, fn ($query, $search) =>
            $query->where('productName', 'like', "%{$search}%"));
    }


}
