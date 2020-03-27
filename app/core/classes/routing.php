<?php

namespace Core\Classes;

use Core\Traits\TraitUrlParser;
use App\Controllers\DefaultController;

class Routing
{
    use TraitUrlParser;

    protected $routes;
    public $current_route;

    function __construct()
    {
        $this->routes[] =  (object) [
            "ctrl" => "App\\Controllers\\DefaultController",
            "action" => "notFound",
            'params' => [],
            'method' => 'GET',
            'path' => '404'
        ];
    }


    public function getRoute()
    {
        $url = $this->parseUrl();
        foreach ($this->routes as $route ) {

            // dd($route);
            $pathArray = explode('/', $route->path);
            $count = 0;
            $methodError = false;
            for ($i=0; $i < count($pathArray) ; $i++) { 
                # code...
                if(count($pathArray) == count($url)) {
                    if($url[$i] == $pathArray[$i]) {
                        $count++;
                    }else if(strstr($pathArray[$i], "{") && strstr($pathArray[$i], "}")) {
                        // $paramIndice = str_replace('{', '', $r[$i]);
                        // $paramIndice =  str_replace('{', '', $paramIndice);
                        $route->params[] = $url[$i];
                        $count++;
                    }
                }
            }
            if($count == count($pathArray ) ) {
                if($route->method == $_SERVER['REQUEST_METHOD']) {
                    $this->current_route = $route; 
                    return $this->current_route;
                }else {
                    // trigger_error();

                    throw new \Exception("Method {$_SERVER['REQUEST_METHOD']}  Not permited in this route, only {$route->method} methods");
                }
            } 
            
        }

        return $this->routes[0];
    }


    public function get($path, $ctrl, $action)
    {
        $this->addRoute($path, $ctrl, $action, 'GET');
    }

    public function post($path, $ctrl, $action)
    {
        $this->addRoute($path, $ctrl, $action, 'POST');
    }



    private function addRoute($path, $ctrl, $action, $method = '')
    {
        header("Access-Control-Allow-Methods: $method, OPTIONS"); 
        $this->routes[] = (object) [
            'ctrl' => "App\\Controllers\\{$ctrl}",
            'action' => $action,
            'params' => [],
            'method' => $method,
            'path' => $path
        ];
    }
}
