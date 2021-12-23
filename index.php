<?php
// Nous vérifions si la session de l'utilisateur existe, afin de le rediriger
session_start();
if(isset($_SESSION['id'])){
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
    <link rel="stylesheet" type="text/css" href="/CSS/style.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap">
</head>
    <body>
        <header>
            <div>
                <br/>
                <a href="inscription.php" class="inscription">Inscription</a>
            </div>
        </header>
        <main>
            <div class="main-box">
                <div class= "box">
                    <h2><br/>Veuillez vous inscrire ! Cliquez sur Inscription</h2>
                    <p> Déja inscirt ? connectez-vous </p>
                </div>
                <br/>
                <div class="lien">
                    <a href="connexion.php"div class="connexion">Connexion</a>
                    <a href="https://github.com/florent-regnery/livre-or" class="git"><br/>Lien github</a>
                </div>
            </div>    
            <footer>
            <div class="contact">© Copyright 2021 </div>   
            </footer>
        </main>
    </body>
</html>