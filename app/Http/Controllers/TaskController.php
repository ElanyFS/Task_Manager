<?php

namespace app\Http\Controllers;

use app\Http\Providers\Validation;
use app\Http\Traits\Template;
use app\Models\Database;

class TaskController
{
    use Template;

    public function show()
    {
        echo "Metodo Task";
    }

    public function create()
    {
        $this->view('createTask');
    }

    public function store()
    {
        $validate = [
            'name'  => 'required',
            'category' => 'required',
            'status' => 'required',
            'start_date' => 'required',
            'completion_date' => 'required',
            'description' => 'required',
            'userId'  => 'required',
            'priority' => 'required',
        ];

        $create = new Database;

        $dados = Validation::validate($validate);
        var_dump($dados);

        if (!$create) {
            echo "Preencha todos os campos.";
        }

        $create->create('task', $dados);
    }
}
