<?php

namespace app\Http\Providers;

class Validation
{
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

               if(str_contains($value, ":")){
                    [$value, $param] = explode(':', $value);
               }

               $result[$field]= self::$value($field, $param);
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
            return false;
        }

        $value = filter_input(INPUT_POST, $field, FILTER_SANITIZE_STRING);

        return trim($value);
    }

    private static function email($field, $param)
    {
        // VEricar no banco de dados
        return filter_input(INPUT_POST, $field, FILTER_SANITIZE_EMAIL);
    }
}
