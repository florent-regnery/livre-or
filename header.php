<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
 <!-- on verif' si l'utilisateur est connecté dans ce cas on lui affiche des options différentes -->
<?php if (isset($_SESSION['id'])) : ?>
    <p>Vous êtes connecté</p>
    <ul class="menu-link">
        <li><a href="index.php" class="href">Accueil</a></li>
        <li><a href="livre-or.php" class="href">Livre dor</a></li>
        <li><a href="home_utilisateurs.php" class="inscription">Page Utilisateur</a></li>
        <li><a href="deconnexion.php" class="connexion">Déconnexion</a></li>
    </ul>
<?php else : ?>
    <a href="index.php" class="href">Accueil</a>
    <a href="livre-or.php" class="href">Livre d'or</a>
    <a href="inscription.php" class="inscription">Inscription</a>
    <a href="connexion.php" class="connexion">Connexion</a>
<?php endif; ?>