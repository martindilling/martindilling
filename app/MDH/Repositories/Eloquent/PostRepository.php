<?php namespace MDH\Repositories\Eloquent;

use MDH\Repositories\PostRepositoryInterface;
use MDH\Entities\Post;

class PostRepository implements PostRepositoryInterface
{
    public function allPaginated($per_page = 5)
    {
        $per_page = is_numeric($per_page) ? $per_page : 5;

        return Post::orderBy('publish_at', 'desc')
            ->paginate($per_page);
    }

    public function findOr404($id)
    {
        return (Post::find($id) ?: App::abort(404));
    }
}
