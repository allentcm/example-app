<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function promoCode()
    {
        return $this->belongsTo(PromoCode::class);
    }

    public function total()
    {
        $total = 0;
        foreach ($this->products as $product) {
            $total += $product->price;
        }

        if ($this->promoCode) {
            $total -= $total * ($this->promoCode->discount / 100);
        }

        return $total;
    }
}
