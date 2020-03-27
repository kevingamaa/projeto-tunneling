<?php

namespace Core;

use Core\Classes\Routing;

class App
{
    public $router;
    function __construct()
    {
       
        $this->router = new Routing();
    }

    public function init()
    {
      
        $this->addCtrl();
    }


    public function addCtrl() {
        $route = $this->router->getRoute();
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
        $reflection = new \ReflectionMethod($route->ctrl, $route->action);
        $canContinue = true;
        // dd($method->gettype());
        $params = [];
        foreach ($reflection->getParameters() as $key) {
            if(!$key->isOptional() && $class = $key->getClass()) {
               $params[$key->getPosition()] = $class->newInstance();
            }
        }
        
        if(isset($route->middleware))
        {
            $middleware = new $route->middleware();
            $canContinue = call_user_func_array([$middleware, 'handle'],  $route->params);
            $return =  $canContinue ;
        }
        
        if($canContinue) {
            $params = array_merge( $params, $route->params);
            $return = call_user_func_array([$route->ctrl, $route->action],  $params);
        }
        

        if(is_string( $return)){
            echo  $return;
        } 

        // dd($return);
    }




}
