<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
use App\Models\comment;
use GuzzleHttp\Promise\Create;

class CommentController extends Controller
{
    function index($postId) {
        $UsersFromDB = user::all();
        $CommentsFromDB = comment::where('post_id', '=', $postId)->get();
        @dd($CommentsFromDB);

        return view('comments.index', ['comments'=>$CommentsFromDB, 'users'=>$UsersFromDB, 'postId' => $postId]);
    }
    // function create($postId) {
    //     $UsersFromDB = user::all();
    //     return view('comments.create', ['users'=>$UsersFromDB, 'postId' => $postId]);
    // }
    function store($postId) {

        // @dd(request());
        request()->validate([
            'content'=>['required'],
            'user_id'=>['required', 'exists:users,id'],
        ]);

        $user_data = request();
        if($user_data->comment_id){
            comment::create([
                'content'=>$user_data->content,
                'user_id'=>$user_data->user_id,
                'post_id'=>$postId,
                'comment_id'=>$user_data->comment_id,
            ]);
            // then redirecte to comments.show page.
            return to_route('comments.show', $user_data->comment_id);
        } else {
            comment::create([
                'content'=>$user_data->content,
                'user_id'=>$user_data->user_id,
                'post_id'=>$postId,
            ]);
            // then redirecte to posts.comments.index page.
            return to_route('posts.comments.index', $postId);
        }
    }
    function show($commentId) {
        $UsersFromDB = user::all();
        $CommentFromDB = comment::findOrFail($commentId);
        $RepliesFromDB = comment::where('comment_id', $commentId)->get();
        return view('comments.show', ['comment' => $CommentFromDB, 'replies' => $RepliesFromDB, 'users' => $UsersFromDB]);
    }
    function edit($commentId) {
        // return to_route('comments.edit', $commentId, []);
        $UsersFromDB = user::all();
        $CommentFromDB = comment::findOrFail($commentId);
        return view('comments.edit', ['comment'=>$CommentFromDB, 'users'=>$UsersFromDB, 'commentId' => $commentId]);
    }
    function update($commentId) {
        request()->validate([
            'content'=>['required'],
            'user_id'=>['required', 'exists:users,id'],
            'post_id' => ['required', 'exists:posts,id']
        ]);

        // after post sumbitted user data
        // then access this data by super global method $_POST.
        // or by super helper method as request() class return an object access method and properties.
        $user_data = request();
        $CommentFromDB = comment::findOrFail($commentId);

        // @dd($CommentFromDB);
        // @dd($user_data);

        $CommentFromDB->update([
            'content'=>$user_data->content,
            'user_id'=>$user_data->user_id,
            'post_id'=>$CommentFromDB->post_id,
        ]);


        // then redirecte to posts.index page.
        return to_route('posts.comments.index', $CommentFromDB->post_id);
    }
    function destroy($commentId) {
        $CommentFromDB = comment::findOrFail($commentId);
        $CommentFromDB->delete();
        return to_route('posts.comments.index', $CommentFromDB->post_id);
    }
}
