<?php

namespace App\Models;

class Message extends Model
{
    //herite de $connection
    protected $table = 'messages';

    public function messagesBetween($auteur,$destinataire)
    {
        $request1 = new User();
        $user1 = $request1->findById($auteur);
        
        $request2 = new User();
        $user2 = $request2->findById($destinataire);

        $request3 = $this->connection->getPDO()->prepare("SELECT * FROM $this->table 
            WHERE (id_auteur=:auteur AND id_destinataire=:destinataire) 
            OR (id_auteur=:destinataire AND id_destinataire=:auteur)
            ORDER BY created_at");
        
        $request3 -> bindParam(":auteur",$auteur);
        $request3 -> bindParam(":destinataire",$destinataire);
        $request3 -> execute();

        $result = [
            'user1' => $user1,
            'user2' => $user2,
            'messages' => $request3->fetchAll()
        ];

        return $result;
    }

    public function save($user1,$user2)
    {
        date_default_timezone_set('Europe/Paris');
        $today = date("Y-m-d H:i:s");

        $requete = $this->connection->getPDO()->prepare(
            'INSERT INTO Messages(id_auteur,id_destinataire,texte,created_at)
            VALUES(:ida,:idd,:texte,:date)'
        );
        
        $requete -> bindParam(':ida',$user1);
        $requete -> bindParam(':idd',$user2);
        $requete -> bindParam(':texte',$_POST['message']);
        $requete -> bindParam(':date',$today);
        $requete -> execute();
    }
}
