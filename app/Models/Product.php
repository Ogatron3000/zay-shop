<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function getRouteKeyName(){
        return 'slug';
    }

    public function presentPrice()
    {
        return '$' . number_format($this->price / 100, 2);
    }

    public function path()
    {
        return '/shop/' . $this->slug;
    }

    public function scopeMightAlsoLike($query)
    {
        return $query->inRandomOrder()->take(4);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function sex()
    {
        return $this->belongsTo(Sex::class);
    }
}
