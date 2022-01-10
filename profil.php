<?php
// On se connecte à la base de donnée et on vérifie la session de l'utilisateur
// Ensuite on créer des variables afin d'executer notre requete
// Vérifier les nouvelles informations envoyé par l'utilisateur afin de modifier ses données
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=livreor', 'root', '');

if (isset($_SESSION['id'])) {
	$requser = $bdd->prepare("SELECT * FROM utilisateurs WHERE id = ?");
	$requser->execute(array($_SESSION['id']));
	$user = $requser->fetch();

	if (isset($_POST['newlogin']) and !empty($_POST['newlogin']) and $_POST['newlogin'] != $user['login']) {
		$newlogin = htmlspecialchars($_POST['newlogin']);
		$insertlogin = $bdd->prepare("UPDATE utilisateurs SET login = ? WHERE id = ?");
		$insertlogin->execute(array($newlogin, $_SESSION['id']));
		header('Location: profil.php?id=' . $_SESSION['id']);
	}

	if (isset($_POST['newpassword']) and !empty($_POST['newpassword'])) {
		$password = htmlspecialchars($_POST['newpassword']);
		$insertpassword = $bdd->prepare("UPDATE utilisateurs SET password = ? WHERE id = ?");
		$insertpassword->execute(array($password, $_SESSION['id']));
		header('Location: profil.php?id=' . $_SESSION['id']);
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edition Profil</title>
	<link rel="stylesheet" type="text/css" href="/livre-or/CSS/style.css" />
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap">
</head>

<body>
	<header>

	</header>
	<div align="center">
		<h1>Edition de mon profil</h1>

		<form method="POST" action="" enctype="multipart/form-data" class="form">
			<fieldset>
				<table class="table">
					<tr>
						<td align="right">
							<label for="login">
								<p><strong> Votre Identifiant : </strong></p>
							</label>
						</td>
						<td>
							<input type="text" name="login" id="login" value="<?php echo $user['login']; ?>" autocomplete="off" />
						</td>
					</tr>
					<tr>
						<td align="right">
							<label for="password">
								<p><strong> Votre Mdp : </strong></p>
							</label>
						</td>
						<td>
							<input type="text" name="password" id="password" value="<?php echo $user['password']; ?>" autocomplete="off" />
						</td>
					</tr>
				</table>
				<p>
					<br />
				<p>
					<input class="bouton" type="submit" name="submit" value="Mettre à jour mon profil !" />
				</p>
			</fieldset>
			<a href="deconnexion.php" class="deconnexion"><br />Se déconnecter</a>
		</form>

		<?php
		if (isset($msg)) {
			echo $msg;
		}
		?>
	</div>
	<footer>
		<div class="contact">© Copyright 2021 </div>
	</footer>
</body>

</html>