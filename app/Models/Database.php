<?php

namespace app\Models;

use app\Models\Database\Connection;
use Doctrine\Inflector\InflectorFactory;

class Database
{
    protected $connection;

    public function __construct()
    {
        $this->connection = Connection::connect();
    }
    public function all($table)
    {
        $sql = "select * from {$table}";
        
        $statement  = $this->connection->prepare($sql);
        $statement ->execute();

        return $statement ->fetchAll();
    }

    public function byId($table, $field, $value, $fields = '*')
    {
        $sql = "select {$fields} from {$table} where $field = :{$field}";

        $statement = $this->connection->prepare($sql);
        $statement->execute([
            $field => $value
        ]);

        return $statement->fetch();
    }

    private function fieldFK($table, $field)
    {
        $inflector = InflectorFactory::create()->build();

        $table = $inflector->singularize($table); // Retornar o nome da tabela no singular

        return $table . ucfirst($field); // Retornar o nome da tabela no singular concatenado com o Id. Ex.: commentId

    }

    public function innerJoinTable($table, $tableInner, $field, $value, $fields)
    {

        $idTable = $this->fieldFK($table, 'id');

        $sql = "select ";
        $sql .= implode(',', array_values($fields));
        $sql .= " from {$table} inner join {$tableInner} on {$table}.{$idTable} = {$tableInner}.{$idTable} where {$table}.$field = :{$field}";

        $statement  = $this->connection->prepare($sql);
        $statement ->execute([
            $field => $value
        ]);

        return $statement ->fetchAll();
    }

    public function create($table, $fields)
    {
        $sql = "insert into {$table} (";
        $sql .= implode(',', array_keys($fields)) . ") values (";
        $sql .= ":" . implode(', :', array_keys($fields)) . ")";

        $statement  = $this->connection->prepare($sql);
        return $statement ->execute($fields);
    }
}
