<?php

use MDH\Entities\Post;
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
        return View::make('posts.create');
    }

    /**
     * Store a newly created post in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();

        $validator = Validator::make($input, Post::$rules);

        if ($validator->fails())
        {
            return Redirect::back()
                ->withErrors($validator)
                ->withInput();
        }

        $this->posts->create($input);

        return Redirect::route('posts.index');
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
        $post = $this->posts->find($id);

        return View::make('posts.edit', compact('post'));
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

        $post = $this->posts->findOrFail($id);

        $validator = Validator::make($input, Post::$rules);

        if ($validator->fails())
        {
            return Redirect::back()
                ->withErrors($validator)
                ->withInput();
        }

        $post->update($input);

        return Redirect::route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->posts->destroy($id);

        return Redirect::route('posts.index');
    }

}
