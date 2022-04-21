@extends('layouts.dashboad')
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Post Table</h4>
                </div>
                <div class="card-body">
                    <table class="table" id="datatablesSimple">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Added by</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">Post Name</th>
                                {{-- <th scope="col">Post Description</th> --}}
                                <th scope="col">Post Image</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($post_show as $data)
                                <tr>
                                    <td>{{ $data->id }}</td>
                                    <td>{{ $data->rtn_user->name }}</td>
                                    <td>{{ $data->rtn_post->category_name }}</td>
                                    <td>{{ $data->post_heading }}</td>
                                    {{-- <td>{{ $data->post_description }}</td> --}}
                                    <td>
                                        <img style="width: 80px" src="{{ asset('uploads/posts') }}/{{ $data->post_image }}" alt="">
                                    </td>

                                    @if ($data->status == 1)
                                        <td><span class="badge bg-dark">{{ 'active' }}</span></td>
                                    @else
                                        <td><span class="badge bg-dark">{{ 'inactive' }}</span></td>
                                    @endif
                                    <td>
                                        <button type="button" class="btn btn-info dropdown-toggle"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            Action
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item"
                                                    href="{{ url('admin/post/edit') }}/{{ $data->id }}">Edit</a>
                                            </li>
                                            <li><a class="dropdown-item"
                                                    href="{{ url('admin/post/delete') }}/{{ $data->id }}">Delete</a>
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
