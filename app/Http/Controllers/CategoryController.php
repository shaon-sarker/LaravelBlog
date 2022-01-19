<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryPost;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class CategoryController extends Controller
{
    public function create()
    {
        return view('admin.category.create');
    }
    public function store(CategoryPost $request)
    {
        Category::insert([
            'categoryname' => $request->categoryname,
            'created_at' => Carbon::now(),
        ]);
    }
}
