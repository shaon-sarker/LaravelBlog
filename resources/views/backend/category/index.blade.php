@extends('layouts.dashboad')
{{-- @include('layouts.nav') --}}
@section('content')
    <div class="container-fluid px-4 mt-4">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h3>Categroy Name</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('category.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Category Name</label>
                                <input type="text" class="form-control" name="category_name"
                                    placeholder="Enter Category Name">
                                @error('category_name')
                                    <div class="alert alert-danger">
                                        <span class="text-danger">{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary mt-2">Add Catgeory</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h4>Category Table</h4>
                    </div>
                    @if (session('delete'))
                    <h6 class="text-white bg-dark p-3">{{ session('delete') }}</h6>
                    @endif
                    <div class="card-body">
                        <table class="table" id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Catgeory Name</th>
                                    <th scope="col">Added by</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($category_info as $data)
                                    <tr>
                                        <td>{{ $data->id }}</td>
                                        <td>{{ $data->category_name }}</td>
                                        <td>{{ $data->rtn_user->name }}</td>
                                        @if ($data->status == 1)
                                            <td><span class="badge bg-dark">{{ 'active' }}</td>
                                        @else
                                        <td><span class="badge bg-dark">{{ 'Inactive' }}</td>
                                        @endif
                                        <td>
                                            <button type="button" class="btn btn-info dropdown-toggle"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                Action
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item"
                                                        href="{{ url('admin/category/edit') }}/{{ $data->id }}">Edit</a>
                                                </li>
                                                <li><a class="dropdown-item"
                                                        href="{{ url('admin/category/delete') }}/{{ $data->id }}">Delete</a>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                @empty
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
