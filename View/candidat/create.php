<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Candidat</title>
</head>
<body>
    <h2>Candidat::create</h2>
        <form method="POST" action="index.php?action=save_candidat">
            <input type="text" name="prenom" id="prenom" placeholder="prenom" />
            <input type="text" name="nom" id="nom" placeholder="nom" />
            <input type="date" name="date_naissance" id="date_naissance"/>
            <select name="genre">
                <option value="">-- Genre --</option>
                <option value="h">Homme</option>
                <option value="f">Femme</option>
            </select>
            <input type="file" name="image" id="image"/>
            <select name="event_id">
                <option value="">-- Events --</option>
                <?php
                foreach($events as $event) {
                ?>
                    <option value="<?= $event['id']?>"><?= $event['titre']?></option>
                <?php } ?>
            </select>
            <input type="submit" value="Créer"/>
        </form>
</body>
</html>