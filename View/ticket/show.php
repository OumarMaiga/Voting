<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Click event | Ticket</title>
</head>
<body>
    <h2>Ticket::show</h2>
    <h3><?= $ticket['overview']." ".$ticket['title'] ?></h3>
    <a href="index.php?action=edit_ticket&id=<?= $ticket['id'] ?>">Modifier</a>
    <a href="index.php?action=delete_ticket&id=<?= $ticket['id'] ?>">Supprimer</a>
        
    <!-- Messages -->
    <?php include('View/layout/message.php') ?>
</body>
</html>