<?php

namespace Core\Classes;


abstract class Controller {


    protected $view;

    public function view($viewName, $data = []) {
        $viewName = str_replace('.', "/", $viewName);
        $this->view = new View( $viewName , $data);
        return $this->view;
    }


   
}