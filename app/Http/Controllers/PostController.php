<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\post;
use App\Models\user;
use App\Models\comment;

class PostController extends Controller
{
    function index() {
        $PostsFromDB = post::all();
        // @dd($PostsFromDB);
        return view('posts.index', ['posts'=>$PostsFromDB]);
    }
    function create() {
        $UsersFromDB = user::all();
        return view('posts.create', ['users'=>$UsersFromDB]);
    }
    function show($postId) {
        // $SinglePostFromDB = post::findOrFail($postId); // find model object and execute itself
        // $SinglePostFromDB = post::where('id', $postId)->first(); // model object can not execute itself
        // $SinglePostFromDB = post::where('id', $postId)->get(); // collection object

        $SinglePostFromDB = post::where('id', $postId)->with('user', 'comments')->get();
        // @dd($PostFromDB);

        $UsersFromDB = user::all();
        // $CommentsFromDB = comment::where('post_id', '=', $postId)->get();

        // test each above methods.
        // @dd($SinglePostFromDB);

        // return to posts.show.
        return view('posts.show', ['post'=>$SinglePostFromDB, 'postId'=>$postId, 'users'=>$UsersFromDB]);
    }
    function store() {

        request()->validate([
            'title'=>['required', 'min:3'],
            'description'=>['required', 'min:5'],
            'post_creator'=>['required', 'exists:users,id'],
        ]);

        // after post sumbitted user data
        // then access this data by super global method $_POST.
        // or by super helper method as request() class return an object access method and properties.
        $user_data = request();

        // TEST.
        // $user_single_data = request()->description;
        // @dd($user_single_data, request()); // die_dump() method to debuge my code.

        // store this data into database.
        // $post = new post;
        // $post->title = $user_data->title;
        // $post->description = $user_data->description;
        // $post->user_id = $user_data->post_creator;
        // $post->save();

        post::create([
            'title'=>$user_data->title,
            'description'=>$user_data->description,
            'user_id'=>$user_data->post_creator,
        ]);

        $PostsFromDB = post::all();


        // @dd($PostsFromDB);

        // then redirecte to posts.index page.
        return to_route('posts.index');
    }
    function edit($postId) {
        $UsersFromDB = user::all();
        $SinglePostFromDB = post::findOrFail($postId);
        return view('posts.edit', ['post'=>$SinglePostFromDB, 'postId'=>$postId, 'users'=>$UsersFromDB]);
    }
    function update($postId) {

        request()->validate([
            'title'=>['required', 'min:3'],
            'description'=>['required', 'min:5'],
            'post_creator'=>['required', 'exists:users,id'],
        ]);

        // after post sumbitted user data
        // then access this data by super global method $_POST.
        $updatedUserData = request();
        // return view('posts.edit', ['userData'=>$updatedUserData, 'postId'=>$postId]);

        // TEST.
        // $user_single_data = request()->description;
        // @dd($user_single_data, request()); // die_dump() method to debuge my code.

        // edit post data in database edited by useri in the form.
        $SinglePostFromDB = post::findOrFail($postId);
        // $SinglePostFromDB->title = $updatedUserData->title;
        // $SinglePostFromDB->description = $updatedUserData->description;
        // $SinglePostFromDB->user_id = $updatedUserData->post_creator;

        // $SinglePostFromDB->save();

        $SinglePostFromDB->update([
            'title'=>$updatedUserData->title,
            'description'=>$updatedUserData->description,
            'user_id'=>$updatedUserData->post_creator,
        ]);


        // redirection to posts.index page.
        return to_route('posts.show', $postId);
    }
    function destroy($postId){
        // collect all user data.
        $updatedUserData = request()->all();
        // return view('posts.edit', ['userData'=>$updatedUserData, 'postId'=>$postId]);

        // test.
        // $user_single_data = request()->description;
        // @dd($user_single_data, request()); // die_dump() method to debuge my code.

        // delete from db.
        $post = post::findOrFail($postId);
        $post->delete();


        // $post->where('id', $postId)->delete();

        // return to route to index page.
        return to_route('posts.index');
    }
}
