<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'category_id', 'desc', 'img', 'price'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getPrice()
    {
        return $this->price * $this->pivot->count;
    }
}
