<?php

namespace App\Models;

class User extends Model
{
    //herite de $connection
    protected $table = 'users';
    public $count_row;

    public function getUserByPseudo($pseudo)
    {
        $request = $this->connection->getPDO()->prepare("SELECT * FROM $this->table WHERE pseudo = :pseudo");
        $request -> bindParam(':pseudo',$pseudo);
        $request -> execute();

        $result = $request->fetchAll();

        $this->count_row = $request->rowCount();

        return $result;
    }

    public function saveUser($pseudo, $passw)
    {
        date_default_timezone_set('Europe/Paris');
        $today = date("Y-m-d H:i:s");
       
        $newPseudo = htmlspecialchars($pseudo);
        $newPassw = password_hash($passw,PASSWORD_DEFAULT);

        $requete = $this->connection->getPDO()->prepare(
            'INSERT INTO users(pseudo, passw, created_at) VALUES(:pseudo,:passw,:date)' //:texte,:date
        );  
        
        $requete -> bindParam(':pseudo',$newPseudo);
        $requete -> bindParam(':passw',$newPassw);
        $requete -> bindParam(':date',$today);
        $requete -> execute();      
    }

}