@extends('layouts.app')

@section('Title') Create @endsection

@section('Body')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="post" action="{{route('posts.store')}}" class="container mt-5">
    @csrf
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Post Title.</label>
        <input type="text" class="form-control" name="title" id="exampleFormControlInput1" placeholder="Enter this post title." value="{{old('title')}}">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Enter The Post description.</label>
        <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3">{{old('description')}}</textarea>
    </div>

    <select class="form-select form-select-lg mb-3" name="post_creator" aria-label="Large select example">
        <!-- <option selected>Select Post Creator.</option> -->
        @foreach($users as $user)
            @if($user)
                <option value="{{$user->id}}">{{$user->name}}</option>
            @endif
        @endforeach
    </select>
    <div class="form-floating mt-5">
        <input type="submit" value="Create" class="btn btn-outline-primary">
        <button type="reset" class="btn btn-outline-secondary">Clear</button>
    </div>
</form>
@endsection
