<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Candidat</title>
</head>
<body>
    <h2>Candidat::index</h2>
    <div>
        <a href="index.php?action=create_candidat">Création</a>
    </div>
    <div>
        <ul>
            <?php 
            foreach ($candidats as $candidat) {
            ?>
                <li><a href="index.php?action=show_candidat&id=<?= $candidat['id'] ?>"><?= $candidat['prenom']." ".$candidat['nom'] ?></a></li>
            <?php } ?>
        </ul>
    </div>
</body>
</html>