<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        return view('categories',[
            'title' => 'Categories',
            'active' => 'categories',
            'categories' => Category::all()
        ]);
    }
}
