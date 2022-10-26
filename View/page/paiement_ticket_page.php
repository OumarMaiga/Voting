
<?php
  require('helpers/helper.php');
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
    <div class="row">      
      <div class="col-md-12">
        <div class="paiement-right-container">
          <h4 class="text-bold">Detail du paiement</h4>
          <p id="text">Le paiement qui vous vous apprêtez à effectuer n'est pas remboursable</p>
          <div class="mt-6">
            <form
              action="index.php?action=paiement_ticket"
              method="post"
              class="row g-3 mt-4"
              id="paiement-form"
            >
              <div class="col-12">
                <!--<input id="montant" class="form-control" type="text" name="montant" value="<?= $_SESSION['commande']['ticket_montant'] ?>" readonly />-->
                <input id="montant" class="form-control" type="text" name="montant" value="100" readonly />
                <input id="commande_id" class="form-control" type="hidden" name="commande_id" value="<?= $_SESSION['commande']['commande_id'] ?>" readonly />
                <input id="code" class="form-control" type="hidden" name="code" value="<?= $_SESSION['commande']['code'] ?>" readonly />
                <input id="ticket_id" class="form-control" type="hidden" name="ticket_id" value="<?= $_SESSION['commande']['ticket_id'] ?>" readonly />
                <input id="customer_name" class="form-control" type="hidden" name="customer_name" value="" readonly />
                <input id="customer_surname" class="form-control" type="hidden" name="customer_surname" value="" readonly />
                <input id="customer_email" class="form-control" type="hidden" name="customer_email" value="" readonly />
                <input id="customer_phone_number" class="form-control" type="hidden" name="customer_phone_number" value="" readonly />
                <input id="customer_address" class="form-control" type="hidden" name="customer_address" value="" readonly />
                <input id="customer_city" class="form-control" type="hidden" name="customer_city" value="" readonly />
                <input id="customer_country" class="form-control" type="hidden" name="customer_country" value="" readonly />
                <input id="customer_state" class="form-control" type="hidden" name="customer_state" value="" readonly />
                <input id="customer_zip_code" class="form-control" type="hidden" name="customer_zip_code" value="" readonly />
              </div>
              <div class="d-grid gap-2 col-12 mx-auto mt-4">
                <button type="submit" class="btn btn-primary">
                  Payer <?= $_SESSION['commande']['ticket_montant'] ?> FCFA
                </button>
              </div>
            </form>
          </div>
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
    <!-- CinetPay -->
    <script src="https://cdn.cinetpay.com/seamless/main.js"></script>
    <script src="public/js/slider.js"></script>
    <script src="public/js/cinetPay.js"></script>
    <script>
      MicroModal.init();
    </script>
  </body>
</html>
