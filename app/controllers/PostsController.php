<?php

use Illuminate\Support\MessageBag;
use MDH\Repositories\PostRepositoryInterface;

class PostsController extends \BaseController {

    /**
     * Post Repository
     *
     * @var Post
     */
    protected $posts;

    /**
     * Contructor
     *
     * @param \MDH\Entities\Post|\MDH\Repositories\PostRepositoryInterface $posts
     */
    public function __construct(PostRepositoryInterface $posts)
    {
        $this->posts = $posts;
    }

    /**
     * Display a listing of posts
     *
     * @return Response
     */
    public function index()
    {
        $posts = $this->posts->allPaginated();

        return View::make('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new post
     *
     * @return Response
     */
    public function create()
    {
        $routeUri = Route::getRoutes()->getByName('posts.show')->getUri();
        $routeUri = str_replace('{slug?}', '', $routeUri);
        
        return View::make('posts.create')->withEditing(false)->with('routeUri', $routeUri);
    }

    /**
     * Store a newly created post in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();

        $validator = Validator::make($input, MDH\Entities\Post::$rules);

        if ($validator->fails())
        {
            return Redirect::back()
                ->withErrors($validator)
                ->withInput();
        }

        $post = $this->posts->create(Auth::user(), $input);

        $messages = new MessageBag(['success' => 'Post was created.']);
        return Redirect::route('posts.show', [$post->id, $post->slug])->withMessages($messages);
    }

    /**
     * Display the specified post.
     *
     * @param  int     $id
     * @param  string  $slug
     * @return Response
     */
    public function show($id, $slug = '')
    {
        $post = $this->posts->findOr404($id);

        if ( $post->slug !== $slug ) {
            return Redirect::route('posts.show', array('id' => $post->id, 'slug' => $post->slug), 301);
        }

        return View::make('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified post.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $routeUri = Route::getRoutes()->getByName('creations.show')->getUri();
        $routeUri = str_replace('{slug?}', '', $routeUri);

        $post = $this->posts->findOr404($id);

        return View::make('posts.edit', compact('post'))->withEditing(true)->with('routeUri', $routeUri);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $input = Input::all();

        $rules = MDH\Entities\Post::$rules;

        $rules['slug'] .= ',' . $id;

        $validator = Validator::make($input, $rules);

        if ($validator->fails())
        {
            return Redirect::back()
                ->withErrors($validator)
                ->withInput();
        }

        $post = $this->posts->update(Auth::user(), $id, $input);

        $messages = new MessageBag(['success' => 'Post was updated.']);
        return Redirect::route('posts.show', [$post->id, $post->slug])->withMessages($messages);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->posts->destroy(Auth::user(), $id);

        $messages = new MessageBag(['success' => 'Post was deleted.']);
        return Redirect::route('posts.index')->withMessages($messages);
    }

}
