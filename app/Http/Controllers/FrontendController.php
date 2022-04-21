<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        $featured_post = Post::where('feature_post','featurepost')->limit(1)->get();
        $blog_post = Post::where('feature_post',NULL)->get();
        $category_show = Category::all();
        return view('frontend',compact('featured_post','blog_post','category_show'));
    }
}
