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
        $taskList = $tasks->innerJoinTable('users', 'task', 'userId', $_SESSION[LOGGED]->userId, ['*']);

        if(empty($taskList)){
            $this->view('index', ['taskListFive' => [], 'taskLate' => 'Sem tarefas atrasadas.', 'taskRecent' => '']);
            exit;
        }
        //Buscar as 5 tarefas mais recentes 
        $listFive = array_slice($taskList, 0, 5);

        //Buscar 1 tarefa atrasada
        // Inicializa a menor data como nula
        $menor_data = null;
        $taskMenorData = null;
        $maior_data = null;
        $taskMaiorData = null;

        // Itera sobre os objetos
        foreach ($taskList as $taskValue) {
            // Verifica se a menor data é nula ou se a data atual é menor do que a menor data encontrada até agora
            if ($menor_data === null || $taskValue->completion_date < $menor_data) {
                // Atualiza a menor data e a tarefa relacionada
                $menor_data = $taskValue->completion_date;
                $taskMenorData = $taskValue;
            }

            //Buscar 1 tarerfa mais recente
            if ($maior_data === null || $taskValue->start_date > $maior_data) {
                // Atualiza a menor data e a tarefa relacionada
                $maior_data = $taskValue->start_date;
                $taskMaiorData = $taskValue;
            }
        }

        $data_atual = date("Y-m-d");

        $taskLate = 'Sem tarefas atrasadas!';

        if ($taskMenorData->completion_date < $data_atual) {
            $taskLate = $taskMenorData->name;
        }

        $this->view('index', ['taskListFive' => $listFive, 'taskLate' => $taskLate, 'taskRecent' => $taskMaiorData]);
    }
}
