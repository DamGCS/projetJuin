<?php

class FormSubscribe {
    private $id;
    private $nom;
    private $prenom;
    private $lieu_de_residence;
    private $mail;
    private $mail2;
    private $password;
    private $password2;
    
    //Sanitize les infos que l'utilisateur entre pour s'inscrire
    public function __construct() {
        $this->nom = $this->sanitize('nom');
        $this->prenom = $this->sanitize('prenom');
        $this->lieu_de_residence = $this->sanitize('lieu_de_residence');
        $this->mail = $this->sanitize('mail');
        $this->mail2 = $this->sanitize('mail2');
        $this->password = $this->sanitize('password');
        $this->password2 = $this->sanitize('password2');
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
    //Vérifie si les emails correspondent
    private function checkMail() {
        if ($this->mail !== $this->mail2) {
            echo "emails différents";
            return false;
        }
        return true;
    }
    //Vérifie si les mots de passes correspondent
    private function checkPassword() {
        if ($this->password !== $this->password2) {
            echo "password différents";
            return false;
        }
        return true;
    }
    //Méthode pour vérifier que le mail n'existe pas déjà 
    private function checkMailUnique() {
        $query = "SELECT mail FROM users WHERE mail=:mail";
        $stmt = Db::getDb()->prepare($query);
        $stmt->execute(['mail' => $this->mail]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            echo "email déjà existant";
            return false;
        }
        return true;
    }
    //Si le champ n'est pas vide 
    public function process() {
        if (!empty($this->nom) 
        && !empty($this->prenom)
        && !empty($this->lieu_de_residence)
        && !empty($this->mail) 
        && !empty($this->mail2) 
        && !empty($this->password) 
        && !empty($this->password2)) {
            //Si les champs sont remplis on continue de traiter le formulaire
            $check = true;
                
            // Vérification des emails (email 1 = email 2)
            if (!$this->checkMail()) {
                $check = false;
            }
            
            // Vérification des passwords (password 1 = password 2)
            if (!$this->checkPassword()) {
                $check = false;
            }
            
            // Vérification des emails (n'est pas dans la base de données)
            if (!$this->checkMailUnique()) {
                $check = false;
            }
               //Si la varariable renvois true, continue l'inscription 
            if ($check) {
                //créer un nouvel utilisateur
                $user = new Users();
                $user->nom = $this->nom;
                $user->prenom = $this->prenom;
                $user->lieu_de_residence = $this->lieu_de_residence;
                $user->mail = $this->mail;
                //Hasher le mot de passe, (Récupere puis le hash).
                $user->password = password_hash($this->password, PASSWORD_DEFAULT);
                //sauvegarde le nouvel utilisateur dans la BDD
                $user->save();
                //Erreur dans la saisie des champs 
            } else {
                echo "Erreur dans la saisie";
            }
            //Un ou plusieurs champs sont vides 
        } else {
            echo "Certains champs sont vides";
        }
    }
}