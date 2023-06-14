<?php

class Planetes {
    public $id;
    public $nom;
    public $region;
    public $secteur;
    public $systeme;
    public $capitale;
    public $habitant;
    
    //Méthode static qui permet de récuperer toutes les infos planètes
    public static function getPlanetes() {
        $query = "SELECT * FROM planetes";
        $stmt = Db::getDb()->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}