<?php
require_once 'commentaire.php';

class FormCommentaire {
    private $id;
    private $titre;
    private $nom;
    private $prenom;
    private $commentaire;
    
    // Constructeur
    public function __construct() {
        $this->titre = $this->sanitize('titre'); 
        $this->nom = $this->sanitize('nom');
        $this->prenom = $this->sanitize('prenom');
        $this->commentaire = $this->sanitize('commentaire');
    }
    
    // Fonction qui nettoie les données envoyées par le formulaire
    private function sanitize($name) {
    if (isset($_POST[$name])) {
        if (!empty($_POST[$name])) {
            return trim(htmlspecialchars($_POST[$name]));
        }
    }
    return null;
}

    
   public function process() {
    // Vérification que tous les champs sont remplis
    $check = false;
    if (!empty($this->titre) 
    && !empty($this->nom) 
    && !empty($this->prenom)
    && !empty($this->commentaire)) {
        // Si tous les champs sont remplis, on continue de traiter le formulaire
        $check = true;
    }
    
    // Si la variable $check est true, on continue
    if ($check) {
        // Créer un nouvel avis
        $commentaire = new Commentaire();
        $commentaire->id = $this->id;
        $commentaire->titre = $this->titre;
        $commentaire->nom = $this->nom;
        $commentaire->prenom = $this->prenom;
        $commentaire->commentaire = $this->commentaire;
        $commentaire->save();
    } else {
        // Un ou plusieurs champs sont vides 
        echo "Certains champs sont vides";
    }
}

}

