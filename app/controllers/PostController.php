<?php

class PostController extends BaseController 
{

    /**
     * Show all the posts
     */
	public function showIndex()
	{
	    $posts = Post::latest()->paginate(25);
        
		return View::make('post.index', [
		    'posts' => $posts
		]);
	}

    /**
     * Show the create post form
     */ 
	public function showCreate()
	{
    	return View::make('post.create');
	}

	/**
	 * Create a new post
	 */
	public function create()
	{
        $post = Post::create(array(
            'title' => Input::get('title'),
            'url' => Input::get('url'),
            'user_id' => Auth::user()->id
        ));

        if (Input::get('request'))
        {
            $wish = (new Wish)->post()->associate($post)->save();
        }

        return Redirect::route('postView', [
        	'postId' => $post->id
        ]);
	}

    /**
     * View a post
     */
	public function view($id)
	{
    	$post = Post::findOrFail($id);

        History::record($post);

    	return View::make('post.view', [
    	    'post' => $post
    	]);
	}
}