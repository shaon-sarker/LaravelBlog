<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryPost;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index()
    {
        $category_info = Category::all();
        return view('backend.category.index', compact('category_info'));
    }
    public function insert(CategoryPost $request)
    {
        Category::insert([
            'category_name' => $request->category_name,
            'user_id' => Auth::id(),
            'created_at' => Carbon::now()
        ]);
        return back()->with('status', 'Category Added Succesfully');
    }

    public function editcategory($category_id)
    {
        $edit_category = Category::find($category_id);
        return view('backend.category.edit', compact('edit_category'));
    }

    public function updatecategory(Request $request)
    {
        Category::find($request->category_id)->update([
            'category_name' => $request->category_name,
            'updated_at' => Carbon::now(),
        ]);
        return back()->with('status', 'Category Updated Succesfully');
    }

    public function deletecategory($category_id)
    {
        Category::find($category_id)->delete();
        return back()->with('status', 'Category Delete');

    }
}
