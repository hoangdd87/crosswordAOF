<?php

/**
 * Created by PhpStorm.
 * User: Hoang
 * Date: 30-Aug-17
 * Time: 11:20 PM
 */


class Response_Json
{
    public $successful;
    public $message;

    /**
     * response_json constructor.
     * @param boolean $successful
     * @param string $message
     */
    public function __construct($successful, $message)
    {
        $this->successful = $successful;
        $this->message = $message;
    }

    /**
     * response_json constructor.
     */


}