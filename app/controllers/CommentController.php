<?php

class CommentController extends BaseController 
{
    /**
     * Create a comment
     */
	public function create($postId)
	{
	    $post = Post::findOrFail($postId);
        $body = Input::get('body');

        $comment = new Comment(['body' => $body]);
        $comment->user()->associate(Auth::user());
        $post->comments()->save($comment);

        return Redirect::route('postView', ['id' => $post->id]);
	}
}