<?php

function user($logged){
    if (isset($_SESSION[$logged])) {
       return $_SESSION[$logged];
    } 

    return null;
}

function logged($logged){
    return isset($_SESSION[$logged]);
}