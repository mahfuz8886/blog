@extends('layouts.master')

@section('title', 'Edit Post')

@section('content')

    <div class="container-fluid px-4">

        <div class="card mt-4">

            <div class="card-header">
               <h4>
                    Edit Post
                    <a href="{{ URL('admin/post') }}" class="btn btn-danger float-end">Back</a>
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

               <form action="{{ URL('admin/update-post/'.$post->id) }}" method="post">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                         <label for="">Category</label>
                         <select name="category_id" id="" class="form-select" required>
                              <option value="">-Select Category</option>
                              @foreach ($category as $item)
                                   <option value="{{ $item->id }}" {{ $post->category_id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                              @endforeach
                         </select>
                    </div>

                    <div class="mb-3">
                         <label for="">Post Name</label>
                         <input type="text" class="form-control" name="name" value="{{ $post->name }}">
                    </div>
                    
                    <div class="mb-3">
                         <label for="">Slug</label>
                         <input type="text" class="form-control" name="slug" value="{{ $post->slug }}">
                    </div>

                    <div class="mb-3">
                         <label for="">Description</label>
                         <textarea name="description" rows="4" class="form-control">{!! $post->description !!}</textarea>
                    </div>

                    <div class="mb-3">
                         <label for="">YouTube Iframe Link</label>
                         <input type="text" class="form-control" name="yt_iframe" value="{{ $post->yt_iframe }}">
                    </div>

                    <h4>SEO Tags</h4>
                    <div class="mb-3">
                         <label for="">Meta Title</label>
                         <input type="text" class="form-control" name="meta_title" value="{{ $post->meta_title }}">
                    </div>

                    <div class="mb-3">
                         <label for="">Meta Description</label>
                         <textarea name="meta_description" rows="3" class="form-control">{!! $post->meta_description !!}</textarea>
                    </div>

                    <div class="mb-3">
                         <label for="">Meta Keyword</label>
                         <textarea name="meta_keyword" rows="3" class="form-control">{!! $post->meta_keyword !!}</textarea>
                    </div>

                    <h4>Status</h4>
                    <div class="row">

                         <div class="col-md-4 mb-3">
                              <label for="">Status</label>
                              <input type="checkbox" name="status" class=""{{ $post->status == '1' ? 'checked' : '' }}>
                         </div>

                         <div class="col-md-8 mb-3">
                              <button type="submit" class="btn btn-primary">Update Post</button>
                         </div>
                    </div>
               </form>

            </div>

        </div>

    </div>

@endsection
