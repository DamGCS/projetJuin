<?php

$template = "vue/commentaire.phtml";
require "vue/layout.php";

// Vérification de l'état de connexion de l'utilisateur
if (!isset($_SESSION['user'])) {
    echo "Vous devez être connecté pour laisser un commentaire.";
    exit;
}
// Traitement des données formulaires
if (isset($_POST['commentaire'])) {
    $form_commentaire = new FormCommentaire();
    $form_commentaire->process();
}

