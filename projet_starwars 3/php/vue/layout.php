<!--Defini l'apparence du site-->
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Dark Side Destinations</title>
    <link rel="stylesheet" href="https://damienguichous.sites.3wa.io/projet_starwars/css/starwars2.css" type="text/css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bruno+Ace+SC"/>
</head>
    <body id="homewall1">
        <?php
        if (isset($_GET['action'])) {
        $action = $_GET['action'];
        
        if ($action !== 'transitionresa'){
                require_once 'vue/nav.php';
        }
        }
        else if (!isset($_GET['action'])){
            require_once 'vue/nav.php';
        }
        require_once $template; 
        if (isset($_GET['action'])) {
        $action = $_GET['action'];
        
        if ($action !== 'transitionresa'){
                require_once 'vue/footer.html';
        }
        }
        else if (!isset($_GET['action'])){
            require_once "vue/footer.html" ;
        }
        ?>
    </body>
</html>