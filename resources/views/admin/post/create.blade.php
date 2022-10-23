@extends('layouts.master')

@section('title', 'Add Post')

@section('content')

    <div class="container-fluid px-4">

        <div class="card mt-4">

            <div class="card-header">
               <h4>
                    Add Post
               </h4>
            </div>

            <div class="card-body">

               @if ($errors->any())
                   <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                   </div>
               @endif

               <form action="{{ URL('admin/add-post') }}" method="post">
                    @csrf

                    <div class="mb-3">
                         <label for="">Category</label>
                         <select name="category_id" id="" class="form-select">
                              <option value="">-Select Category</option>
                              @foreach ($category as $item)
                                   <option value="{{ $item->id }}">{{ $item->name }}</option>
                              @endforeach
                         </select>
                    </div>

                    <div class="mb-3">
                         <label for="">Post Name</label>
                         <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                    </div>
                    
                    <div class="mb-3">
                         <label for="">Slug</label>
                         <input type="text" class="form-control" name="slug" value="{{ old('slug') }}">
                    </div>

                    <div class="mb-3">
                         <label for="">Description</label>
                         <textarea name="description" rows="4" class="form-control" id="my_summernote">{{ old('description') }}</textarea>
                    </div>

                    <div class="mb-3">
                         <label for="">YouTube Iframe Link</label>
                         <input type="text" class="form-control" name="yt_iframe" value="{{ old('yt_iframe') }}">
                    </div>

                    <h4>SEO Tags</h4>
                    <div class="mb-3">
                         <label for="">Meta Title</label>
                         <input type="text" class="form-control" name="meta_title" value="{{ old('meta_title') }}">
                    </div>

                    <div class="mb-3">
                         <label for="">Meta Description</label>
                         <textarea name="meta_description" rows="3" class="form-control">{{ old('meta_description') }}</textarea>
                    </div>

                    <div class="mb-3">
                         <label for="">Meta Keyword</label>
                         <textarea name="meta_keyword" rows="3" class="form-control">{{ old('meta_keyword') }}</textarea>
                    </div>

                    <h4>Status</h4>
                    <div class="row">

                         <div class="col-md-4 mb-3">
                              <label for="">Status</label>
                              <input type="checkbox" name="status" class="" value="">
                         </div>

                         <div class="col-md-8 mb-3">
                              <button type="submit" class="btn btn-primary">Save Post</button>
                         </div>
                    </div>
               </form>

            </div>

        </div>

    </div>

@endsection
