<?php

namespace app\Http\Traits;

trait CheckPassword
{
    public static function checker($password)
    {
        //Verificar o comprimento
        if (strlen($password) < 8) {
            throw new \Exception("A senha deve conter pelo menos um 8 caracteres.");
            return false;
        }

        //Evitar senhas comuns
        $senhas = ['123456', 'admin', '12345678'];
        if (in_array(strtolower($password), $senhas)) {
            throw new \Exception("Senha comum");
            return false;
        }

        //Verificar caracteres especiais
        if (!strpbrk($password, '!@#$%¨&*(){}:\;_-+*^<>.,')) {
            throw new \Exception("A senha deve conter pelo menos um caractere especial!");
            return false;
        }

        //Verificar tipos de caracteres
        if (!(preg_match('/[a-z]/', $password) && preg_match('/[A-Z]/', $password) && preg_match('/[!@#$%^&*()_+{}:;<>,.?~\-]/', $password) && preg_match('/[0-9]/', $password))) {
            throw new \Exception("A senha deve conter pelo menos um caractere especial, uma letra maiuscula e um numero.");
            return false;
        }

        return password_hash($password, PASSWORD_DEFAULT);
    }
}
