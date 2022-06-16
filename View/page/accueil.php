<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="public/css/global.css" />
    <link rel="stylesheet" href="public/css/modal.css" />
    <link rel="stylesheet" href="public/css/slider.css">
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">
    <title>Click event</title>
  </head>
  <body>
    <?php include('View/layout/navigation.php') ?>
    <div class="container mt-4">
      <h2 class="mt-2">Evènements & Campagnes</h2>
      <p>Voter pour vos candidats favoris et permetter leur de gagner !</p>
      <h5 class="partners">Nos Partenaires</h5>
      <div class="brand-carousel section-padding owl-carousel">
        <div class="single-logo">
          <img src="public/image/larcom.jpeg" class="logo-partenaire" alt="">
        </div>
        <div class="single-logo">
          <img src="public/image/mali-emblem.png" class="logo-partenaire" alt="">
        </div>
        <div class="single-logo">
          <img src="public/image/prestige-consulting.jpg" class="logo-partenaire" alt="">
        </div>
        <div class="single-logo">
          <img src="public/image/ortm2.png" class="logo-partenaire" alt="">
        </div>
      </div>
      
      <h5 class="content mt-4">Toutes les campagnes</h5> 
      <div class="row row-cols-1 row-cols-md-4 g-4 mt-2 mb-4">
        <?php
          foreach ($events as $event) {
            $date = date_create($event['expire']);
            $date = date_format($date, 'd/m/Y');
        ?>
        <div class="col">
          <div class="card">
            <?php if($event['image'] == NULL) { ?>
              <img src="public/image/miss-nappy.jpg" class="card-img-top" alt="" id="home-event-img">
            <?php } else { ?>
              <img src="<?= $event['image'] ?>" class="card-img-top" alt="" id="home-event-img">
            <?php } ?>
            <div class="card-body">
              <h5 class="card-title"><?= $event['titre'] ?></h5>
              <p class="card-text"><?= substr($event['description'], 0, 100); ?> <?= (strlen($event['description']) > 100) ? " ..." : "" ?></p>
              <p class="small-text text-danger">Date de fin: <?= $date ?></p>
              <a class="btn btn-danger"
              href="index.php?action=show_event&id=<?= $event['id'] ?>">Détails</a>
            </div>
          </div>
        </div>
        <?php } ?>
      </div>
      
      <h5 class="content mt-4">Vente de ticket</h5> 
      <div class="row row-cols-1 row-cols-md-4 g-4 mt-2 mb-4">
        <?php
          foreach ($tickets as $ticket) {
        ?>
        <div class="col">
          <div class="card">
            <?php if($ticket['image'] == NULL) { ?>
              <img src="public/image/ticket.jpg" class="card-img-top" alt="" id="home-event-img">
            <?php } else { ?>
              <img src="<?= $ticket['image'] ?>" class="card-img-top" alt="" id="home-event-img">
            <?php } ?>
            <div class="card-body">
              <h5 class="card-title"><?= $ticket['title'] ?></h5>
              <p class="small-text text-danger"><?= $ticket['montant'] ?> Fcfa</p>
              <p class="card-text"><?= substr($ticket['overview'], 0, 100); ?> <?= (strlen($ticket['overview']) > 100) ? " ..." : "" ?></p>
              <p class="small-text text-danger"></p>
              <a 
                class="btn btn-danger"
                href="index.php?action=show_ticket&id=<?= $ticket['id'] ?>">Détail</a>
            </div>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>
    <!-- Messages -->
    <?php include('View/layout/message.php') ?>

    <!-- Login Modal -->
    <?php include('View/layout/login.php') ?>

    <!-- Commande Modal -->
    <?php include('View/layout/commande.php') ?>

    <script src="https://cdn.jsdelivr.net/npm/micromodal/dist/micromodal.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="public/js/slider.js"></script>
    <script>
      MicroModal.init();
    </script>
  </body>
</html>
