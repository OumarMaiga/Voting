
<?php
  require('helpers/helper.php');
  $points = point_count($event['id'], $candidat['id']);
?>
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
    <link rel="icon" href="public/image/logo-black.png" type="image/icon type">
    <title>Click event | Paiement</title>
  </head>
  <body>
    <?php include('View/layout/navigation.php') ?>
    <div class="d-flex">
      <div class="col-md-6 paiement-left-container">
        <?php include('View/layout/paiement_left_layout.php') ?>
      </div>
      
      <div class="col-md-6 paiement-right-container">
        <h4 class="text-bold">Detail du paiement</h4>
        <p id="text">Le paiement qui vous vous apprêtez à effectuer n'est pas remboursable</p>
        <div class="mt-6">
          <form
            action="index.php?action=paiement_wizall_confirm"
            method="post"
            enctype="multipart/form-data"
            class="row g-3 mt-4"
          >
          <p>Vous allez recevoir un code de confirmation</p>
            <div class="col-12">
              <label for="code" class="form-label">Code</label>
              <input type="text" class="form-control" name="code" id="code" />
            </div>
            <div class="d-grid gap-2 col-12 mx-auto mt-4">
              <button type="submit" class="btn btn-primary">
                Confirmer
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
        
    <!-- Messages -->
    <?php include('View/layout/message.php') ?>

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
