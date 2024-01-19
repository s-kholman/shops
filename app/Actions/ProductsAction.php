<?php

namespace App\Actions;

use App\Models\Product;

class ProductsAction
{
    public function get($category_id)
    {
        return Product::query()->where('category_id', $category_id)->simplePaginate(1);
    }
}
