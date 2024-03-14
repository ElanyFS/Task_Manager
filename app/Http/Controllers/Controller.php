<?php

namespace app\Http\Controllers;

class Controller
{
    private $uri;
    private $controller;
    private $namespace = 'app\\Http\\Controllers';

    public function __construct($uri)
    {
        $this->uri = $uri;
    }

    private function isHome()
    {
        return ($this->uri == '/');
    }

    private function controllerHome()
    {
        $controller = 'HomeController';

        if (!self::controllerExist($controller)) {
            return "O controller {$controller} não foi encontrado";
        }

        $this->controller = $controller;

        return self::instanceController();
    }

    private function controllerNotHome()
    {
        $controller = self::getControllerNotHome();

        if (!self::controllerExist($controller)) {
            return "O controller {$controller} não foi encontrado";
        }

        $this->controller = $controller;
        
        return self::instanceController();
    }

    private function getControllerNotHome()
    {

        if (substr_count($this->uri, '/') > 1) {
            list($controller) = array_values(array_filter(explode('/', $this->uri)));
            return ucfirst($controller) . "Controller";
        }
        return ucfirst(ltrim($this->uri, '/')) . 'Controller';
    }

    private function instanceController()
    {
        $controller = $this->namespace . "\\" . $this->controller;
        return new $controller;
    }

    private function controllerExist($controller)
    {
        if (!class_exists($this->namespace . "\\" . $controller)) {
            return false;
        }
        return true;
    }

    public function load()
    {
        if (self::isHome()) {
            return self::controllerHome();
        }

        return self::controllerNotHome();
    }
}
