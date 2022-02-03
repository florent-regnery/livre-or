<?php
session_start();

// On se connecte à la base de donnée et on vérifie la session de l'utilisateur
// Ensuite on créer des variables afin d'executer notre requete
// Vérifier les nouvelles informations envoyé par l'utilisateur afin de modifier ses données
$title = "Profil";

require_once 'db.php';

if (isset($_SESSION['id'])) {
	$requser = $pdo->prepare("SELECT * FROM utilisateurs WHERE id = ?");
	$requser->execute(array($_SESSION['id']));
	$user = $requser->fetch();

	if (isset($_POST['newlogin']) && !empty($_POST['newlogin']) && $_POST['newlogin'] != $user['login']) {
		$newlogin = htmlspecialchars($_POST['newlogin']);
		$insertlogin = $pdo->prepare("UPDATE utilisateurs SET login = ? WHERE id = ?");
		$insertlogin->execute(array($newlogin, $_SESSION['id']));
		header('Location: profil.php?id=' . $_SESSION['id']);
	}
	if (isset($_POST['newpassword1']) && !empty($_POST['newpassword1']) && isset($_POST['newpassword2']) && !empty($_POST['newpassword2'])) {
		$password1 = sha1($_POST['newpassword1']);
		$password2 = sha1($_POST['newpassword2']);
		if ($password1 == $password2) {
			$insertpassword = $pdo->prepare("UPDATE utilisateurs SET password = ? WHERE id = ?");
			$insertpassword->execute(array($password1, $_SESSION['id']));
			header('Location: profil.php?id=' . $_SESSION['id']);
		} else {
			$msg = "Vos mots de passes ne correspondent pas !";
		}
	}
}
ob_start();
?>
<div align="center">
	<div align="center">
		<br />
		<h1>Profil de <?= @$user['login']; ?></h1>
		<form method="POST" action="" enctype="multipart/form-data" class="form">
			<fieldset class="field">
				<br />
				<input type="text" name="newlogin" placeholder="login" value="<?php echo @$user['login'] ?>" /><br />
				<br />
				<input type="password" name="newpassword1" placeholder="password" /><br />
				<br />
				<input type="password" name="newpassword2" placeholder="confirm password" /><br />
				<br />
				<input class="bouton" type="submit" name="submit" value="Mettre à jour mon profil !" />
			</fieldset>
		</form>
	</div>

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
<?php
$content = ob_get_clean();
require_once 'template.php';
?>