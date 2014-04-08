<?php namespace MDH\Repositories\Eloquent;

use App;
use MDH\Entities\User;
use MDH\Repositories\PostRepositoryInterface;
use MDH\Entities\Post;

class PostRepository implements PostRepositoryInterface
{
    public function create(User $user, $attributes)
    {
        return $user->posts()->create($attributes);
    }

    public function update(User $user, $id, $attributes)
    {
//        $post = $this->findOr404($id);

        $post = $user->posts()->find($id);
        $post->update($attributes);
        return $post;
    }

    public function destroy(User $user, $id)
    {
        $post = $user->posts()->find($id);
        return $post->delete();
    }
    
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
