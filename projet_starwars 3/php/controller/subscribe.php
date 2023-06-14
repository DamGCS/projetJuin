<?php

// Traitement des données formulaires
if (isset($_POST['subscribe'])) {
    $form_subscribe = new FormSubscribe();
    $form_subscribe->process();
}

    // On n'est pas connecté, on affiche le formulaire
    $template = "vue/form_subscribe.html";
    require "vue/layout.php";
?>