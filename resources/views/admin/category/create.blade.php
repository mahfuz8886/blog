@extends('layouts.master')

@section('title', 'Add Category')

@section('content')

<div class="container-fluid px-4">
     <div class="card mt-4">
          <div class="card-header">
               <h4 class="">Add Category</h4>
          </div>
          <div class="card-body">


               @if ($errors->any())
                   <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                   </div>
               @endif


               <form action="{{ URL('admin/add-category') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                         <label for="">Category Name</label>
                         <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                    </div>

                    <div class="mb-3">
                         <label for="">Slug</label>
                         <input type="text" name="slug" class="form-control" value="{{ old('slug') }}">
                    </div>

                    <div class="mb-3">
                         <label for="">Category Description</label>
                         <textarea name="description" rows="5" class="form-control">{{ old('description') }}</textarea>
                    </div>

                    <div class="mb-3">
                         <label for="">Image</label>
                         <input type="file" name="image" class="form-control">
                    </div>

                    <h6>SEO Tags</h6>
                    <div class="mb-3">
                         <label for="">Meta Title</label>
                         <input type="text" name="meta_title" class="form-control" value="{{ old('meta_title') }}">
                    </div>

                    <div class="mb-3">
                         <label for="">Meta Description</label>
                         <textarea name="meta_description" rows="5" class="form-control">{{ old('meta_description') }}</textarea>
                    </div>

                    <div class="mb-3">
                         <label for="">Meta Keywords</label>
                         <textarea name="meta_keyword" rows="5" class="form-control">{{ old('meta_keyword') }}</textarea>
                    </div>

                    <h6>Status Mode</h6>
                    <div class="row">

                         <div class="col-md-3 mb-3">
                              <label for="">Navbar Status</label>
                              <input type="checkbox" name="navbar_status" class="" value="{{ old('navbar_status') }}">
                         </div>

                         <div class="col-md-3 mb-3">
                              <label for="">Status</label>
                              <input type="checkbox" name="status" class="" value="{{ old('status') }}">
                         </div>

                         <div class="col-md-6 mb-3">
                              <button type="submit" class="btn btn-primary">Save Category</button>
                         </div>
                    </div>

               </form>

          </div>
     </div>
</div>

@endsection