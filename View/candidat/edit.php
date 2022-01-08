<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Candidat</title>
</head>
<body>
    <h2>Candidat::edit</h2>
        <form method="POST" action="index.php?action=update_candidat&id=<?= $candidat['id'] ?>">
            <input type="text" name="prenom" id="prenom" placeholder="prenom"value="<?= $candidat['prenom'] ?>" />
            <input type="text" name="nom" id="nom" placeholder="nom"value="<?= $candidat['nom'] ?>" />
            <input type="date" name="date_naissance" id="date_naissance"value="<?= $date ?>" />
            <select name="genre">
                <option value="">-- Genre --</option>
                <option value="h">Homme</option>
                <option value="f">Femme</option>
            </select>
            <input type="file" name="image" id="image" value="<?= $candidat['image'] ?>"/>
            <select name="event_id">
                <option value="">-- Events --</option>
                <?php
                foreach($events as $event) {
                ?>
                    <option value="<?= $event['id']?>"><?= $event['titre']?></option>
                <?php } ?>
            </select>
            <input type="submit" value="Modifier"/>
        </form>
</body>
</html>