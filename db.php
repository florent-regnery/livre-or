<?php
// connexion à la base de donnée
$pdo = new PDO('mysql:host=localhost;dbname=livreor', 'root', '');
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
