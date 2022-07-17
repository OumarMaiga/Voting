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
      <div class="brand-carousel section-padding owl-carousel" id="carousel-patenaire-container">
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
      
      <h3 class="content mt-4 title" id="campagne">Toutes les campagnes</h3> 
      <div id="trait"></div>
      <div class="row row-cols-1 row-cols-md-4 g-4 mt-2 mb-4">
        <?php
          foreach ($events as $event) {
            $date = date_create($event['expire']);
            $date = date_format($date, 'd/m/Y');
        ?>
        <div class="col-12">
          <div class="card" id="custom-card">
            <div class="row">
              <div class="col-md-3" id="custom-card-item">
              <?php if($event['image'] == NULL) { ?>
                <img src="public/image/miss-nappy.jpg" alt="" id="home-event-img">
              <?php } else { ?>
                <img src="<?= $event['image'] ?>" alt="" id="home-event-img">
              <?php } ?>
                </div>
              <div class="col-md-7" id="custom-card-item">
                <div class="card-body">
                  <h5 class="card-title mb-3"><?= $event['titre'] ?></h5>
                  <p class="card-text"><?= substr($event['description'], 0, 140); ?> <?= (strlen($event['description']) > 140) ? " ..." : "" ?></p>
                </div>
              </div>
              <div class="col-md-2" id="custom-card-item" style="display:flex;justify-content:flex-end;">
                <a class="btn btn-danger"
                href="index.php?action=show_event&id=<?= $event['id'] ?>" id="btn-custom">Voir détails</a>
              </div>
            </div>
          </div>
        </div>
        <?php } ?>
      </div>
      
      <h3 class="content mt-4 title" id="ticket">Vente de ticket</h3> 
      <div id="trait"></div>
      <div class="row row-cols-1 row-cols-md-4 g-4 mt-2 mb-4">
        <?php
          foreach ($tickets as $ticket) {
        ?>
        <div class="col-12">
          <div class="card" id="custom-card">
            <div class="row">
              <div class="col-md-3" id="custom-card-item">
                <?php if($ticket['image'] == NULL) { ?>
                  <img src="public/image/ticket.jpg" alt="" id="home-event-img">
                <?php } else { ?>
                  <img src="<?= $ticket['image'] ?>" alt="" id="home-event-img">
                <?php } ?>
              </div>
              <div class="col-md-7" id="custom-card-item">
                <div class="card-body">
                  <h5 class="card-title mb-3"><?= $ticket['title'] ?></h5>
                  <p class="card-text mb-3"><?= substr($ticket['overview'], 0, 140); ?> <?= (strlen($ticket['overview']) > 140) ? " ..." : "" ?></p>
                  <p class="small-text text-danger" style="font-size:larger;"><?= $ticket['montant'] ?> Fcfa</p>
                </div>
              </div>
              <div class="col-md-2" id="custom-card-item" style="display:flex;justify-content:flex-end;">
                <a 
                  class="btn btn-danger"
                  href="index.php?action=show_ticket&id=<?= $ticket['id'] ?>" id="btn-custom">Voir détails</a>
              </div>
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
    
    <!-- Footer -->
    <?php include('View/layout/footer.php') ?>

    


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
