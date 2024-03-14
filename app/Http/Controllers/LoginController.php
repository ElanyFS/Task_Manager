<?php

namespace app\Http\Controllers;

use app\Http\Providers\Validation;

class LoginController
{


    public function create()
    {

        $validate = [
            'name' => 'required',
            'email' => 'required|email:users',
            // 'password' => 'required'
        ];

        $dados = Validation::validate($validate);

        if(!$dados){
            echo 'Preencha todos os campos';
        }
    }
}