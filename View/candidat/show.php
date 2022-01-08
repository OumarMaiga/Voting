<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Candidat</title>
</head>
<body>
    <h2>Candidat::show</h2>
    <h3><?= $candidat['prenom']." ".$candidat['nom'] ?></h3>
    <a href="index.php?action=edit_candidat&id=<?= $candidat['id'] ?>">Modifier</a>
    <a href="index.php?action=delete_candidat&id=<?= $candidat['id'] ?>">Supprimer</a>
</body>
</html>