<?php

// détruit le cookie de session côté client (navigateur)
setcookie(session_name(), session_id(), 1); 
// supprime toutes les variables de session côté serveur
$_SESSION = []; 
// détruit la session
session_destroy(); 
// redirige vers l'accueil
header("Location: /projet_starwars/php/index.php"); 
exit();