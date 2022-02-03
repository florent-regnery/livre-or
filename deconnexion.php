<?php
// deconnexion de la session
session_start();
$_SESSION = array();
session_destroy();
header("Location: connexion.php");
