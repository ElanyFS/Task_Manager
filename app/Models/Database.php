<?php

namespace app\Models;

use app\Models\Database\Connection;
use Doctrine\Inflector\InflectorFactory;

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

    private function fieldFK($table, $field)
    {
        $inflector = InflectorFactory::create()->build();

        $table = $inflector->singularize($table); // Retornar o nome da tabela no singular

        $tableToSingularId = $table . ucfirst($field); // Retornar o nome da tabela no singular concatenado com o Id. Ex.: commentId

        return $tableToSingularId;
    }

    public function innerJoinTable($table, $tableInner, $field, $value, $fields)
    {

        $idTable = $this->fieldFK($table, 'id');

        $sql = "select ";
        $sql .= implode(',', array_values($fields));
        $sql .= " from {$table} inner join {$tableInner} on {$table}.{$idTable} = {$tableInner}.{$idTable} where {$table}.$field = :{$field}";

        $prepare = $this->con->prepare($sql);
        $prepare->execute([
            $field => $value
        ]);

        return $prepare->fetchAll();
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
