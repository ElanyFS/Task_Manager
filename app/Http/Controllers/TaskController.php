<?php

namespace app\Http\Controllers;

use app\Http\Providers\Validation;
use app\Http\Traits\Template;
use app\Models\Database;

class TaskController
{
    use Template;

    public function index()
    {
        $this->view('login', []);
    }

    public function create()
    {
        $database = new Database;

        $categories = $database->all('category');

        $this->view('createTask', ['categories'=>$categories]);
    }

    public function store()
    {
        $validate = [
            'name'  => 'required',
            'categoryId' => 'required',
            'status' => 'required',
            'start_date' => 'required',
            'completion_date' => 'required',
            'description' => 'required',
            'userId'  => 'required',
            'priority' => 'required',
        ];

        $dados = Validation::validate($validate);

        $create = new Database;

        if (!$create) {
            echo "Preencha todos os campos.";
        }

        if($create->create('task', $dados)){
            $index = new HomeController;
            $index->show();
        }
    }

    public function showCategory($request){
        var_dump($request->parametro);die();
        $tasks = new Database;
        $taskList = $tasks->innerJoinTable('users', 'task', 'categoryId', $_SESSION[LOGGED]->userId, ['*']);

    }
}
