<!-- Nous vérifions si la session de l'utilisateur existe, afin de le rediriger -->
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" type="text/css" href="/livre-or/CSS/style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap">
</head>
<body>
    <header>
        <?php include 'header.php' ?>
    </header>
    <?= $content ?>
    <footer>
        <div class="contact">© Copyright 2021 </div>
    </footer>
</body>

</html>