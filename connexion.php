<?php
session_start();

// l'utilisateur c'est connecté, on sait qu'il a une variable de session
// si on voit dans la session que la clé id existe alors je redirige l'utilsateur vers profil.php
// sinon j'affiche mon formulaire

if (isset($_SESSION['id'])) {
	header('Location: home_utilisateurs.php');
}


$bdd = new PDO('mysql:host=localhost;dbname=livreor', 'root', '');
$bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
if (isset($_POST['connexion'])) {
	$loginconnect = htmlspecialchars($_POST['loginconnect']);
	$passwordconnect = sha1($_POST['passwordconnect']);

	if (!empty($loginconnect) && !empty($passwordconnect)) {
		$requser = $bdd->prepare("SELECT id FROM utilisateurs WHERE login = :login AND password = :password");
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
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Connexion</title>
	<link rel="stylesheet" type="text/css" href="/livre-or/CSS/style.css " />
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap">
</head>

<body>
	<header>
		<br />
		<a href="index.php" div class="inscription">Accueil</a>
	</header>
	<div align="center">
		<h1>Connexion</h1>

		<br />
		<form method="POST" action="" class="form">
			<fieldset class="field">
				<p>
					<input type="login" name="loginconnect" placeholder="Identifiant.." />
				</p>
				<p>
					<input type="password" name="passwordconnect" placeholder="Mot de passe.." />
				</p>
				<p>
					<input class=" bouton " type="submit" name="connexion" value="Se connecter" />
				</p>
			</fieldset>
		</form>
		<?php if (isset($erreur)) : ?>
			<br />
			<font color="red"><?= $erreur ?></font><br />
		<?php endif; ?>
		</br>
		<a href="index.php" class="deconnexion">S'inscrire</a>
	</div>
	<footer>
		<div class="contact">© Copyright 2021 </div>
	</footer>
</body>

</html>