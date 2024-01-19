<?php
namespace App\Actions;

use App\Models\Category;

class MenuAction
{
    public function menu()
    {
        return Category::all();
    }
}
