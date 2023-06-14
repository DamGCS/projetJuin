<?php

// Autoloader
spl_autoload_register(function ($name) {
    $file = "class/".strtolower($name).".php";
    
    if (file_exists($file)) {
        require_once $file;
    }
});

session_start();

$template ="vue/accueil.html";

// Routeur
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    
    if ($action === "accueil") {
        require "controller/home.php";
    }
    if ($action === "login") {
        require "controller/login.php";
    }
    if ($action === "subscribe") {
        require "controller/subscribe.php";
    }
    if ($action === "logout") {
        require "controller/logout.php";
    }
    if ($action === "reservation") {
        require "controller/reservation.php";
    }
    if ($action === "planetes") {
        require "controller/planetes.php";
    }
    if ($action === "transports") {
        require "controller/transports.php";
    }
    if ($action === "commentaire") {
        require "controller/commentaire.php";
    }
    if ($action === "transitionresa") {
        require "controller/transitionresa.php";
    }
    if ($action === "article4mai") {
        require "controller/article4mai.php";
    }
    if ($action === "articleboonta") {
        require "controller/articleboonta.php";
    }
    if ($action === "articlelifeday") {
        require "controller/articlelifeday.php";
    }
    if ($action === "moncompte") {
        require "controller/moncompte.php";
    }
} else {
    // Page par défaut
    require_once "controller/home.php";
}

?>