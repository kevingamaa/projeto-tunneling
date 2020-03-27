<?php


function dd(...$vars)
{

    echo "<div style='background: #000; color: green; padding: 20px'>";
    foreach ($vars as $var) {
        echo "<pre>";
        var_dump($var);
        echo "</pre>";
    }
    echo "</div>";
    die();
}


function auth()
{
    if (isset($_SESSION['user'])) {
        return true;
    }
}


function assets($item)
{
    return DIRPUBLIC . $item;
}


function route($route)
{
    return DIRPAGE . $route;
}



function redirect($route, $data = []) 
{
    $get  = route($route);
    if(count($data) > 0) {
        $get .= '?';
    }
    foreach ($data as $key => $value) {
        # code...
        $get .= "{$key}=$value&";
    }
    
    header("Location: {$get}");
}


function _method($method) 
{
    echo "<input type='hidden' name='_method' value='{$method}'>";
}