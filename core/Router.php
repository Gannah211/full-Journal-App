<?php
class Router{
    private $routes=[];

    public function get($url, $action){
        $this->routes['GET'][$url] = $action;
    }

    public function post($url, $action){
        $this->routes['POST'][$url] =$action;
    }

    public function dispatch(){
        $method = $_SERVER['REQUEST_METHOD'];

        $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $url = str_replace('/JOURNALAPP/public', '', $url);

        if($url == ''){
            $url = '/';
        }

        $action = $this->routes[$method][$url]?? null ;
  
        if(!$action){
        die("Route not found: " . $url);
    }

        list($controller,$methodName) = explode('@',$action);

        require_once "../App/controllers/$controller.php";

        $controller = new $controller;
            
        $controller->$methodName();
    }
}