<?php
// On démarre la session voir si l'utilisateur est connecté
session_start();
// On défini notre titre sachant qu'il est sur la doctype
$title = 'Accueil';
// On utilise la fonction ob_start pour mettre en mémoire la doctype et l'appeler dans nos fichiers.qq
ob_start();
?>

<div class="box">
    <div class="lien">
        <br />
        <a href="https://github.com/florent-regnery/livre-or" class="git">Lien github</a>
    </div>
</div>

<?php
$content = ob_get_clean();
require_once 'template.php';
?>