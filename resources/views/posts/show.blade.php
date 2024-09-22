@extends('layouts.app')

@section('Title')
    Show
@endsection

@section('Body')

    @if ($post)
        <div class="card text-center mx-5">
            <div class="card-header" style="background-color: #6482AD; color: #E2DAD6;">
                Post Creator Information
            </div>
            <div class="card-body" style="background-color: #E2DAD6;">
                <h5 class="card-title">Name: {{ $post->user ? $post->user->name : 'Unknown!' }}</h5>
                <p class="card-text">Email: {{ $post->user ? $post->user->email : 'Unknown!' }}</p>
            </div>
        </div>

        <div class="card text-center mx-5 my-4">
            <form method="post" action="{{ route('posts.destroy', $postId) }}" class="card-header"
                style="background-color: #6482AD; color: #E2DAD6;">
                @csrf
                @method('delete')
                Post Information
                <a href="{{ route('posts.edit', $postId) }}" class="link-info  bx-flashing"><i class='bx bx-edit '></i></a>
                <button href="{{ route('posts.destroy', $postId) }}" class="btn btn-outline-danger"><i
                        class='bx bxs-trash bx-tada'></i></button>
            </form>
            <div class="card-body" style="background-color: #E2DAD6;">
                <h5 class="card-title">Title: {{ $post->title }}</h5>
                <p class="card-text">Description: {{ $post->description }}</p>
                <a href="#" class="btn btn-outline-secondary rounded-5 link-danger"><i
                        class='bx bx-heart bx-tada'></i> Love</a>
                <a href="{{ route('posts.comments.index', $post->id) }}" class="btn btn-outline-secondary rounded-5"><i
                        class='bx bx-message-rounded-dots bx-burst'></i> Comment</a>
                <a href="#" class="btn btn-outline-secondary rounded-5 link-dark"><i
                        class='bx bx-share bx-fade-left'></i> Share</a>
            </div>

            <div class="card-footer text-body-secondary" style="background-color: #7FA1C3; color: #E2DAD6;">
                <p class="card-text">Posted At: {{ $post->created_at }}</p>
                <!-- 2 days ago -->
            </div>

            <!-- <section class="gradient-custom"> -->
            {{-- <section class="gradient-custom"> --}}
            <div class="container text-start" style="background-color: #7FA1C3;">
                <div class="card px-5 row d-flex justify-content-center rounded-4"
                    style=" border: none; background-color: #6482AD;">
                    @foreach ($comments as $comment)
                        @if (!$comment)
                            @php break; @endphp
                        @endif
                        <div class="row mt-5">
                            <div class="d-flex flex-start rounded-3 py-3"
                                style="word-break: break-all; justify-content: space-evenly; max-width: fit-content; background-color: #7FA1C3;">
                                <img class="rounded-circle shadow-1-strong me-3"
                                    src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(10).webp" alt="avatar"
                                    width="65" height="65" />
                                <div class="flex-grow-1 flex-shrink-1">
                                    <div style="color: #E2DAD6;">
                                        <div class="d-flex justify-content-between align-items-center"
                                            style="column-gap: 3rem;">
                                            <p class="mb-1">
                                                {{ $comment->user->name }} <span class="small">-
                                                    {{ $comment->created_at->format('Y-m-d') }}</span>
                                            </p>
                                            <form method="post" action="{{ route('comments.destroy', $comment->id) }}"
                                                class="d-flex flex-row">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ route('comments.edit', $comment->id) }}"
                                                    class="link-muted me-2 bx-tada" style="color: #E2DAD6;"><i
                                                        class='bx bxs-message-edit'></i></a>
                                                <button type="submit" name="destroy"
                                                    style="border:none; background-color: transparent;"
                                                    class="link-muted me-2 link-danger"
                                                    onclick="return confirm('Are you sure to delete Your comment?');">
                                                    <i class='bx bxs-trash bx-flashing'></i> </button>
                                            </form>

                                        </div>
                                        <p class="small mb-0">
                                            {{ $comment->content }}
                                        </p>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>

                                            <a href="#!" class="link-muted me-2 link-danger"><i
                                                    class='bx bxs-donate-heart h5 bx-tada'></i>132</a> •
                                            <a href="#!" class="link-muted link-dark"><i
                                                    class='bx bxs-dislike h6 bx-fade-down'></i>15</a>
                                        </div>
                                        <!-- <a href="#!" class="link-grey">Translate</a> -->
                                        <div>
                                            <a href="{{ route('comments.show', $comment->id) }}"
                                                class="link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover"
                                                style="color: #E2DAD6;"><i class='bx bx-reply-all bx-fade-left'></i>
                                                Reply</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="{{ route('comments.show', $comment->id) }}"
                                    class="link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover"
                                    style="color: #E2DAD6"><i class='bx bx-happy-heart-eyes'></i> Show all replies</a>
                            </div>
                        </div>
                    @endforeach

                    <div class="d-flex flex-start w-100 sticky-bottom z-2 mt-2 p-4 rounded-4"
                        style="background-color: #6482AD;color: #E2DAD6;">
                        <img class="rounded-circle shadow-1-strong me-3"
                            src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(21).webp" alt="avatar" width="65"
                            height="65" />
                        
                    </div>

                </div>
            </div>
        </div>
    @endif
@endsection
