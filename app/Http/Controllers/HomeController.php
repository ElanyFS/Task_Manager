<?php

namespace app\Http\Controllers;

use app\Http\Traits\Template;
use app\Models\Database;

class HomeController
{

    use Template;

    public function index()
    {
        $this->view('home', []);
    }

    public function show()
    {
        if (!isset($_SESSION[LOGGED]) || empty($_SESSION[LOGGED])) {
            $this->view('login');
            exit;
        }

        $tasks = new Database;
        $tasksT = $tasks->innerJoinTable('users', 'task', 'userId', $_SESSION[LOGGED]->userId);

        // var_dump($tasksT);

        $this->view('index',$tasksT);
    }
}
