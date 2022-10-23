@extends('layouts.app')

@section('title')
    {{ $category->meta_title }}
@endsection
@section('meta_description')
    {{ $category->meta_description }}
@endsection
@section('meta_keyword')
    {{ $category->meta_keyword }}
@endsection

@section('content')
    <div class="py-4">
        <div class="container">

            <div class="row">

                <div class="col-md-9">

                    <div class="category-heading">
                        <h4> {{ $category->name }} </h4>
                    </div>

                    @forelse ($posts as $post)
                        <div class="card card-shadow mt-4">
                            <div class="card-body">
                                <a href="{{ URL('tutorial/' . $category->slug . '/' . $post->slug) }}"
                                    class="text-decoration-none">
                                    <h2 class="post-heading"> {{ $post->name }} </h2>
                                </a>
                                <h6>
                                    Posted On: {{ $post->created_at->format('d-m-Y') }}
                                    <span class="ms-3"> Posted by: {{ $post->user->name }} </span>
                                </h6>

                            </div>
                        </div>
                    @empty
                        <div class="card card-shadow mt-4">
                            <div class="card-body">
                                <h2> No Post Available </h2>
                            </div>
                        </div>
                    @endforelse
                    <div class="paginate">
                        {{ $posts->links() }}
                    </div>

                </div>

                <div class="col-md-3">
                    <div class="border p-2">
                        <h4> Advertising Area </h4>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
