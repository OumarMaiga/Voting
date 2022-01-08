<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
</head>
<body>
    <h2>Accueil</h2>
    <p>
        <?php
            if(isset($_SESSION['user'])) {
        ?>
            <a href="index.php?action=logout">Deconnexion</a>
        <?php
            } else {
        ?>
            <a href="index.php?action=login">Login</a>
        <?php } ?>
    </p>
    <ul>
        <li>
            <a href="index.php?action=index_event">Event</a>
        </li>
        <li>
            <a href="index.php?action=index_candidat">Candidat</a>
        </li>
    </ul>
</body>
</html>