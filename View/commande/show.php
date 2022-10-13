<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="public/image/logo-black.png" type="image/icon type">
    <title>Click event | Ticket</title>
</head>
<body>
    <h2>Ticket::show</h2>
    <h3><?= $ticket['overview']." ".$ticket['title'] ?></h3>
    <a href="index.php?action=edit_ticket&id=<?= $ticket['id'] ?>">Modifier</a>
    <a href="index.php?action=delete_ticket&id=<?= $ticket['id'] ?>">Supprimer</a>
        
    <!-- Messages -->
    <?php include('View/layout/message.php') ?>
    <script src="https://cdn.jsdelivr.net/npm/micromodal/dist/micromodal.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <!-- BOOTSTRAP JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <script src="public/js/slider.js"></script>
    <script>
      MicroModal.init();
    </script>
</body>
</html>