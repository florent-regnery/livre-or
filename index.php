<?php
session_start();
$title = 'Accueil';
ob_start();
?>

<div class="main-box">
    <div class="lien">
        <br />
        <a href="https://github.com/florent-regnery/livre-or" class="git">Lien github</a>
    </div>
</div>

<?php
$content = ob_get_clean();
require_once 'template.php';
?>