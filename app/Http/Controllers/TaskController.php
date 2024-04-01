<?php

namespace app\Http\Controllers;

use app\Http\Providers\Validation;
use app\Http\Traits\Template;
use app\Models\Database;
use Exception;

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

        $this->view('createTask', ['categories' => $categories]);
    }

    public function store()
    {
        try {
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

            $create->create('task', $dados);

            header('Location: /home/show');
            exit;
        } catch (Exception $e) {
            echo json_encode(array('success' => false, 'message' => $e->getMessage()));
            exit;
        }
    }

    public function showCategory($request)
    {
        $tasks = new Database;

        $tasks = $tasks->getById('task', ['userId' => $_SESSION[LOGGED]->userId, 'categoryId' => $request->parametro]);

        $this->view('taskListCategory', ['task' => $tasks]);
    }


    public function showTaskConcluida()
    {
        $tasks = new Database;

        $tasks = $tasks->getById('task', ['userId' => $_SESSION[LOGGED]->userId, 'status' => 'concluido']);

        $this->view('taskListCategory', ['task' => $tasks]);
    }
    public function updateStatus($request)
    {
        $task = new Database();

        $id = $request->parametro;

        $task->update('task', ['status' => 'concluido'], "taskId = $id");

        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    }
}
