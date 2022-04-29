<?php

namespace App\Http\Controllers;

use App\Http\Requests\Comment\CreateCommentRequest;
use App\Http\Requests\Comment\UpdateCommentRequest;
use App\Models\Comment;
use App\Models\Post;

class CommentsController extends Controller
{
    /**
     * @param  CreateCommentRequest  $request
     * @param  Post  $post
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CreateCommentRequest $request, Post $post)
    {
        $comment = $post->comments()->create([
            'author_name' => $request->author_name,
            'content'     => $request->input('content'),
        ]);

        return response()->json([
            'comment' => $comment,
        ]);
    }

    /**
     * @param  UpdateCommentRequest  $request
     * @param  Comment  $comment
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateCommentRequest $request, Post $post, Comment $comment)
    {
        $comment->update([
            'content'     => $request->input('content'),
            'author_name' => $request->author_name,
        ]);

        return response()->json([
            'comment' => $comment,
        ]);
    }

    /**
     * @param  Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post, Comment $comment)
    {
        $comment->delete();

        return response()->noContent();
    }
}
