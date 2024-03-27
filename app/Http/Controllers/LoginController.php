<?php

namespace app\Http\Controllers;

use app\Http\Providers\Validation;
use app\Http\Traits\Template;
use app\Models\Database;
use Exception;

class LoginController
{
    use Template;

    public function index()
    {
        $this->view('login', []);
    }

    public function store()
    {
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

        try {
            $database = new Database;
            $user = $database->byId('users', 'email', $email);

            if (empty($email) || empty($password)) {
                throw new Exception("Preencha todos os campos corretamente.");
            }

            if (empty($user) || !password_verify($password, $user->password)) {
                throw new Exception("E-mail ou senha inválidos.");
            }

            $_SESSION[LOGGED] = $user;

            // Retorna uma resposta JSON de sucesso
            echo json_encode(array('success' => true));
            exit; // Termina a execução após enviar a resposta JSON

            // $logar = new HomeController;

            // $logar->show();
        } catch (Exception $e) {
            echo json_encode(array('success' => false, 'message' => $e->getMessage()));
            exit;
        }
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

            $create = new Database;

            $create->create('users', $dados);

            if ($create) {
                echo json_encode(array('success' => true));
                exit;
            }
        } catch (Exception $e) {
            echo json_encode(array('success' => false, 'message' => $e->getMessage()));
            exit;
        }
    }
}
