<?php

namespace app\Http\Traits;

trait Uri
{
    public function uri()
    {
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }
}
