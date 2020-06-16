<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('count')->withTimestamps();
    }

    public function getTotalPrice()
    {
        $sum = 0;
        foreach ($this->products as $product) {
            $sum += $product->getPrice();
        }
        return $sum;
    }

    public function saveOrder($name, $phone, $user_id)
    {
        if ($this->status == 0) {
            $this->name = $name;
            $this->phone = $phone;
            $this->user_id = $user_id;
            $this->status = 1;
            $this->save();
            session()->forget('order_id');
            session(['PIB' => 0]);
            return true;
        }
        return false;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
