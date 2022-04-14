@extends('layouts.dashboad')
@section('content')
    <div class="container-fluid px-4 mt-4">
        <div class="row">
            <div class="col-md-7 m-auto">
                <div class="card">
                    <div class="card-header">
                        <h4>Categroy Name</h4>
                    </div>
                    <div class="card-body">
                        {{-- @if (session('success'))
                            <span class="text-success">{{ session('success') }}</span>
                        @endif --}}
                        <form action="{{ route('category.update') }}" method="POST">
                            @csrf
                            <input type="hidden" name="category_id" value="{{ $edit_category->id }}">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Category Name</label>
                                <input type="text" class="form-control" name="category_name"
                                    placeholder="Enter Category Name" value="{{ $edit_category->category_name }}">
                                {{-- @error('category_name')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror --}}
                            </div>
                            <button type="submit" class="btn btn-primary mt-2">Add Catgeory</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
