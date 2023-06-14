//Tranformer le bouton connecter en déconnecter

function changerTexteBouton() {
  var estConnecte = true; // ou false si l'utilisateur n'est pas connecté
  var bouton = document.getElementById("connexion");
  if (estConnecte) {
    bouton.innerHTML = "Se déconnecter";
  } else {
    bouton.innerHTML = "Connexion";
  }
}

document.getElementById("connexion").addEventListener("click", changerTexteBouton);
