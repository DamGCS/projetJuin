<?php
// Traitement des données formulaires
if (isset($_POST['login'])) {
    $form_login = new FormLogin();
    $form_login->process();
}

if (isset($_SESSION['id'])) {
    // Redirige vers l'index 
    header("Location: index.php");
    die;
} else {
    // On n'est pas connecté, on affiche le formulaire
    $template = "vue/form_login.html";
    require "vue/layout.php";
}