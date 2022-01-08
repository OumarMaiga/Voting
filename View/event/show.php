<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event</title>
</head>
<body>
    <h2>Event::show</h2>
    <h3><?= $event['titre'] ?></h3>
    <a href="index.php?action=edit_event&id=<?= $event['id'] ?>">Modifier</a>
    <a href="index.php?action=delete_event&id=<?= $event['id'] ?>">Supprimer</a>
</body>
</html>