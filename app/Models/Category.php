<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Category extends Model
{
    use Sluggable, HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function items()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }

    public function subCategory()
    {
        return $this->hasMany(Category::class, 'cat_ust', 'id');
    }

    public function getTotalProductCount()
    {
        $total = $this->items()->count();

        foreach ($this->subCategory as $childCategory) {
            $total += $childCategory->items()->count();
        }

        return $total;
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
