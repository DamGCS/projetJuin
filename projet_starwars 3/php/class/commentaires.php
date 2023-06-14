<?php

class Commentaires {
    public $id;
    public $titre;
    public $commentaire;
    public $note;
    public $id_users;
    
    //Méthode static qui permet de récuperer toutes les commentaires
    public static function getCommentaires() {
        $query = "SELECT * FROM commentaire_avis";
        $stmt = Db::getDb()->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, "Commentaires");
    }
}