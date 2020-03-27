<?php

namespace Core\Classes;


abstract class Controller {
    public function view($viewName, $data = []) {
        $viewName = str_replace('.', "/", $viewName);
        $view = new View( $viewName , $data);
        return $view->render();
    }

   
}