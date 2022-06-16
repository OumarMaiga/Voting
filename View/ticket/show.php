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
    <div class="row">
      <div class="col-md-6">
        <div class="paiement-left-container">
            
            <h4 class="text-lighter"><?= $ticket['title'] ?></h4>
            <?php if ($ticket['image'] == NULL) {  ?>
                <img src="public/image/ticket.jpg" class="card-img-top rounded" alt="" id="paiement-event-img"/>
            <?php } else { ?>
            <img src="<?= $ticket['image'] ?>" class="card-img-top rounded" alt="" id="paiement-event-img"/>
            <?php } ?>        
            
            <div class="mt-4">
                <p class="small-text">Lieu: <span class="text-danger"><?= $ticket['lieu'] ?> Fcfa</span></p>
                <p class="small-text">Prix: <span class="text-danger"><?= $ticket['montant'] ?> Fcfa</span></p>
                <p class="mt-4" id="text">
                    <?= $ticket['overview'] ?>
                </p>
            </div>

        </div>      
      </div>
      
      <div class="col-md-6">
        <div class="paiement-right-container">
          <h4 class="text-bold">Acheter votre ticket ici !</h4>
          <p id="text">Le paiement qui vous vous apprêtez à effectuer n'est pas remboursable</p>
          <div class="mt-6">
            <form
              action="index.php?action=save_commande&ticket_id=<?= $ticket['id'] ?>"
              method="post"
              class="row g-3 mt-4"
            >
              <div class="row col-12">
                <div class="col-md-6">
                    <label for="nom" class="form-label">Nom</label>
                    <input type="text" class="form-control" name="nom" id="nom" />
                </div>
                <div class="col-md-6">
                    <label for="prenom" class="form-label">Prénom</label>
                    <input type="text" class="form-control" name="prenom" id="prenom" />
                </div>
              </div>
              <div class="row col-12">
                <div class="col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input
                    type="text"
                    class="form-control"
                    name="email"
                    id="email"
                    />
                </div>
                <div class="col-md-6">
                    <label for="phone" class="form-label">Telephone</label>
                    <input type="text" class="form-control" name="phone" id="phone" />
                </div>
              </div>
              <div class="row col-12">
                <label for="count" class="form-label">Nombre de ticket</label>
                <input type="number" min="1" max="100" class="form-control" name="count" id="count" value="1"/>
              </div>
              <div class="d-grid gap-2 row col-12 mx-auto mt-4">
                <button type="submit" class="btn btn-primary">
                  Achetez
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Messages -->
    <?php include('View/layout/message.php') ?>
</body>
</html>