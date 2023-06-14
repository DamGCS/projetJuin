<?php

class Transports {
    public $id;
    public $nom;
    public $classe;
    public $constructeur;
    public $taille;
    public $equipage;
    public $passager;
    public $affiliation;
    public $soute;
    
    //Méthode static qui permet de récuperer touts les transports
    public static function getTransports() {
        $query = "SELECT * FROM transports";
        $stmt = Db::getDb()->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}