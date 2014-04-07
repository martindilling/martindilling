<?php

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
        return View::make('creations.create');
    }

    /**
     * Store a newly created creation in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();

        $validator = Validator::make($input, Creation::$rules);

        if ($validator->fails())
        {
            return Redirect::back()
                ->withErrors($validator)
                ->withInput();
        }

        $this->$creations->create($input);

        return Redirect::route('creations.index');
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
        $creation = $this->$creations->find($id);

        return View::make('creations.edit', compact('creation'));
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

        $creation = $this->$creations->findOrFail($id);

        $validator = Validator::make($input, Creation::$rules);

        if ($validator->fails())
        {
            return Redirect::back()
                ->withErrors($validator)
                ->withInput();
        }

        $creation->update($input);

        return Redirect::route('creations.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->$creations->destroy($id);

        return Redirect::route('creations.index');
    }

}
