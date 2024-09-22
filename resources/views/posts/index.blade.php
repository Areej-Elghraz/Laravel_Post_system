@extends('layouts.app');

@section('Title') Index @endsection

@section('Body')
<div class="container">
    <div class="text-center d-flex justify-content-center py-2 rounded-4" style="column-gap: 0.3rem;background-color: #7FA1C3; ">
        <img src="https://i.pinimg.com/736x/35/95/c2/3595c2af2da0281f091088400fcc9abd.jpg" alt="..." class="rounded-circle align-middle" style="width: 2.5rem;">
        <a href="{{route('posts.create')}}" class="w-50"><input type="text" class="w-100 border-0 rounded-pill py-2 px-4"></a>
        <a href="{{route('posts.create')}}" class="btn btn-secondary rounded-pill " style="width: 7rem;">Create Post</a>
    </div>
    <table class="text-center mt-1 rounded-4" cellpadding = 15 style="background-color: #7FA1C3;">
        <thead>
            <tr style="border-bottom:2px solid #E2DAD6;">
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Created By</th>
                <th scope="col">Created At</th>
                <th scope="col">Posted At</th>
                <th scope="col">Options</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)  {{--// loop on object using magic methods--}}
                @if($post)
            <tr>
                    <th scope="row">{{$post['id']}}</th>
                    <td>{{$post->title}}</td>
                    <td>{{$post->user ? $post->user->name : 'Unknown!'}}</td>
                    <td>{{$post->created_at->format('Y-m-d')}}</td>
                    <td>{{$post->updated_at->format('Y-m-d')}}</td>
                    <td class="btn-group" role="group" aria-label="Basic mixed styles example">
                        <!-- @php $postId = $post['id']; @endphp -->
                        <div>
                            <a href="{{route('posts.show', $post->id)}}" class="btn btn-success px-5">View</a>
                        </div>
                        <div>
                            <a href="{{route('posts.edit', $post->id)}}" class="btn btn-secondary">Edit</a>
                        </div>
                        <form method="post" action="{{route('posts.destroy', $postId)}}">
                            @csrf
                            @method('DELETE')
                            <input type="submit" name="delete" class="btn btn-danger" onclick="return confirm('do you want to delete this post?!');" value="Delete">
                        </form>
                    </td>
                </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</div>
@endsection
