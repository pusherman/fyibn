<?php

class SearchController extends BaseController
{

    /**
     * Perform a search
     */
    public function find()
    {
        $query = Input::get('query');

        $posts = Post::latest()
                    ->distinct()
                    ->leftJoin('comments', 'posts.id', '=', 'comments.post_id')
                    ->select('posts.*')
                    ->where('posts.title', 'like', "%$query%")
                    ->orWhere('comments.body', 'like', "%$query%")
                    ->paginate(25);

        return View::make('post.index', [
            'posts' => $posts
        ]);
    }
}
