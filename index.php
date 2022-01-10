<?php
// Nous vérifions si la session de l'utilisateur existe, afin de le rediriger
session_start();
if (isset($_SESSION['id'])) {
    header('Location: home_utilisateurs.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" type="text/css" href="/livre-or/CSS/style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap">
</head>

<body>
    <header>
        <div>
            <br />
            <a href="/livre-or/livre-or.php" class="livre">
                <h1>Livre d'or</h1>
            </a>
        </div>
    </header>
    <div class="main-box">
        <div class="box">
            <h2><br />Veuillez vous inscrire ! Cliquez sur  <a href="inscription.php" class="inscription">Inscription</a></h2>
            <p> Déja inscirt ? <a href="connexion.php" div class="connexion">Connectez-vous</a></p>
        </div>
        <br />
        <div class="lien">
            <a href="https://github.com/florent-regnery/livre-or" class="git">Lien github</a>
        </div>
    </div>
    <footer>
        <div class="contact">© Copyright 2021 </div>
    </footer>
</body>

</html>