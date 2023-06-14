<?php

class FormLogin {
    private $id;
    private $nom;
    private $prenom;
    private $mail;
    private $password;
    
    //Contructeur
    public function __construct() {
        $this->nom = $this->sanitize('nom');
        $this->prenom = $this->sanitize('prenom');
        $this->mail = $this->sanitize('mail');
        $this->password = $this->sanitize('password');
    }
    
    //Entrée des données en 'définfectant les données'
    //pour évité les injections SQL par exemple
    private function sanitize($name) {
        if (isset($_POST[$name])) {
            if (!empty($_POST[$name])) {
                return trim(htmlentities($_POST[$name]));
            }
        }
        return null;
    }
    
    public function process() {
        $user = new Users();
        //Si les nom, prénom et mail entrés dans le formulaire de login correspondent à la BDD
        if ($user->loginUser($this->nom, $this->prenom, $this->mail)) {
            // Suite -> et si le mot de passe correspond à la BDD
            if (password_verify($this->password, $user->password)) {
                $_SESSION['id'] = $user->id;
                echo 'connecté';
            } else {
                echo "Mot de Passe incorrect ou inexistant.";
            }
        } else {
            // Pas réussi à charger l'utilisateur à l'aide de son mail
            echo "Nom, Prénom, Mail ou Mot de Passe incorrect ou inexistant.";
        }
    }
}