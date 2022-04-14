@extends('layouts.dashboad')
@section('content')
<div class="container-fluid px-4 mt-4">
    <div class="row">
        <div class="col-md-8 m-auto" >
            <div class="card">
                <div class="card-header">
                    <h3>Categroy Name</h3>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <span class="text-white bg-dark">{{ session('success') }}</span>
                    @endif
                    <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Category Name</label>
                                <select name="category_id" class="form-control">
                                    <option value="">--Select Category--</option>
                                    @foreach ($categories as $category )
                                    <option {{ old('category_id')== $category->id?'selected':'' }} value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            @error('category_id')
                                <div class="alert alert-danger">
                                    <span class="text-danger">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Post Heading</label>
                            <input type="text" class="form-control" name="post_heading"
                                placeholder="Enter Post Name">
                            @error('post_heading')
                                <div class="alert alert-danger">
                                    <span class="text-danger">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Post Image</label>
                            <input type="file" class="form-control" name="post_image">
                            @error('post_image')
                                <div class="alert alert-danger">
                                    <span class="text-danger">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Post Description</label>
                            <textarea name="post_description" id="" class="form-control" cols="30" rows="10"></textarea>
                            @error('post_description')
                                <div class="alert alert-danger">
                                    <span class="text-danger">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mt-2">Add Post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
{{-- @section('footer_script')
<script>
    tinymce.init({
      selector: 'textarea#myeditorinstance', // Replace this CSS selector to match the placeholder element for TinyMCE
      plugins: 'code table lists',
      toolbar: 'undo redo | formatselect| bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table'
    });
  </script>
@endsection --}}
