<?php

namespace app\Http\Controllers;

use app\Http\Traits\Template;

class HomeController
{

    use Template;

    public function index(){
        $this->view('home', []);
    }

    public function show(){
        echo 'Home';
    }
}
