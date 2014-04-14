<?php namespace MDH\Repositories\Eloquent;

use App;
use Cache;
use DateTime;
use Input;
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
        $query->select(['id', 'user_id', 'title', 'slug', 'publish_at']);

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

        $sqlQuery = md5($query->toSql());
        $page = Input::get('page') ?: '1';
        $cacheKey = 'posts.all.page'.$page.':'.$sqlQuery;

        $result = Cache::tags('posts', 'posts.all')->rememberForever($cacheKey, function() use ($query, $per_page) {
            $posts = $query->paginate($per_page);

            return [$posts->getCollection(), (string) $posts->links()];
        });

        return $result;
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

        $sqlQuery = md5($query->toSql());
        $cacheKey = 'posts.show.'.$id.'.'.$sqlQuery;

        $result = Cache::tags('posts', 'posts.show.'.$id)->rememberForever($cacheKey, function() use ($query) {
            return $query->first();
        });

        return ($result ?: App::abort(404));
    }

    public function create($attributes)
    {
        return $this->user->posts()->create($attributes);
    }

    public function update($id, $attributes)
    {
        $post = $this->findOr404($id);

        if (!$this->user && !$this->user->admin && $this->user->id !== $post->user_id) {
            throw new PermissionsException('Do not have permissions to update');
        }

        $post->update($attributes);

        return $post;
    }

    public function destroy($id)
    {
        $post = $this->findOr404($id);

        if (!$this->user && !$this->user->admin && $this->user->id !== $post->user_id) {
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
