<?php
// Nous verrifions si l'utilisateur à envoyé son commentaire et remplis le champ
// Si il est remplis et envoyé alors nous nous connectons à la base de donnée et nous procedons à la requete
// Si le commentaire est bien ajouté, afficher la confirmation sinon afficher l'erreur
$title = 'Commentaires';

if (isset($_POST['message'])) {
    if (empty($_POST['message'])) {
        echo "Vous n'avez pas remplis le champ";
    } else {
        $commentaire = $_POST['message'];
        $idUtilisateur = $_SESSION['id'];
        require_once 'db.php';
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
ob_start();
?>
<div class="box">
    <h1>Livre d'or</h1>
    <div class="form">
        <form method="POST">
            <fieldset>
                <table class="commentaire">
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
<?php
$content = ob_get_clean();
require_once 'template.php';
?>