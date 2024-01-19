<?php

namespace App\Http\Controllers;

use App\Actions\MeaningAction;
use App\Actions\MenuAction;
use App\Actions\ProductsAction;
use App\Models\Category;


class CategoryController extends Controller
{
    public function selectCategory(Category $category,
                                   MenuAction $menuAction,
                                   MeaningAction $meaningAction,
                                   ProductsAction $productsAction,
    )
    {

        return view('index', [
            'menu' => $menuAction->menu(),
            'product' => $productsAction->get($category->id),
            'meaning' => $meaningAction->get($category->id),
            'category_id' => $category->id
        ]);
    }
}
