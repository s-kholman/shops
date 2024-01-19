<?php

namespace App\Actions;

use App\Models\Meaning;
use Illuminate\Database\Eloquent\Builder;

class MeaningAction
{
    public function get($category_id)
    {

        return Meaning::query()
            ->whereHas('Product', function (Builder $query) use ($category_id){
                $query->where('products.category_id', $category_id);
            })
            ->get();


    }
}
