<?php

namespace app\Http\Traits;

use League\Plates\Engine;

trait Template
{
    public function view($view, $data)
    {

        $viewPath = dirname(__FILE__, 3) . "/Views/pages";

        $templates = new Engine($viewPath);

        // Render a template
        echo $templates->render($view, ['data' => $data]);
    }
}
