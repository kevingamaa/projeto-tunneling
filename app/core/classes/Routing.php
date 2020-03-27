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
        $this->routes[] =  (object) [
            "ctrl" => "App\\Controllers\\DefaultController",
            "action" => "forbidden",
            'params' => [],
            'method' => 'GET',
            'path' => '401'
        ];
    }


    public function getRoute()
    {
        $url = $this->parseUrl();
        $method = $_SERVER['REQUEST_METHOD'];
        if(isset($_REQUEST['_method'] ))
        {
            $method  = $_REQUEST['_method'];
        }

        
        $wrongMethod = false;
        $this->current_route = $this->routes[0];
        foreach ($this->routes as $route) {
            $wrongMethod = false;
            $pathArray = explode('/', $route->path); // spara os paths
            $count = 0;
            if (count($pathArray) == count($url)) { // verifica se tem a mesma quantidade de path, antes de uma verificação mais profunda
                for ($i = 0; $i < count($pathArray); $i++) {  // percore o path da rota 
                    if ($url[$i] == $pathArray[$i]) { //verifica se é o mesmo que o da rota atual
                        $count++; // adiciona mais para o count de match
                    } else if (strstr($pathArray[$i], "{") && strstr($pathArray[$i], "}")) { //verfica se tem algum parametro
                        $route->params[] = $url[$i]; //adiciona parametro
                        $count++; // adiciona mais para o count de match
                    }
                }
            }
            // echo "route: {$route->method}, server: {$method} - {$route->path} <br>" ;

            if ($count == count($pathArray)) { //verifica se o $count tem a mesma quantidade do que o da rota percorrida no array; 
                if ($route->method !== $method) { // verifica se o metodo é o mesmo da rota pré selecionada
                    $wrongMethod = true; // caso não seja adiciona flag pra erro
                    continue;
                }

                $this->current_route = $route;
                break;
            }
        }

        if ($wrongMethod) {
            throw new \Exception("Method {$method}  Not permited in this route, only {$route->method} methods");
        }

        // dd($this->current_route);
        return  $this->current_route;
    }


    public function get($path, $ctrl, $action)
    {
        $this->addRoute($path, $ctrl, $action, 'GET');
        return $this;
    }

    public function post($path, $ctrl, $action)
    {
        $this->addRoute($path, $ctrl, $action, 'POST');
        return $this;
    }

    public function put($path, $ctrl, $action)
    {
        $this->addRoute($path, $ctrl, $action, 'PUT');
        return $this;
    }

    public function delete($path, $ctrl, $action)
    {
        $this->addRoute($path, $ctrl, $action, 'DELETE');
        return $this;
    }


    public function middleware($name) 
    {
        $this->routes[count( $this->routes) - 1]->middleware = "App\\Middlewares\\".$name;
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
