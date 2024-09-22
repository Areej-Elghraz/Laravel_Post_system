@extends('layouts.app')

@section('Title') Edit Comment @endsection

@section('Body')
<div class="m-5">
    <a href="{{route('posts.show', $comment->post->id)}}">Show {{$comment->post->user->name}}'s post!</a>
</div>

<section style="background-color: #F6F5F2;">
    <div class="container my-5 py-5 text-body">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-6">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="card">
                    <div class="card-body p-4">
                        <div class="d-flex flex-start w-100">
                            <img class="rounded-circle shadow-1-strong me-3"
                                src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(21).webp" alt="avatar" width="65"
                                height="65" />
                            <form method="post" action="{{route('comments.update', $comment->id)}}" class="w-100">
                                @csrf
                                @method('PUT')
                                <h5>Edit your comment on {{$comment->post->user->name}}'s comment</h5>
                                <div data-mdb-input-init class="form-outline">
                                    <textarea class="form-control" name="content" id="textAreaExample" rows="4">{{$comment->content}}</textarea>
                                    <!-- <label class="form-label" for="textAreaExample">What is your view?</label> -->
                                    <select class="form-select form-select-lg mb-3" name="user_id" aria-label="Large select example">
                                        <!-- <option selected>Select Post Creator.</option> -->
                                        @foreach($users as $user)
                                        @if($user)
                                        <option value="{{$user->id}}" @selected($user->id == $comment->user_id)>{{$user->name}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                                <input type="hidden" name="post_id" value="{{$comment->post->id}}">
                                <div class="d-flex justify-content-between mt-3">
                                    <button type="reset" data-mdb-button-init data-mdb-ripple-init class="btn btn-success">
                                        Reset <i class='bx bx-reset bx-spin'></i>
                                    </button>
                                    <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-danger">
                                        Update <i class='bx bxs-send bx-fade-right'></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection