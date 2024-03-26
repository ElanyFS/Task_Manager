<?php

namespace app\Http\Controllers;

use app\Http\Traits\Uri;

class Method
{
    private $uri;
    private $method;
    use Uri;

    public function __construct()
    {
        $this->uri = self::getTraitValue();
    }

    private function getTraitValue()
    {
        return $this->uri();
    }

    private function getMethod()
    {
        if (substr_count($this->uri, '/') > 1) {
            list($controller, $method) = array_values(array_filter(explode('/', $this->uri)));

            return $method;
        }

        return 'index';
    }

    public function load($controller)
    {
        $method = self::getMethod();

        if (!method_exists($controller, $method)) {
            return "O método {$method} não foi encontrado no controller {controller}";
        }

        return $method;
    }
}
