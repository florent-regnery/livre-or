<?php if (isset($_SESSION['id'])) : ?>
    Vous êtes connecté
     <a href="index.php" class="href">Accueil</a>
     <a href="livre-or.php" class="href">Livre dor</a>
     <a href="home_utilisateurs.php" class="inscription">Page Utilisateur</a>
     <a href="deconnexion.php" class="connexion">Déconnexion</a>
<?php else : ?>
    <a href="index.php" class="href">Accueil</a>
    <a href="livre-or.php" class="href">Livre d'or</a>
    <a href="inscription.php" class="inscription">Inscription</a>
    <a href="connexion.php" class="connexion">Connexion</a>
<?php endif; ?>