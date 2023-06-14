<?php

    class Commentaire {
        public $id;
        public $titre;
        public $nom;
        public $prenom;
        public $commentaire;
        
    
    // Méthode non-static qui permet de sauvegarder un avis
    public function save() {
    $query = "INSERT INTO commentaire_avis (id, titre, nom, prenom, commentaire) 
                VALUES (:id, :titre, :nom, :prenom, :commentaire)";
    $stmt = Db::getDb()->prepare($query);
    $stmt->bindValue(':id', $this->id);
    $stmt->bindValue(':titre', $this->titre);
    $stmt->bindValue(':nom', $this->nom);
    $stmt->bindValue(':prenom', $this->prenom);
    $stmt->bindValue(':commentaire', $this->commentaire);
    $stmt->execute();
}

}