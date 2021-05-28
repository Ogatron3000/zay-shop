<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getFeaturedAttribute($featured)
    {
        return $featured == 1 ? 'Yes' : 'No';
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
