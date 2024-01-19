<?php

namespace App\Http\Controllers;

use App\Actions\MeaningAction;
use App\Actions\MenuAction;
use App\Models\Meaning;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function filter(Request $request, MenuAction $menuAction, MeaningAction $meaningAction)
    {
        $filter = $request->post();

        unset($filter['_token']);

        $category = $filter['category'];

        unset($filter['category']);

if (!empty($filter))
{
    $result = Meaning::query()
        ->whereIn('feature_id', collect($filter)->keys())
        ->whereHas('Product', function (Builder $query) use ($category) {
            $query->where('products.category_id', $category);
        })
        ->get()->unique('product_id');


    return view('index', [
        'menu' => $menuAction->menu(),
        'filter' => $result,
        'meaning' => $meaningAction->get($category),
        'category_id' => $category
    ]);
} else {
    return redirect()->route('selectCategory', ['category' => $category]);
}



    }
}
