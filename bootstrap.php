<?php
session_set_cookie_params(360);
session_start();

require "vendor/autoload.php";

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

function uri()
{
    return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
}
