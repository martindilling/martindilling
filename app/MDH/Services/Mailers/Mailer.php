<?php namespace MDH\Services\Mailers;

use Mail;

abstract class Mailer {

    protected $to;
    protected $from;
    protected $subject;
    protected $view;
    protected $data = [];

    protected function send()
    {
        $to = $this->getTo();
        $from = $this->getFrom();
        $subject = $this->getSubject();
        
        Mail::queue($this->view, $this->data, function($message) use ($to, $from, $subject)
        {
            $message->from($from['address'], $from['name']);
            $message->to($to['address'], $to['name']);
            $message->subject($subject);
        });
    }

    /**
     * @param string  $address
     * @param string  $name
     */
    protected function setTo($address, $name = null)
    {
        $this->to = compact('address', 'name');
    }

    /**
     * @return array
     */
    protected function getTo()
    {
        return $this->to;
    }

    /**
     * @param string  $address
     * @param string  $name
     */
    protected function setFrom($address, $name = null)
    {
        $this->from = compact('address', 'name');
    }

    /**
     * @return array
     */
    protected function getFrom()
    {
        if (is_null($this->from['address'])) {
            $this->from = Config::get('mail.from');
        }

        return $this->from;
    }

    /**
     * @param string $subject
     */
    protected function setSubject($subject)
    {
        $this->subject = $subject;
    }

    /**
     * @return string
     */
    protected function getSubject()
    {
        return $this->subject;
    }

    /**
     * @param array $data
     */
    protected function setData($data)
    {
        $this->data = $data;
    }

    /**
     * @return array
     */
    protected function getData()
    {
        return $this->data;
    }

    /**
     * @param string $view
     */
    protected function setView($view)
    {
        $this->view = $view;
    }

    /**
     * @return string
     */
    protected function getView()
    {
        return $this->view;
    }

    

}
