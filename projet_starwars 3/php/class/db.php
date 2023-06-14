<?php

/**
 * Classe statique permettant de récupérer une connexion à la base de données PDO.
 */
class Db {
    private static $host = "db.3wa.io";
    private static $user = "damienguichous";
    private static $password = "3f6df220bf5e1296924f2c9c77935820";
    private static $database = "damienguichous_starwars";
    private static $link = null;
    
    public static function getDb() {
        // Si le lien avec la BDD n'existe pas encore, on le recrée
        if (!self::$link) {
            $dsn = "mysql:dbname=".self::$database.";host=".self::$host.";charset=utf8";
            // Met le lien de la BDD dans l'attribut statique de la classe
            self::$link = new PDO($dsn, self::$user, self::$password);
        }
        return self::$link;
    }
}