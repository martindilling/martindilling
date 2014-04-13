<?php namespace MDH\Services\Mailers;

use User;

class ContactformMailer extends Mailer {

    public function sendToOwner($name, $email, $subject, $body)
    {
        $this->setView('emails.contact');
        $this->setFrom('contactform@martindilling.com', 'martindilling.com');
        $this->setTo('martindilling@gmail.com', 'Martin Dilling-Hansen');
        $this->setSubject('Subject: ' . $subject);
        $this->setData(compact('name', 'email', 'subject', 'body'));

        return $this->send();
    }

    public function sendConfirmation($name, $email, $subject, $body)
    {
        $this->setView('emails.contact');
        $this->setFrom('no-reply@martindilling.com', 'martindilling.com');
        $this->setTo($email, $name);
        $this->setSubject('Message received: ' . $subject);
        $this->setData(compact('name', 'email', 'subject', 'body'));

        return $this->send();
    }
}
