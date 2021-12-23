<?php
// Nous verrifions si l'utilisateur à envoyé son commentaire et remplis le champ
// Si il est remplis et envoyé alors nous nous connectons à la base de donnée et nous procedons à la requete
// Si le commentaire est bien ajouté, afficher la confirmation sinon afficher l'erreur
session_start();
if (isset($_POST['message'])){
    if(empty($_POST['message'])){
        echo "Vous n'avez pas remplis le champ";
        
    } else {
        $commentaire = $_POST['message'];
        $idUtilisateur = $_SESSION['id'];
        $pdo = new PDO('mysql:host=localhost;dbname=livreor', 'root', '');
        $query = "INSERT INTO commentaires (commentaire, id_utilisateur, date) 
        VALUES (:commentaire, :id_utilisateur, NOW())";
        $statement = $pdo->prepare($query);
        $result = $statement->execute([
            'commentaire' => $commentaire,
            'id_utilisateur' => $idUtilisateur
        ]);
        if ($result) {
            echo 'Le commentaire a bien été ajouté';
            header('Location: livre-or.php');

        } else {
            echo 'Une erreur survenue';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livre d'or</title>
    <link rel="stylesheet" type="text/css" href="/CSS/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
</head>

<body>
    <header>

    </header>
    <main>
        <div class="box">

            <h1>Livre d'or</h1>

            <div class="form">
                <form method="POST">
                    <fieldset>
                        <table class = "commentaire">
                            <tr>
                                <td>
                                    <label>Entrez Votre Message..<br /></label>
                                </td>
                                <br />
                                <td>
                                    <textarea name="message" rows="25px" cols="50px"></textarea>
                                </td>
                            </tr>
                        </table>
                        <p>
                            <br />
                            <input class="bouton" type="submit" value="Envoyer" />
                        </p>
                    </fieldset>
                </form>
            </div>
        </div>
        <footer>
        <div class="contact">© Copyright 2021 </div>
        </footer>
    </main>
</body>

</html>