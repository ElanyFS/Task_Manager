<?php

use app\Helpers\Parameters;
use app\Http\Controllers\Controller;
use app\Http\Controllers\Method;

require "../bootstrap.php";

$uri = uri();

$controller = new Controller($uri);
$controller = $controller->load();

$method = new Method();
$method = $method->load($controller);


$parametros = new Parameters($uri);
$parametros = $parametros->load();

$controller->$method($parametros);