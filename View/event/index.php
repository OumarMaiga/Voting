<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event</title>
</head>
<body>
    <h2>Event::index</h2>
    <div>
        <a href="index.php?action=create_event">Création</a>
    </div>
    <div>
        <ul>
            <?php 
            foreach ($events as $event) {
            ?>
                <li><a href="index.php?action=show_event&id=<?= $event['id'] ?>"><?= $event['titre'] ?></a></li>
            <?php } ?>
        </ul>
    </div>
</body>
</html>