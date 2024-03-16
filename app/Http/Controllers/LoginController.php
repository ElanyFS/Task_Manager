<?php

namespace app\Http\Controllers;

use app\Http\Providers\Validation;
use app\Http\Traits\Template;
use app\Models\Database;
use Exception;

class LoginController
{
    use Template;

    public function store()
    {
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

        $database = new Database;
        $user = $database->byId('users', 'email', $email);

        if (empty($email) || empty($password)) {
            throw new Exception("Preencha todos os campos corretamente.");
        }

        if (empty($user) || !password_verify($password, $user->password)) {
            throw new Exception("E-mail ou senha inválidos.");
        }

        $_SESSION[LOGGED] = $user;

        $this->view('index', []);
    }

    public function create()
    {
        try {
            $validate = [
                'name' => 'required',
                'email' => 'required|email:users',
                'password' => 'required|password'
            ];

            $dados = Validation::validate($validate);

            if (!$dados) {
                echo 'Preencha todos os campos';
                die();
            }

            $create = new Database;

            $create->create('users', $dados);

            if ($create) {
                echo "Usuário cadastrado com sucesso";
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
