<?php

namespace app\Models;

use app\Models\Database\Connection;

class Database
{
    protected $con;

    public function __construct()
    {
        $this->con = Connection::connect();
    }
    public function all($table)
    {
        $sql = "select * from {$table}";
        $prepare = $this->con->prepare($sql);
        $prepare->execute();

        return $prepare->fetchAll();
    }

    public function byId($table, $field, $value, $fields = '*')
    {
        $sql = "select {$fields} from {$table} where $field = :{$field}";

        $prepare = $this->con->prepare($sql);
        $prepare->execute([
            $field => $value
        ]);

        return $prepare->fetch();
    }

    public function create($table, $fields)
    {
        $sql = "insert into {$table} (";
        $sql .= implode(',', array_keys($fields)) . ") values (";
        $sql .= ":" . implode(', :', array_keys($fields)) . ")";

        $prepare = $this->con->prepare($sql);
        return $prepare->execute($fields);
    }
}
