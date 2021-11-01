<?php

namespace Core\Classes;

class Request{
    public $request;
    public function __construct()
    {
        $this->request = (object)$_REQUEST;
    }
}