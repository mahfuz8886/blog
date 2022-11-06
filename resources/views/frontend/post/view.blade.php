@extends('layouts.app')

@section('title')
    {{ $post->meta_title }}
@endsection
@section('meta_description')
    {{ $post->meta_description }}
@endsection
@section('meta_keyword')
    {{ $post->meta_keyword }}
@endsection

@section('content')
    <div class="py-4">
        <div class="container">

            <div class="row">

                <div class="col-md-8">

                    <div class="category-heading">
                        <h4> {!! $post->name !!} </h4>
                    </div>
                    {{-- <div class="mt-3">
                         <h6> {{ $post->category->name . ' / ' . $post->name }} </h6>
                    </div> --}}

                    <div class="card card-shadow mt-4">
                        <div class="card-body post-description">
                            {!! $post->description !!}
                        </div>
                    </div>

                    <div class="comment-area mt-4">
                        @if (session('message'))
                            <h6 class="alert alert-warning mb-3"> {{ session('message') }} </h6>
                        @endif
                        <div class="card card-body">
                            <h6 class="card-title"> Leave a Comment </h6>
                            <form action="{{ URL('comments') }}" method="post">
                                @csrf
                                <input type="hidden" name="hidden_slug" value="{{ $post->id }}">
                                <textarea name="comment_body" id="" class="form-control" rows="3"></textarea>
                                <button type="submit" class="btn btn-primary mt-3"> Submit </button>
                            </form>
                        </div>

                        @forelse ($post->comments as $comment)
                            <div class="card card-body shadow-sm mt-3">
                                <div class="detail-area">
                                    <h6 class="user-name mb-1">
                                        {{ $comment->user->name ?? '' }}
                                        <small class="ms-3 text-primary"> Commented On:
                                            {{ $comment->created_at->format('d-M-Y') }} </small>
                                    </h6>
                                    <p class="user-comment mb-1">
                                        {{ $comment->comment_body }}
                                    </p>
                                </div>
                                @if (Auth::check() && Auth::id() == $comment->user_id)
                                    <div>
                                        {{-- <a href="" class="btn btn-primary btn-sm me-2"> Edit </a> --}}
                                        <button type="button" value="{{ $comment->id }}"
                                            class="deleteComment btn btn-danger btn-sm me-2"> Delete </button>
                                    </div>
                                @endif
                            </div>
                        @empty
                            <div class="card card-body shadow-sm mt-3">
                                <h6> No Comments yet. </h6>
                            </div>
                        @endforelse

                    </div>
                </div>

                <div class="col-md-4">

                    <div class="border p-2">
                        <h4> Advertising Area </h4>
                    </div>
                    <div class="border p-2">
                        <h4> Advertising Area </h4>
                    </div>
                    <div class="border p-2">
                        <h4> Advertising Area </h4>
                    </div>

                    <div class="card mt-3">
                        <div class="card-header">
                            <h4>Latest Posts</h4>
                        </div>
                        <div class="card-body">
                            @foreach ($latest_posts as $latest_post)
                                <a href="{{ URL('tutorial/' . $latest_post->category->slug . '/' . $latest_post->slug) }}"
                                    class="text-decoration-none">
                                    <h6> > {{ $latest_post->name }} </h6>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).on('click', '.deleteComment', function() {
                if (confirm('Are you sure you want to delete this comment?')) {
                    var comment_id = $(this).val();

                    $.ajax({
                        type: "POST",
                        url: "/delete-comment",
                        data: {
                            'comment_id': comment_id
                        },
                        dataType: "POST",
                        success: function(respone) {
                            if (response.status == 200) {
                                $(this).closest('.comment-container').remove();
                                alert(response.message);
                            } else {
                                alert(response.message);
                            }
                        }
                    });
                }
            });
        });
    </script>
@endsection
