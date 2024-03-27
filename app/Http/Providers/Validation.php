<?php

namespace app\Http\Providers;

use app\Http\Traits\CheckPassword;
use app\Models\Database;

class Validation
{
    use CheckPassword;

    public static function validate($data)
    {
        $param = '';
        $result = [];

        foreach ($data as $field => $value) {
            if (!str_contains($value, '|')) {
                if (str_contains($value, ':')) {
                    [$value, $param] = explode(":", $value);
                }
                $result[$field] = self::$value($field, $param);
            }
            $valuesMultiplos = explode('|', $value);

            foreach ($valuesMultiplos as $value) {

                if (str_contains($value, ":")) {
                    [$value, $param] = explode(':', $value);
                }

                $result[$field] = self::$value($field, $param);
            }
        }

        if (in_array(false, $result, true)) {
            return false;
        }

        return $result;
    }

    public static function required($field)
    {

        if (!isset($_POST[$field]) || $_POST[$field] === '') {
            throw new \Exception('Preencha todos os campos.');
            return false;
        }

        $value = filter_input(INPUT_POST, $field, FILTER_SANITIZE_STRING);

        return trim($value);
    }

    private static function email($field, $param)
    {
        $value =  filter_input(INPUT_POST, $field, FILTER_SANITIZE_EMAIL);

        $database = new Database;
        $user = $database->byId($param, $field, $value);

        if ($user) {
            throw new \Exception("E-mail já cadastrado.");
            return false;
        }
        return $value;
    }

    private static function password($field){
        $password = filter_input(INPUT_POST, $field, FILTER_SANITIZE_STRING);

        return self::checker($password);
    }
}
