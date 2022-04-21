@extends('layouts.dashboad')
@section('content')
<div class="container-fluid px-4 mt-4">
    <div class="row">
        <div class="col-md-8 m-auto" >
            <div class="card">
                <div class="card-header">
                    <h3>Post Edit Name</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('post.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $edit_post->id }}">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Category Name</label>
                                <select name="category_id" class="form-control">
                                    <option value="">--Select Category--</option>
                                    @foreach ($categories as $category )
                                    <option {{ $edit_post->category_id== $category->id?'selected':'' }} value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Post Heading</label>
                            <input type="text" class="form-control" name="post_heading"
                                placeholder="Enter Post Name" value="{{ $edit_post->post_heading }}">

                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Post Image</label>
                            <input type="file" class="form-control" name="post_image">
                            <img style="width: 120px" src="{{ asset('uploads/posts') }}/{{ $edit_post->post_image }}" alt="">
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="featurepost" name="feature_post">
                            <label class="form-check-label" for="flexCheckDefault">
                              Feature Post
                            </label>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Post Description</label>
                            <textarea name="post_description" id="" class="form-control" cols="30" rows="10">{{ $edit_post->post_description }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-success mt-2">Update Post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
