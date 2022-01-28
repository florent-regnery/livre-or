<?php
$title = 'Inscription';

// Si l'utilistauer est inscrit dans la base de donnée le rediriger vers la page home

if (isset($_SESSION['id'])) {
    header('Location: home_utilisateurs.php');
}

// On se connecte à la base de donnée et on vérifie les informations de l'utilisateur

if (isset($_POST['submit'])) {
    $login = htmlspecialchars($_POST['login']);
    $password = sha1($_POST['password']);
    $password2 = sha1($_POST['password2']);
    if (!empty($_POST['login'])  && !empty($_POST['password']) && !empty($_POST['password2'])) {
        // on vérifie si la taille de la string est inférieur à 255 charactères
        $loginlength = strlen($login);
        if ($loginlength <= 255) {
            // vérifier si l'identifiant existe déjà.
            require_once 'db.php';
            $reqlogin = $pdo->prepare("SELECT * FROM utilisateurs WHERE login = :login ");
            $reqlogin->execute(['login' => $login]);
            $loginexist = $reqlogin->rowCount();
            if ($loginexist == 0) {
                if ($password == $password2) {
                    // inserrer les infos dans la base de données et redirection de la page.
                    $insertuser = $pdo->prepare("INSERT INTO utilisateurs(login, password) VALUES(?,?)");
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
ob_start();
?>
<div align="center">
    <br />
    <h1>Inscription</h1><br />
    <form class="form" name="inscription" method="POST" action="" align="center">
        <fieldset>
            Login<br>
            <input type="text" name="login" value="" autocomplete="off" required><br>
            Mot de passe<br>
            <input type="password" name="password" value="" autocomplete="off" required><br>
            Confirmation de mot de passe<br>
            <input type="password" name="password2" value="" autocomplete="off" required><br>
            <br /><br />
            <input class="bouton" type="submit" name="submit" value="S'inscrire">
        </fieldset>
    </form>

    <?php
    if (isset($erreur)) {
        echo '<br/><font color="red">' . $erreur . "</font>";
    }
    ?>
</div>

<?php
$content = ob_get_clean();
require_once 'template.php';
?>