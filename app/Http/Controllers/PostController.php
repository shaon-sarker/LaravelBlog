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
            'feature_post'=>$request->feature_post,
            'created_at'=>Carbon::now(),
        ]);

        $new_post_image = $request->post_image;
        $extension =  $new_post_image->getClientOriginalExtension();
        $new_post_name =   $post_store.'.'.$extension;

        Image::make($new_post_image)->save(base_path('public/uploads/posts/'.$new_post_name));
        Post::find($post_store)->update([
            'post_image'=>$new_post_name,
        ]);

        return back()->with('status', 'Post Added Succesfully');
    }

    public function show(){
        $post_show = Post::all();
        return view('backend.post.view',compact('post_show'));
    }

    public function editpost($id){
        $categories = Category::all();
        $edit_post = Post::find($id);
        return view('backend.post.edit',compact('edit_post','categories'));
    }

    public function updatepost(Request $request){

        if($request->post_image){

            $request->validate([
                'post_image'=>'image',
                // 'post_image'=>'file|size:1024',

            ]);
            $new_post_image = $request->post_image;
            $extension =  $new_post_image->getClientOriginalExtension();
            $new_post_name =   $request->id.'.'.$extension;

            Image::make($new_post_image)->save(base_path('public/uploads/posts/'.$new_post_name));
            Post::find($request->id)->update([
                'post_image'=>$new_post_name,
            ]);
        }
        else{
            Post::find($request->id)->update([
                'category_id'=>$request->category_id,
                'user_id'=>Auth::id(),
                'post_heading'=>$request->post_heading,
                'post_description'=>$request->post_description,
                'feature_post'=>$request->feature_post,
                'updated_at'=>Carbon::now(),
            ]);

        }
        return back()->with('status', 'Post Update Succesfully');
    }

    public function deletepost($id){
        $postimage = Post::find($id);
        $old_post_image = $postimage->post_image;
        $delete_path = public_path().'/uploads/posts/'.$old_post_image;
        unlink($delete_path);
        Post::find($id)->delete();

        return back()->with('status','Post Deleted Succesfully');
    }
}
