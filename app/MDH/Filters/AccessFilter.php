<?php namespace MDH\Filters;

use App;
use Clockwork;
use DB;
use Illuminate\Support\MessageBag;
use Redirect;
use Request;
use URL;

class AccessFilter
{

    /**
     * Redirect home if the user does not have the right permissions
     * - Must be logged in
     * - Admin can access everything
     * - Non-admins must own the resource to have access
     * 
     * @param $route
     * @param $request
     * @param $table
     * @return Redirect|void
     */
    public function filter($route, $request, $table)
    {
        // Get the user data
        $userData = App::make('UserData');
        Clockwork::info('AccessFilter: Can user['.$userData->id.'] access ['.Request::getPathInfo().'].');

        // If not logged in - redirect home
        if (!$userData->loggedIn) {
            Clockwork::info('# Denied access. [Not logged in].');
            return $this->redirectHome('You are not logged in.');
        }

        // If not admin or user isn't owner - redirect home
        if (!$userData->isAdmin) {
            $resource_id = $route->getParameter('id');
            if (!is_null($resource_id) && !$this->isOwner($table, $resource_id, $userData->id)) {
                Clockwork::info('# Denied access [User is not owner].');
                return $this->redirectHome('You don\'t have the right permissions.');
            }
        }

        Clockwork::info('# Granted access.');
    }

    /**
     * Check if the user is the owner
     * 
     * @param string   $table
     * @param integer  $resource_id
     * @param integer  $user_id
     * @return Redirect|void
     */
    private function isOwner($table, $resource_id, $user_id)
    {
        $resource_user_id = DB::table($table)->whereId($resource_id)->pluck('user_id');
        if ($user_id !== $resource_user_id) {
            return false;
        }
        return true;
    }

    /**
     * @param string  $message
     * @return Redirect|void
     */
    private function redirectHome($message)
    {
        $messages = new MessageBag(['error' => $message]);
        return Redirect::home()->withMessages($messages);
    }
}
