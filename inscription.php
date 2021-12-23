<?php
// Si l'utilistauer est inscrit dans la base de donnée le rediriger vers la page home
session_start();
if (isset($_SESSION['id'])) {
    header('Location: home_utilisateurs.php');
}

// On se connecte à la base de donnée et on vérifie les informations de l'utilisateur
$bdd = new PDO('mysql:host=localhost;dbname=livreor', 'root', '');

if (isset($_POST['submit'])) {

    $login = htmlspecialchars($_POST['login']);
    $password = htmlspecialchars($_POST['password']);
    $password2 = htmlspecialchars($_POST['password2']);

    if (!empty($_POST['login'])  and !empty($_POST['password']) and !empty($_POST['password2'])) {


        // on vérifie si la taille de la string est inférieur à 255 charactères
        $loginlength = strlen($login);

        if ($loginlength <= 255) {


            // vérifier si l'identifiant existe déjà.
            $reqlogin = $bdd->prepare("SELECT * FROM utilisateurs WHERE login = ? ");
            $reqlogin->execute(array($login));
            $loginexist = $reqlogin->rowCount();

            if ($loginexist == 0) {

                if ($password == $password2) {

                    // inserrer les infos dans la base de données et redirection de la page.
                    $insertuser = $bdd->prepare("INSERT INTO utilisateurs(login, password) VALUES(?,?)");
                    $insertuser->execute(array($login, $password));
                    header('Location: connexion.php');
                } else {
                    $erreur = "Vos mots de passes ne correspondent pas !";
                }
            } else {
                $erreur = "Identifiant déjà utilisé";
            }
        } else {
            $erreur = "Votre identifiant est trop long";
        }
    } else {
        $erreur = "Tous les champs ne sont pas renseignés";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire</title>
    <link rel="stylesheet" type="text/css" href="/CSS/style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap">
</head>

<body>
    <header>
        </br>
        <a href="index.php" class="accueil">Accueil</a>
    </header>
    <div align="center">
        <h1>Inscription</h1>
        </br>
        <form method="POST" action="" class="form">
            <fieldset>
                <table class="table">
                    <tr>
                        <td align="right">
                            <label for="login">
                                <p><strong> Entrez votre Identifiant : </strong></p>
                            </label>

                        </td>
                        <td>
                            <input type="text" name="login" id="login" placeholder="Identifiant.." autocomplete="off" />
                        </td>
                    </tr>

                    <tr>
                        <td align="right">
                            <label for="password">
                                <p><strong> Entrez votre Mdp : </strong></p>
                            </label>
                        </td>
                        <td>
                            <input type="password" name="password" id="password" placeholder=" Mot de passe.." autocomplete="off" />
                        </td>
                    </tr>

                    <tr>
                        <td align="right">
                            <label for="password2">
                                <p><strong> Confirmez votre Mdp :</strong></p>
                            </label>
                        </td>
                        <td>
                            <input type="password" placeholder="Confirmez Mdp.." id="password2" name="password2" />
                        </td>
                    </tr>

                </table>
                <p>
                    <br />
                    <input class="bouton" type="submit" name="submit" value="S'inscrire" />
                </p>
            </fieldset>
        </form>
        <?php
        if (isset($erreur)) {
            echo '<br/><font color="red">' . $erreur . "</font>";
        }
        ?>
    </div>

    <footer>
        <div class="contact">© Copyright 2021 </div>
    </footer>
</body>

</html>