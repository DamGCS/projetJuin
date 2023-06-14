<?php

class FormReservation {
    private $id;
    private $date_de_depart;
    private $date_arrive;
    private $heure_de_depart;
    private $heure_arrive;
    private $planete;
    private $combien_de_personnes;
    private $start_date;
    private $end_date;
    
    //Déclaration des clés étrangères de la table réservation
    private $id_users;
    private $id_planetes;
    
    //Contructeur
    public function __construct() {
        $this->date_de_depart = $this->sanitize('date_de_depart');
        $this->date_arrive = $this->sanitize('date_arrive');
        $this->heure_de_depart = $this->sanitize('heure_de_depart');
        $this->heure_arrive = $this->sanitize('heure_arrive');
        $this->planete = $this->sanitize('planete');
        $this->combien_de_personnes = $this->sanitize('combien_de_personnes');
        $this->id_users = $this->sanitize('id_users');
        $this->id_planetes = $this->sanitize('id_planetes');
        $this->id_commentaire_avis = NULL;
        $this->start_date = new DateTime($this->date_de_depart." ".$this->heure_de_depart);
        $this->end_date = new DateTime($this->date_arrive);
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
    // Vérifie si la date de début est antérieure à la date de fin
        if ($this->start_date >= $this->end_date) {
            return "La date de début doit être antérieure à la date de fin.";
    }

    // Vérifie si la date de début est antérieure à aujourd'hui
    $today = new DateTime('today');
        if ($this->start_date < $today) {
            return "La date de début doit être supérieure ou égale à aujourd'hui.";
    }

    // Vérifie si la réservation est pour une durée supérieure à 30 jours
    $reservation_duration = $this->end_date->diff($this->start_date)->days;
        if ($reservation_duration > 30) {
            return "La réservation ne peut pas dépasser 30 jours.";
    }

    // Si toutes les vérifications sont passées, retourne une chaîne vide pour indiquer que la réservation est valide
    return "";
  }
  
  public function save() {
      //créer une nouvelle reservation
        $reservation = new Reservation();
        $reservation->date_de_depart = $this->date_de_depart;
        $reservation->date_arrive = $this->date_arrive;
        $reservation->heure_de_depart = $this->heure_de_depart;
        $reservation->heure_arrive = $this->heure_arrive;
        $reservation->planete = $this->planete; 
        $reservation->combien_de_personnes = $this->combien_de_personnes;
        $reservation->start_date = $this->start_date;
        $reservation->end_date = $this->end_date;
        
        $reservation->id_users = $_SESSION['id'];
        $reservation->id_planetes = $this->id_planetes;
        //sauvegarde la nouvelle reservation dans la BDD
        $reservation->save();
        echo "La réservation a été enregistrée avec succès.";
  }

}
