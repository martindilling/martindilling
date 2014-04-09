<?php

App::singleton('UserData', function(){
    $userData = new stdClass;
    if (Auth::check()) {
        $userData->user     = Auth::user();
        $userData->id       = $userData->user->id;
        $userData->loggedIn = true;
        $userData->isAdmin  = (bool) $userData->user->admin;
    } else {
        $userData->user     = null;
        $userData->id       = null;
        $userData->loggedIn = false;
        $userData->isAdmin  = false;
    }
    
    return $userData;
});

View::share('userData', App::make('UserData'));
