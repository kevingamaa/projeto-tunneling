<?php

namespace Core\Classes;
class Request {
    function __construct()
    {
        unset($_REQUEST['url']);
        foreach ($_REQUEST as $key => $value) {
            $this->{$key} = $value;
        }
    }




    public function all() 
    {
        return (Array) $this ;
    }




}