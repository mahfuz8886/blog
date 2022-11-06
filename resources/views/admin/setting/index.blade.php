@extends('layouts.master')

@section('title', 'Blog Dashboard')

@section('content')

    <div class="container-fluid p-4">
        <div class="row">
          <div class="col-md-12">
               @if (session('message'))
                   <h4 class="alert alert-warning"> {{ session('message') }} </h4>
               @endif
               <div class="card">
                    <div class="card-header">
                         <h4> Website Setting </h4>
                    </div>
                    <div class="card-body">
                         <form action="{{ URL('admin/settings') }}" method="post" enctype="multipart/form-data">
                              @csrf
                              <div class="mb-3">
                                   <label for=""> Website Name </label>
                                   <input type="text" name="website_name" required value="{{ $setting->website_name ?? '' }}" class="form-control">
                              </div>
                              <div class="mb-3">
                                   <label for=""> Website Logo </label>
                                   <input type="file" name="website_logo" required class="form-control">
                                   @if ($setting)
                                       <img src="{{ asset('upload/setting'.$setting->logo) }}" width="70px" height="70px" alt="Logo">
                                   @endif
                              </div>
                              <div class="mb-3">
                                   <label for=""> Website Favicon </label>
                                   <input type="file" name="website_favicon" class="form-control">
                                   @if ($setting)
                                       <img src="{{ asset('upload/setting'.$setting->favicon) }}" width="70px" height="70px" alt="Favicon">
                                   @endif
                              </div>
                              <div class="mb-3">
                                   <label for=""> Description </label>
                                   <textarea name="description" class="form-control" rows="3">{{ $setting->description ?? '' }} </textarea>
                              </div>

                              <h4> SEO - Meta Tags</h4>
                              <div class="mb-3">
                                   <label for=""> Meta Title </label>
                                   <input type="text" name="meta_title" class="form-control" value="{{ $setting->meta_title ?? '' }}">
                              </div>
                              <div class="mb-3">
                                   <label for=""> Meta Keyword </label>
                                   <textarea name="meta_keyword" class="form-control" rows="3"> {{ $setting->meta_keyword ?? '' }} </textarea>
                              </div>
                              <div class="mb-3">
                                   <label for=""> Meta Description </label>
                                   <textarea name="meta_description" class="form-control" rows="3"> {{ $setting->meta_description ?? '' }} </textarea>
                              </div>
                              <div class="mb-3">
                                   <button type="submit" class="btn btn-primary"> Save </button>
                              </div>
                         </form>
                    </div>
               </div>
          </div>
        </div>
    </div>
    
@endsection
