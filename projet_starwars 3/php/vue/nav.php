<!--Barre de navigation-->
	
	<?php
	
		if (!isset($_SESSION['id'])) {
			// Pas Connecté
	?>
		<nav id="navbarre">
	    	<section id="identite">
	    		<a href="index.php"><h1>Dark Side Destinations</h1></a>
	    		<q>This is where the fun begins !</q>
	    	</section>
	    	<section class="hamburger-menu">
			    <input id="menu__toggle" type="checkbox" />
			    <label class="menu__btn" for="menu__toggle">
			      <span></span>
			    </label>
			    <menu class="menu__box">
			    	<ul class="boxdesktop">
			    		<li class="menu__item"><a href="index.php?action=login">Connexion</a></li>
			    		<hr>
						<li class="menu__item bord1"><a href="index.php">Accueil</a></li>
						<li class="menu__item bord3"><a href="index.php?action=planetes">Réservation</a></li>
						<li class="menu__item bord4"><a href="index.php?action=transports">Transports</a></li>
						<li class="menu__item bord5"><a href="index.php?action=commentaire">Avis</a></li>
					</ul>
			    </menu>
  			</section>
	    </nav>	
	<?php
		}
		if (isset($_SESSION['id'])) {
			// Connecté
			$currentID = $_SESSION['id'];
		    $query = "SELECT prenom FROM users WHERE id=:currentID";
		    $stmt = Db::getDb()->prepare($query);
		    $stmt->execute(['currentID' => $currentID]);
		    $result = $stmt->fetch(PDO::FETCH_ASSOC);
		    $currentUser = implode($result);
	?>

    <nav id="navbarre">
    
	    	<section id="identite">
	    		<a href="index.php"><h1>Dark Side Destinations</h1></a>
	    		<q>This is where the fun begins !</q>
	    	</section>
	    	<section class="hamburger-menu">
			    <input id="menu__toggle" type="checkbox" />
			    <label class="menu__btn" for="menu__toggle">
			      <span></span>
			    </label>
			    <menu class="menu__box">
			    	<ul class="boxdesktop">
			    		<li class="menu__item"><p>Salut, <?php echo $currentUser ?></p></li>
			    		<hr>
						<li class="menu__item bord1"><a href="index.php">Accueil</a></li>
						<li class="menu__item bord2"><a href="index.php?action=moncompte">Mon Compte</a></li>
						<li class="menu__item bord3"><a href="index.php?action=planetes">Réservation</a></li>
						<li class="menu__item bord4"><a href="index.php?action=transports">Transports</a></li>
						<li class="menu__item bord5"><a href="index.php?action=commentaire">Avis</a></li>
						<hr>
						<li class="menu__item"><a href="index.php?action=logout">Déconnexion</a></li>
					</ul>
			    </menu>
  			</section>
	    </nav>	
	<?php
		}
	?>

<script>
	const menuToggle = document.querySelector('#menu__toggle');
	const body = document.querySelector('body');

	menuToggle.addEventListener('click', function() {
	body.classList.toggle('menu-open');
});
</script>