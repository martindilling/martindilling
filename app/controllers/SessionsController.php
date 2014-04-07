<?php

use Illuminate\Support\MessageBag;

class SessionsController extends BaseController {

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('sessions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();

        $credentials = [
            'email'    => $input['email'],
            'password' => $input['password'],
        ];

        $remember = (isset($input['remember-me']) ? true : false);

        // Do the input validate?
        $rules = [
            'email'    => 'required|email',
            'password' => 'required'
        ];

        $validator = Validator::make($credentials, $rules);

        if ($validator->fails()) {
            return Redirect::back()
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        }

        // User need to be active to be able to login
        $credentials['active'] = 1;
        
        // Can we log the user in?
        $attempt = Auth::attempt($credentials, $remember);

        if (! $attempt) {
            $error = new MessageBag(['login' => 'Invalid credentials.']);
            return Redirect::back()
                ->withErrors($error)
                ->withInput(Input::except('password'));
        }

        // Success
        return Redirect::intended('/')
            ->withSuccess('You have been logged in!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return Response
     */
    public function destroy()
    {
        Auth::logout();

        return Redirect::home();
    }

}
