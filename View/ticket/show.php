<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
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
    
    <title>Click event | Ticket</title>
</head>
<body><?php include('View/layout/navigation.php') ?>
  <div class="container mt-4 mb-5">
    <div class="row">
      <div class="col-12">
            <h2 class="title mt-4 mb-4"><?= $ticket['title'] ?></h2>
            <?php if ($ticket['image'] == NULL) {  ?>
                <img src="public/image/ticket.jpg" class="card-img-top rounded" alt="" id="show-event-img"/>
            <?php } else { ?>
            <img src="<?= $ticket['image'] ?>" class="card-img-top rounded" alt="" id="show-event-img"/>
            <?php } ?>        
            
            <div class="mt-4">
                <h4>DESCRIPTION</h4>
                <p><?= $ticket['overview'] ?></p>
                <div class="row mt-4">
                    <div class="col-lg-3 col-md-4 col-sm-6">
                      <h5>DATE DU CONCERT</h5>
                      <p class="text-danger"><?= $day ?></p>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                      <h5>LIEU</h5>
                      <p class="text-danger"><?= $ticket['lieu'] ?></p>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                      <h5>PRIX</h5>
                      <p class="text-danger"><?= $ticket['montant'] ?> Fcfa</p>
                    </div>
                </div>
            </div>

            <h4 class="mt-4">RESERVEZ VOTRE PLACE</h4> 
            <div id="trait"></div>
            <a 
              class="btn btn-danger mt-2"
              href="index.php?action=buy_ticket&id=<?= $ticket['id'] ?>" id="btn-custom">J'ACHETE MON TICKET</a>
      </div>
    </div>
  </div>

    <!-- Messages -->
    <?php include('View/layout/message.php') ?> 

    <!-- Login Modal -->
    <?php include('View/layout/login.php') ?>
    
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