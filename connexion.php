<?php
session_start();
// On démarre la session voir si l'utilisateur est connecté
// si on voit dans la session que la clé id existe alors je redirige l'utilsateur vers home.php
// sinon j'affiche mon formulaire.
$title = 'Connexion';

if (isset($_POST['connexion'])) {
	$loginconnect = htmlspecialchars($_POST['loginconnect']);
	$passwordconnect = sha1($_POST['passwordconnect']);

	if (!empty($loginconnect) && !empty($passwordconnect)) {
		require_once 'db.php';
		$requser = $pdo->prepare("SELECT id FROM utilisateurs WHERE login = :login AND password = :password");
		$requser->execute([
			'password' => $passwordconnect,
			'login' => $loginconnect,
		]);
		$userexist = $requser->rowCount();
		if ($userexist === 1) {
			$userinfo = $requser->fetch();
			$_SESSION['id'] = $userinfo['id'];
			header('Location: home_utilisateurs.php');
		} else {
			$erreur = "Mauvais identifiant ou mot de passe !";
		}
	} else {
		$erreur = "Tous les champs doivent être complétés !";
	}
}
ob_start();
?>

<div align="center">
	<br />
	<h1>Connexion</h1>
	<br />
	<form method="POST" action="" class="form">
		<fieldset class="field">
			<input type="login" name="loginconnect" placeholder="Identifiant.." />
			<br /><br />
			<input type="password" name="passwordconnect" placeholder="Mot de passe.." />
			<br /><br />
			<input class=" bouton " type="submit" name="connexion" value="Se connecter" />
			<p><br />Vous n'avez pas de compte ? <a href="inscription.php">Inscrivez-vous</a>
		</fieldset>
	</form>
	<?php if (isset($erreur)) : ?>
		<br />
		<font color="red"><?= $erreur ?></font><br />
	<?php endif; ?>
	</br>
</div>

<?php
$content = ob_get_clean();
require_once 'template.php';
?>