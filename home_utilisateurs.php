<?php
session_start();

if (!isset($_SESSION['id'])) {
    header('Location: index.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="/livre-or/CSS/style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap">
</head>

<header></header>
<body>
    <a href="/livre-or/livre-or.php" class="inscription">Editer le profil</a>
    <a href="/livre-or/commentaire.php" class="inscription">Laissez un commentaire</a>
    <a href="/livre-or/deconnexion.php" class="deco">Deconnexion</a>

</body>
<footer></footer>
</html>