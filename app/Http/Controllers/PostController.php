<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;

class PostController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('backend.post.index',compact('categories'));
    }

    public function insert(PostRequest $request){
        $post_store = Post::insertGetId([
            'category_id'=>$request->category_id,
            'user_id'=>Auth::id(),
            'post_heading'=>$request->post_heading,
            'post_description'=>$request->post_description,
            'created_at'=>Carbon::now(),
        ]);

        $new_post_image = $request->post_image;
        $extension =  $new_post_image->getClientOriginalExtension();
        $new_post_name =   $post_store.'.'.$extension;

        Image::make($new_post_image)->save(base_path('public/uploads/posts/'.$new_post_name));
        Post::find($post_store)->update([
            'post_image'=>$new_post_name,
        ]);

        return redirect()->back()->with('success','Post Added Successfully');
    }

    public function show(){
        $post_show = Post::all();
        return view('backend.post.view',compact('post_show'));
    }
}
