<?php

$template = "vue/reservation.html";
require "vue/layout.php";

///*******************************************************

// Traitement des données formulaires
if (isset($_POST['reservation'])) {
    $form_reservation = new FormReservation();
    $resultat = $form_reservation->process();
    
    if (empty($resultat)) {
        // ok = formulaire validé = je peux sauver la réservation dans la BDD
        $form_reservation->save();
    } else {
        // erreur, on affiche
        echo $resultat;
        
    }
}


