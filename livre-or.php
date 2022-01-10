<?php
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=livreor', 'root', '');
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$query = "SELECT c.commentaire, c.date, u.login  FROM commentaires AS c 
INNER JOIN utilisateurs AS u ON u.id = c.id_utilisateur
ORDER BY c.date DESC";

$statement = $pdo->query($query);
$commentaires = $statement->fetchAll();
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livre Or</title>
    <link rel="stylesheet" type="text/css" href="/livre-or/CSS/style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap">
</head>

<body>
    <ul>
        <?php foreach ($commentaires as $key => $commentaire) : ?>
            <li>
                <p><?= $commentaire['commentaire'] ?></p>
                <p>Publié par <?= $commentaire['login'] ?> le <?= $commentaire['date'] ?></p>
            </li>
        <?php endforeach; ?>
    </ul>
    <?php if(isset($_SESSION['id'])) : ?>
        <a href="/livre-or/commentaire.php" class= "commentaire">Ajouter un Commentaire</a>
    <?php endif; ?>
</body>

</html>