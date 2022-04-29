<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\CreatePostRequest;
use App\Http\Requests\Post\UpdatePostRequest;
use App\Models\Post;

class PostsController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $posts = Post::all();

        return response()->json([
            'posts' => $posts,
        ]);
    }

    /**
     * @param  CreatePostRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CreatePostRequest $request)
    {
        $post = Post::create($request->only(['title', 'link', 'author_name']));

        return response()->json([
            'post' => $post,
        ]);
    }

    /**
     * @param  Post  $post
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Post $post)
    {
        return response()->json([
            'post' => $post,
        ]);
    }

    /**
     * @param  UpdatePostRequest  $request
     * @param  Post  $post
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->update($request->only(['title', 'link', 'author_name']));

        return response()->json([
            'post' => $post,
        ]);
    }

    /**
     * @param  Post  $post
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return response()->noContent();
    }

    /**
     * @param  Post  $post
     * @return \Illuminate\Http\JsonResponse
     */
    public function addUpvote(Post $post)
    {
        $post->update([
            'upvotes' => $post->upvotes + 1,
        ]);

        return response()->json([
            'post' => $post,
        ]);
    }
}
