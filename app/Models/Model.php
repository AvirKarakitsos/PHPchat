<?php

namespace App\Models;

use Database\DBConnection;

abstract class Model //on ne peut pas créer d'objet new Model()
{
    protected $connection;
    protected $table;

    public function __construct()
    {
        $this->connection = new DBConnection(DBNAME,HOST,USERAME,PASSWORD);
    }

    public function findById($id)
    {
        $request = $this->connection->getPDO()->prepare("SELECT * FROM $this->table WHERE id = :id");
        $request -> bindParam(':id',$id);
        
        //$request->setFetchMode(PDO::FETCH_CLASS,get_class($this),[$this->connection]);
        //permet d'affecter le type de classe (User ou Message)

        $request -> execute();
        $result = $request->fetch();

        return $result;
    }

    public function all()
    {
        $request = $this->connection->getPDO()->prepare('SELECT * FROM '.$this->table); 
        $request -> execute();

        $result = $request->fetchAll();

        return $result;
    }
}