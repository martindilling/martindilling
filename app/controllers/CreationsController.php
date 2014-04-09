<?php

use Illuminate\Support\MessageBag;
use MDH\Repositories\CreationRepositoryInterface;

class CreationsController extends \BaseController {

    /**
     * Creation Repository
     *
     * @var Creation
     */
    protected $creations;

    /**
     * Contructor
     *
     * @param \MDH\Entities\Creation|\MDH\Repositories\CreationRepositoryInterface $creations
     */
    public function __construct(CreationRepositoryInterface $creations)
    {
        $this->creations = $creations;
    }

    /**
     * Display a listing of creations
     *
     * @return Response
     */
    public function index()
    {
        $creations = $this->creations->allPaginated();

        return View::make('creations.index', compact('creations'));
    }

    /**
     * Show the form for creating a new creation
     *
     * @return Response
     */
    public function create()
    {
        $routeUri = Route::getRoutes()->getByName('creations.show')->getUri();
        $routeUri = str_replace('{slug?}', '', $routeUri);

        return View::make('creations.create')->withEditing(false)->with('routeUri', $routeUri);
    }

    /**
     * Store a newly created creation in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();

        $validator = Validator::make($input, $this->creations->getRules());

        if ($validator->fails()) {
            return Redirect::back()
                ->withErrors($validator)
                ->withInput();
        }

        $creation = $this->creations->create($input);

        $messages = new MessageBag(['success' => 'Creation was created.']);
        return Redirect::route('creations.show', [$creation->id, $creation->slug])->withMessages($messages);
    }

    /**
     * Display the specified creation.
     *
     * @param  int     $id
     * @param  string  $slug
     * @return Response
     */
    public function show($id, $slug = '')
    {
        $creation = $this->creations->findOr404($id);

        if ( $creation->slug !== $slug ) {
            return Redirect::route('creations.show', array('id' => $creation->id, 'slug' => $creation->slug), 301);
        }

        return View::make('creations.show', compact('creation'));
    }

    /**
     * Show the form for editing the specified creation.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $routeUri = Route::getRoutes()->getByName('creations.show')->getUri();
        $routeUri = str_replace('{slug?}', '', $routeUri);

        $creation = $this->creations->findOr404($id);

        return View::make('creations.edit', compact('creation'))->withEditing(true)->with('routeUri', $routeUri);
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

        // TODO: extract to Repo
        $rules = $this->creations->getRules();

        $rules['slug'] .= ',' . $id;
        $rules['image'] = 'image';
        $rules['thumb'] = 'image';

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            return Redirect::back()
                ->withErrors($validator)
                ->withInput();
        }

        $creation = $this->creations->update($id, $input);

        $messages = new MessageBag(['success' => 'Creation was updated.']);
        return Redirect::route('creations.show', [$creation->id, $creation->slug])->withMessages($messages);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->creations->destroy($id);

        $messages = new MessageBag(['success' => 'Creation was deleted.']);
        return Redirect::route('creations.index')->withMessages($messages);
    }

}
