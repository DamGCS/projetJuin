<?php

class Reservation {
    public $id;
    public $date_de_depart;
    public $date_arrive;
    public $heure_de_depart;
    public $heure_arrive;
    public $planete;
    public $combien_de_personnes;
    public $id_users;
    public $id_planetes;
    
    public function save() {
        if (!$this->id) {
            $query = "INSERT INTO reservations 
            (date_de_depart,
            date_arrive,
            heure_de_depart,
            heure_arrive,
            planete,
            combien_de_personnes,
            id_users,
            id_planetes)
            VALUES (
            :date_de_depart,
            :date_arrive,
            :heure_de_depart,
            :heure_arrive,
            :planete,
            :combien_de_personnes,
            :id_users,
            :id_planetes)";
            
          
            $stmt = Db::getDb()->prepare($query);
            
           if ($stmt->execute
            (['date_de_depart' => $this->date_de_depart,
            'date_arrive' => $this->date_arrive,
            'heure_de_depart' => $this->heure_de_depart,
            'heure_arrive' => $this->heure_arrive, 
            'planete' => $this->planete,
            'combien_de_personnes' => $this->combien_de_personnes,
            'id_users' => $_SESSION['id'],
            'id_planetes' => $this->id_planetes])) {
            $this->id = Db::getDb()->lastInsertId();
            }
            
        } else {
            $query = "UPDATE reservations 
            SET 
            date_de_depart=:date_de_depart, 
            date_arrive=:date_arrive, 
            heure_de_depart=:heure_de_depart, 
            heure_arrive=:heure_arrive,
            planete=:planete,
            combien_de_personnes=:combien_de_personnes,
            id_users=:id_users,
            id_planetes=:id_planetes
            WHERE id=:id";
            $stmt = Db::getDb()->prepare($query);
            $stmt->execute
            (['id' => $this->id,
            'date_de_depart' => $this->date_de_depart, 
            'date_arrive' => $this->date_arrive, 
            'heure_de_depart' => $this->heure_de_depart,
            'heure_arrive' => $this->heure_arrive,
            'planete' => $this->planete,
            'combien_de_personnes' => $this->combien_de_personnes,
            'id_users' => $this->id_users,
            'id_planetes' => $this->id_planetes]);
        }
    }
}




        