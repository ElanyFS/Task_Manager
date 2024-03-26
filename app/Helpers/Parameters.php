<?php

namespace app\Helpers;

use app\controllers\Uri;

class Parameters{
    private $uri;

    public function __construct($uri)
    {
        $this->uri = $uri;
    }

    public function load(){
        return $this->getParametro();
    }

    public function getParametro(){
        if(substr_count($this->uri, '/') > 2){
            $parametro = array_values(array_filter(explode('/', $this->uri)));

            return (object) [
                'parametro' => filter_var($parametro[2], FILTER_SANITIZE_STRING),
                'nextParametro' => filter_var($this->getNextParametro(2), FILTER_SANITIZE_STRING)
            ];
        }
    }

    public function getNextParametro($atual){
        $parametro = array_values(array_filter(explode('/', $this->uri)));

        return $parametro[$atual + 1] ?? $parametro[$atual];
    }
}