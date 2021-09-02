<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        

        return response()->json($posts);
    }

    public function show(Post $post) {
        return response()->json($post);
    }

    public function store(CreatePostRequest $request) {
        $data = $request->validated();
        $post = Post::create($data);
        return response()->json($post);
    }

    public function update(Post $post, UpdatePostRequest $request){
        $data = $request->validated();
        $post->update($data);
        return response()->json($post);
    }

    public function destroy(Post $post) {
        $post->delete();
        return response()->noContent();
    }
}
