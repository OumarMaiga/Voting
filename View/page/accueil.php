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
    <title>Online Voting</title>
  </head>
  <body>
    <?php include('View/layout/navigation.php') ?>
    <div class="container mt-4">
      <h2>Evènements & Campagnes</h3>
      <p>Voter pour vos candidats favoris et permetter leur de gagner !</p>
      <h5 class="partners">Nos Partenaires</h5>
      <div class="brand-carousel section-padding owl-carousel">
        <div class="single-logo">
          <img src="https://i.postimg.cc/QxPJ8hXy/brand-1.png" alt="">
        </div>
      <div class="single-logo">
          <img src="https://i.postimg.cc/pdMQjC5Q/brand-2.png" alt="">
        </div>
      <div class="single-logo">
          <img src="https://i.postimg.cc/B6qxYvgX/brand-3.png" alt="">
        </div>
      <div class="single-logo">
          <img src="https://i.postimg.cc/d14GzKHn/brand-4.png" alt="">
        </div>
      <div class="single-logo">
          <img src="https://i.postimg.cc/x8ZM13Sz/brand-5.png" alt="">
        </div>
      <div class="single-logo">
          <img src="https://i.postimg.cc/B6qxYvgX/brand-3.png" alt="">
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
    </div>

    <!-- Login Modal -->
    <?php include('View/layout/login.php') ?>

    <script src="https://cdn.jsdelivr.net/npm/micromodal/dist/micromodal.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="public/js/slider.js"></script>
    <script>
      MicroModal.init();
    </script>
  </body>
</html>
