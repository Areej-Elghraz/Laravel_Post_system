@extends('layouts.app')

@section('Title')
    Show Comment and Replies
@endsection

@section('Body')
    <section class="gradient-custom">
        <div class="container text-start">
            <div class="card px-5  row d-flex justify-content-center rounded-4"
                style=" border: none; background-color: #6482AD; color: #E2DAD6;">

                <a href="{{ route('posts.show', $comment->post->id) }}"
                    class="h4 mb-4 pb-2 link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover"
                    style="color: #E2DAD6;">Show
                    {{ $comment->first()->post->user->name . "'s" }} post!</a>

                <div class="row">
                    {{-- <div class="card-body "> --}}

                    <div class="row mb-5">
                        <div class="d-flex flex-start rounded-3 py-3"
                            style="word-break: break-all; justify-content: space-evenly; max-width: fit-content; background-color: #7FA1C3;">
                            <img class="rounded-circle shadow-1-strong me-3"
                                src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(10).webp" alt="avatar"
                                width="65" height="65" />
                            <div class="flex-grow-1 flex-shrink-1">
                                <div>
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
                                            style="color: #E2DAD6;"><i class='bx bx-reply-all bx-fade-left'></i> Reply</a>
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

                    @foreach ($replies as $reply)
                        @if ($reply)
                            <div class="flex-grow-1 flex-shrink-1 mb-4 mx-5">
                                <div class="d-flex flex-start rounded-3 p-3"
                                    style="word-break: break-all; justify-content: space-evenly; max-width: fit-content; background-color: #7FA1C3;">
                                    <img class="rounded-circle shadow-1-strong me-3"
                                        src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(10).webp" alt="avatar"
                                        width="65" height="65" />
                                    <div class="flex-grow-1 flex-shrink-1">
                                        <div>
                                            <div class="d-flex justify-content-between align-items-center"
                                                style="column-gap: 3rem;">
                                                <p class="mb-1">
                                                    {{ $reply->user->name }} <span class="small">-
                                                        {{ $reply->created_at->format('Y-m-d') }}</span>
                                                </p>
                                                <form method="post" action="{{ route('comments.destroy', $reply->id) }}"
                                                    class="d-flex flex-row">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="{{ route('comments.edit', $reply->id) }}"
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
                                                {{ $reply->content }}
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
                                                <a href="{{ route('comments.show', $reply->id) }}"
                                                    class="link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover"
                                                    style="color: #E2DAD6;"><i class='bx bx-reply-all bx-fade-left'></i>
                                                    Reply</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <a href="{{ route('comments.show', $reply->id) }}"
                                        class="link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover"
                                        style="color: #E2DAD6"><i class='bx bx-happy-heart-eyes'></i> Show all replies</a>
                                </div>
                            </div>
                        @endif
                    @endforeach

                </div>
            </div>
            <!-- </div> -->

            <div class="d-flex flex-start w-100 sticky-bottom z-2 rounded-4"
                style="background-color: #6482AD; color: #E2DAD6;">
                <img class="rounded-circle shadow-1-strong me-3"
                    src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(21).webp" alt="avatar" width="65"
                    height="65" />
                <form method="post" action="{{ route('posts.comments.store', $comment->post->id) }}" class="w-100">
                    @csrf
                    <label class="h4" for="reply">
                        {{ $comment ? 'Reply to ' . $comment->user->name : 'Add Comment!' }}
                    </label>
                    <div data-mdb-input-init class="form-outline">
                        <textarea class="form-control" name="content" id="reply" rows="4" autofocus></textarea>
                        <!-- <label class="form-label" for="textAreaExample">What is your view?</label> -->
                        <select class="form-select form-select-lg mb-3" name="user_id" aria-label="Large select example">
                            <!-- <option selected>Select Post Creator.</option> -->
                            @foreach ($users as $user)
                                @if ($user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                    <div class="d-flex justify-content-evenly mt-3">
                        <button type="reset" class="b-5 px-3 py-1"
                            style=" background-color: #7FA1C3; color: #E2DAD6; border: none; border-radius: 6px;"
                            data-mdb-button-init data-mdb-ripple-init>
                            reset <i class='bx bx-reset bx-spin'></i>
                        </button>
                        <button type="submit" class="b-5 px-3 py-1"
                            style="background-color: #7FA1C3; color: #E2DAD6; border: none; border-radius: 6px;"
                            data-mdb-button-init data-mdb-ripple-init>
                            Send <i class='bx bxs-send bx-fade-right'></i>
                        </button>
                    </div>
                </form>
            </div>
            {{-- </div> --}}

        </div>
        {{-- </div> --}}
    </section>
@endsection
