<?php namespace MDH\Repositories\Eloquent;

use App;
use DateTime;
use MDH\Entities\Post;
use MDH\Exceptions\PermissionsException;
use MDH\Repositories\PostRepositoryInterface;

class PostRepository implements PostRepositoryInterface
{
    protected $user;

    function __construct()
    {
        $this->user = App::make('UserData')->user;
    }

    public function allPaginated($per_page = 5)
    {
        $per_page = is_numeric($per_page) ? $per_page : 5;

        $query = Post::orderBy('publish_at', 'desc');

        if (!$this->user) {
            $query->where('publish_at', '<=', new DateTime('now'));
        }

        if ($this->user && !$this->user->admin) {
            $query->where('publish_at', '<=', new DateTime('now'))
                ->orWhere(function($query)
                {
                    $query->where('user_id', $this->user->id);
                });
        }

        return $query->paginate($per_page);
    }

    public function findOr404($id)
    {
        $query = Post::orderBy('publish_at', 'desc');

        $query->where('id', $id);

        if (!$this->user) {
            $query->where('publish_at', '<=', new DateTime('now'));
        }

        if ($this->user && !$this->user->admin) {
            $query->where('publish_at', '<=', new DateTime('now'))
                ->orWhere(function($query) use ($id)
                {
                    $query->where('id', $id)
                        ->where('user_id', $this->user->id);
                });
        }

        return ($query->first() ?: App::abort(404));
    }

    public function create($attributes)
    {
        return $this->user->posts()->create($attributes);
    }

    public function update($id, $attributes)
    {
        $post = $this->findOr404($id);

        if (!$this->user || !$this->user->admin || $this->user->id !== $post->user_id) {
            throw new PermissionsException('Do not have permissions to update');
        }

        $post->update($attributes);

        return $post;
    }

    public function destroy($id)
    {
        $post = $this->findOr404($id);

        if (!$this->user || !$this->user->admin || $this->user->id !== $post->user_id) {
            throw new PermissionsException('Do not have permissions to delete');
        }

        $post->delete();

        return $post;
    }

    public function getRules()
    {
        return Post::$rules;
    }
}
