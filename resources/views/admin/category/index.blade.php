@extends('layouts.master')

@section('title', 'View Category')

@section('content')

    <div class="container-fluid px-4">

        <div class="card mt-4">

            <div class="card-header">
                <h4>
                    View Category
                    <a href="{{ URL('admin/add-category') }}" class="btn btn-primary btn-sm float-end">Add Category</a>
                </h4>
            </div>

            <div class="card-body">

                @if (session('status'))
                    <div class="atert alert-success p-3">{{ session('status') }}</div>
                @endif

                <table id="myTable" class="table table-bordered">

                    <thead>

                        <tr>
                            <th>ID</th>
                            <th>Category Name</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>

                    </thead>

                    <tbody>

                        @foreach ($category as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>
                                    <img src="{{ asset('public/upload/category/' . $item->image) }}" width="50px"
                                        height="50px" alt="img">
                                </td>
                                <td>{{ $item->status == '1' ? 'Hidden' : 'Show' }}</td>
                                <td>
                                    <a href="{{ URL('admin/edit-category/' . $item->id) }}" class="btn btn-success">Edit</a>
                                </td>
                                <td>
                                    {{-- <a href="{{ URL('admin/delete-category/' . $item->id) }}"
                                        class="btn btn-danger"> Delete </a> --}}
                                        <button type="button" class="btn btn-danger deleteCategoryBtn" value="{{ $item->id }}"> Delete </button>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>

    </div>

@endsection


@section('scripts')
    <script>
        $(document).ready(function() {
            $('.deleteCategoryBtn').click(function(e) {
                e.preventDefault();
                var value = $(this).val();
            });
        });
    </script>
@endsection
