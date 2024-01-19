<?php

namespace App\Http\Controllers;

use App\Actions\MenuAction;
use Illuminate\Http\Request;
use Illuminate\View\View;

class IndexController extends Controller
{
    public function index(MenuAction $menuAction): View
    {

        return view('index', ['menu' => $menuAction->menu()]);
    }
}
