<?php

// Récupérer toutes les informations sur les planètes
$planetes = Planetes::getPlanetes();

$template = "vue/planetes.phtml";
require "vue/layout.php";

// Traitement des données formulaires
if (isset($_POST['reservation'])) {
    $form_reservation = new FormReservation();
    $resultat = $form_reservation->process();

    if (empty($resultat)) {
        // ok = formulaire validé = je peux sauver la réservation dans la BDD
        $form_reservation->save();
        $truc=1;
    } 
    else {
        // erreur, on affiche
        echo $resultat;
    }
    if ($truc === 1){
    header("Location: http://google.com");
    exit();
    }
}


   
