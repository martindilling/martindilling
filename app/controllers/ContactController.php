<?php

use Illuminate\Support\MessageBag;
use MDH\Services\Mailers\ContactformMailer as Mailer;

class ContactController extends \BaseController {

    /**
     * ContactformMailer
     *
     * @var ContactformMailer
     */
    protected $mailer;

    /**
     * Contructor
     *
     * @param MDH\Services\Mailers\ContactformMailer $mailer
     */
    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * Show the page.
     *
     * @return Response
     */
    public function showPage()
    {
        return View::make('contact.show');
    }

    /**
     * Send the data from the form to the admin.
     *
     * @return Response
     */
    public function sendmail()
    {
        $input = Input::all();

        $rules = [
            'name'    => 'required',
            'email'   => 'required|email',
            'subject' => 'required',
            'body'    => 'required',
        ];

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            return Redirect::back()
                ->withErrors($validator)
                ->withInput();
        }

        $this->mailer->sendToOwner($input['name'], $input['email'], $input['subject'], $input['body']);

        if (isset($input['copy'])) {
            $this->mailer->sendConfirmation($input['name'], $input['email'], $input['subject'], $input['body']);
        }

        $messages = new MessageBag(['success' => 'Your mail was send! I will get back to you as soon as possible :)']);
        return Redirect::back()->withMessages($messages);
    }
}
