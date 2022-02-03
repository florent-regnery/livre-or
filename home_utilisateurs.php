<?php
session_start();
$title = 'Accueil utilisateur';
ob_start();
?>
<div class="box">
    <div class="lien">
        <br />
        <a href="https://github.com/florent-regnery/livre-or" class="git">Lien github</a>
    </div>
    <br />
    <a href="/livre-or/profil.php" class="inscription">Editer le profil</a>
    <br />
    <a href="/livre-or/commentaire.php" class="inscription">Laissez un commentaire</a>
</div>

<?php
$content = ob_get_clean();
require_once 'template.php';
?>