@extends('layouts.app');

@section('Title') Edit @endsection

@section('Body')

@if($post)

<form method="post" action="{{route('posts.update', $post->id)}}" class="container mt-5">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Post Title.</label>
        <input type="text" class="form-control" name="title" id="exampleFormControlInput1" value="{{$post->title}}" placeholder="Enter this post title.">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Enter The Post description.</label>
        <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3">{{$post->description}}</textarea>
    </div>
    <select class="form-select form-select-lg mb-3" name="post_creator" aria-label="Large select example">
        @foreach($users as $user)
            @if($user)
                <option @selected($post->user_id == $user->id) value="{{$post->user->id}}">{{$post->user->name}}</option>
            @endif
        @endforeach
    </select>
    <div class="form-floating mt-5">
        <input type="submit" value="Update" class="btn btn-outline-primary">
        <button type="reset" class="btn btn-outline-secondary">Clear</button>
    </div>
</form>

@endif

@endsection
