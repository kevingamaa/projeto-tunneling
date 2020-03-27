<?php

namespace Core;

use Core\Classes\Routing;

class App
{
    public $router;
    function __construct()
    {
        // echo DIRRE
        $this->router = new Routing();
    }

    public function init()
    {
        $this->addCtrl();
    }




    public function addCtrl() {
        $route = $this->router->getRoute();
        // $nameS = "App\\Controllers\\$routeCtrl";
        // $this->ctrl = new $nameS()


        $route->ctrl = new  $route->ctrl();

        if(!is_null($route->action) ) {
            $this->addMethod($route);
        }
    }

    public function addMethod($route) {
        if(!$route->action) {
            $route->action = 'index';
        }
        // dd($route->params);
        $return = call_user_func_array([$route->ctrl, $route->action], $route->params);
        if(is_string( $return)){
            echo  $return;
        } 
    }




}
