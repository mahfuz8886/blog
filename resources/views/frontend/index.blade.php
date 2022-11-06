@extends('layouts.app')

@section('title')
    {{ $setting->meta_title }}
@endsection
@section('meta_description')
{{ $setting->meta_description }}
@endsection
@section('meta_keyword')
{{ $setting->meta_keyword }}
@endsection

@section('content')
{{-- banner --}}
    <div class="bg-danger py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="owl-carousel category-carousel owl-theme">

                        @foreach ($categories as $category)
                            <a href="{{ URL('tutorial/' . $category->slug) }}" class="text-decoration-none">
                                <div class="item">
                                    <div class="card">
                                        <img src="{{ asset('public/upload/category/' . $category->image) }}" alt="">
                                        <div class="card-body text-center">
                                            <h4 class="text-dark"> {{ $category->name }} </h4>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
{{-- banner --}}

{{-- advertisement --}}
    <div class="py-1 bg-gray">
     <div class="container">
          <div class="border text-center p-3">
               <h3> Advertise Here </h3>
          </div>
     </div>
    </div>
{{-- advertisement --}}


{{-- post --}}
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4> Funda of Web IT </h4>
                    <div class="underline"></div>
                    <p>
                         Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis explicabo et pariatur quasi molestias eum, sequi nemo ipsa recusandae dolorem possimus esse cum ipsum optio nulla eveniet laboriosam vitae impedit architecto repudiandae vero iusto expedita. Magnam accusantium corrupti saepe iste?
                    </p>
                </div>
            </div>
        </div>
    </div>
{{-- post --}}


{{-- all categories --}}
<div class="py-5 bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4> All Categories List </h4>
                <div class="underline"></div>
            </div>
            <div class="col-md-3">
                @foreach ($categories as $category)
                    <div class="card card-body mb-3">
                        <a href="{{ URL('tutorial/'.$category->slug) }}" class="text-decoration-none">
                            <h5 class="text-dark mb-0"> {{ $category->slug }} </h5>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
{{-- all categories --}}

{{-- latest posts --}}
<div class="py-5 bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4> Latest Posts </h4>
                <div class="underline"></div>
            </div>
            <div class="col-md-8">
                @foreach ($latest_posts as $post)
                    <div class="card card-body bg-gray shadow mb-3">
                        <a href="{{ URL('tutorial/'.$post->category->slug."/".$post->slug) }}" class="text-decoration-none">
                            <h5 class="text-dark mb-0"> {{ $post->slug }} </h5>
                        </a>
                        <h6> Posted On: {{ $post->created_at->format('d-M-Y') }} </h6>
                    </div>
                @endforeach
            </div>
            <div class="col-md-4">
                <div class="border text-center p-3">
                    <h3> Advertise Here </h3>
               </div>
            </div>
        </div>
    </div>
</div>
{{-- latest posts --}}

@endsection
