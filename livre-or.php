<?php
session_start();

$title = 'Livre d\'or';
require_once 'db.php';
$query = "SELECT c.commentaire, c.date, u.login  FROM commentaires AS c 
INNER JOIN utilisateurs AS u ON u.id = c.id_utilisateur
ORDER BY c.date DESC";
$statement = $pdo->query($query);
$commentaires = $statement->fetchAll();
?>

<?php ob_start(); ?>
<div align="center">
    <ul>
        <?php foreach ($commentaires as $key => $commentaire) : ?>
            <li>
                <p class="text"><?= $commentaire['commentaire'] ?></p>
                <p class="text">Publié par <?= $commentaire['login'] ?> le <?= $commentaire['date'] ?></p>
            </li>
        <?php endforeach; ?>
    </ul>
    <?php if (isset($_SESSION['id'])) : ?>
        <a href="/livre-or/commentaire.php" class="href">Ajouter un Commentaire</a>
    <?php endif; ?>
</div>
<?php
$content = ob_get_clean();
require_once 'template.php';
?>