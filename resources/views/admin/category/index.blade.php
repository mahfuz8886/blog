@extends('layouts.master')

@section('title', 'View Category')

@section('content')

<!-- Modal -->
<div class="modal fade" id="delete-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="{{ URL('admin/delete-category') }}" method="post">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Category with its Post</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <input type="hidden" name="category_delete_id" id="category_delete_id">
                <h5> Are you sure you want to delete this Category with all its post. ?</h5>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger"> Yes Delete </button>
              </div>
        </form>
      </div>
    </div>
  </div>

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

                <div class="table-responsive">
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

    </div>

@endsection


@section('scripts')
    <script>
        $(document).ready(function() {
            $(document).on('click', '.deleteCategoryBtn', function(e) {
                e.preventDefault();
                var category_id = $(this).val();
                $('#category_delete_id').val(category_id);
                $('#delete-modal').modal('show');
            });
        });
    </script>
@endsection
