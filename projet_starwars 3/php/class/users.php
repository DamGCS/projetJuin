<?php

//Classe Utilisateur
class Users {
    public $id;
    public $nom;
    public $prenom;
    public $lieu_de_residence;
    public $mail;
    public $password;
    
    public function __construct($id = null) {
        $this->id = $id;
    }
    
    //Connexion
    
    public function loginUser($nom, $prenom, $mail) {
        $query = "SELECT id, nom, prenom, mail, password FROM users WHERE nom=:nom AND prenom=:prenom AND mail=:mail";
        $stmt = Db::getDb()->prepare($query);
        $stmt->execute(['nom' => $nom, 'prenom' => $prenom, 'mail' => $mail]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        //Vérifie que les données entrées dans le formulaire Login soient les mêmes que le user enregistré dans la BDD
        if ($row){
            $this->id = $row['id'];
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->mail = $mail;
            $this->password = $row['password'];
        return true;
    } else {
        return false;
    }
}
    //Fonction qui sert à sauvegarder les infos de l'utilisateur lors de l'inscriptions
    public function save() {
        if (!$this->id) {
            // Nouvel utilisateur = INSERT INTO
            $query = "INSERT INTO users (nom, prenom, lieu_de_residence, mail, password) VALUES (:nom, :prenom, :lieu_de_residence, :mail, :password)";
            $stmt = Db::getDb()->prepare($query);
            if ($stmt->execute(['nom' => $this->nom, 'prenom' => $this->prenom, 'lieu_de_residence' => $this->lieu_de_residence, 'mail' => $this->mail, 'password' => $this->password])) {
                // Initialiser la session
                $this->id = Db::getDb()->lastInsertId();
                $_SESSION['id'] = $this->id;
            }
            //permet à l'utilisateur de modifier son profil
        } else {
            // Utilisateur existant = UPDATE
            $query = "UPDATE users SET nom=:nom, prenom=:prenom, lieu_de_residence=:lieu_de_residence, mail=:mail, password=:password";
            $stmt = Db::getDb()->prepare($query);
            $stmt->execute(['nom' => $this->nom, 'prenom' => $this->prenom, 'lieu_de_residence' => $this->lieu_de_residence, 'mail' => $this->mail, 'password' => $this->password]);;
        }
    }
} 