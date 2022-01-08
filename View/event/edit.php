<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event</title>
</head>
<body>
    <h2>Event::edit</h2>
        <form method="POST" action="index.php?action=update_event&id=<?= $event['id'] ?>">
            <input type="text" name="titre" id="titre" placeholder="titre" value="<?= $event['titre'] ?>"/>
            <input type="text" name="categorie" id="categorie" placeholder="categorie" value="<?= $event['categorie'] ?>"/>
            <textarea type="text" name="description" id="description" placeholder="Description" ><?= $event['description'] ?></textarea>
            <input type="datetime-local" name="expire" id="expire" value="<?= $date ?>"/>
            <input type="file" name="image" id="image"/>
            <input type="file" name="video" id="video"/>
            <input type="submit" value="Modifier"/>
        </form>
</body>
</html>