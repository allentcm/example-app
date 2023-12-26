<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Product;

class CartRepository
{
    private $cart;

    public function __construct()
    {
        $this->cart = [];
    }

    public function addProduct(Product $product): void
    {
        $this->cart[] = $product;
    }

    // other methods...    
}
