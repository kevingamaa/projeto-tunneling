<?php

namespace Core\Classes;

use Core\Traits\QueryBuilder;
use stdClass;

class DB
{

    use QueryBuilder;
    protected $connection;
    protected $schema;



    protected $fillable = [];
    protected $hidden = [];

    protected $className;
    function __construct()
    {
        try {
            $this->connection = new \PDO(getenv('DB_CONNECTION') . ":host=" . getenv('DB_HOST') . ";dbname=" . getenv('DB_DATABASE'), getenv('DB_USERNAME'), getenv('DB_PASSWORD'));
            $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $this->connection->exec("set names utf8");
            // $dbh = null;
        } catch (PDOException $e) {
            throw new Exception("Error!: " . $e->getMessage(), 1);
        }
    }


    public function table($tableName) {
        $this->table = $tableName;
        return $this;
    }
    public function class($tableName) {
        $this->className = $tableName;
        return $this;
    }

    public function defineHidden($hidden) {
        $this->hidden = $hidden;
        return $this;
    }
    public function create($create)
    {
        
        $stmt = $this->connection->prepare("INSERT INTO {$this->table}  ({$create->collumns})  VALUES ({$create->values})");
        $stmt->execute($create->data);
        $stmt = $this->connection->query("SELECT LAST_INSERT_ID()");
        $lastId = $stmt->fetchColumn();
        return $this->find($lastId);
    }


    public function find(Int $id)
    {
        $db = new DB();
        $stmt = $db->connection->prepare("SELECT * FROM {$this->table}  WHERE id = :id");
        $stmt->execute([
            ':id' => $id
        ]);
        $obj = $stmt->fetchObject($this->className);
        return $obj;
    }

    public function update($update) 
    {
        $stmt = $this->connection->prepare("UPDATE  {$this->table} SET {$update->values}, updated_at = :updated_at where id = :id");
        $update->data[':id'] = $this->id;
        $update->data[':updated_at'] =  date('Y-m-d H:i:s');
        $stmt->execute($update->data);
        return $this->find($this->id);
    }

    public function delete()
    {
        $stmt = $this->connection->prepare("DELETE FROM {$this->table} WHERE id = :id");
        $stmt->bindParam(':id', $this->id); 
        return $stmt->execute();
    }
    public function select($select)
    {
        $stmt = $this->connection->prepare($select->query);
        $stmt->execute($select->data);
        $data = [];
        while ( $obj = $stmt->fetchObject($this->className)) {
          
            $data[] = $obj;
        }
        return $data;
    }



    
}
