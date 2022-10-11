<?php
  require('helpers/helper.php')
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="public/css/global.css" />
    <link rel="stylesheet" href="public/css/tabs.css" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <!-- ICON -->
    <script type="module" src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule="" src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons/ionicons.js"></script>
    <title>Click event - Admin</title>

    <script
      src="https://kit.fontawesome.com/64d67fd16e.js"
      crossorigin="anonymous"
    ></script>
    <script src="public/js/tabs.js"></script>
  </head>
  <body onload="openSection(event, 'Event')">
    
    <?php include('View/layout/navigation.php') ?>

    <h1 class="page-title">Espace administrateur</h1>

    <!-- Tab links -->
    <div class="tab mt-2">
      <div class="">
        <button class="tablinks" onclick="openSection(event, 'Event')">
          Vente de ticket
        </button>
      </div>
    </div>
  
    <!-- Participants list Tab content -->
    <div id="Event" class="tabcontent">
      <h3 class="header-title">Ticket à vendre</h3>
      <?php
          if (isset($_SESSION['user']) && $_SESSION['user']['categorie'] == 'admin') {
        ?>
        <a href="index.php?action=create_ticket">
          <button class="btn btn-outline-primary add-btn mt-4">
            <i class="fas fa-plus"></i> &nbsp;Ajouter
          </button>
        </a>
        <?php } ?>
      <div class="table-responsive">
        <table class="table table-hover mt-4">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Titre</th>
              <th scope="col">Description</th>
              <th scope="col">Lieu</th>
              <th scope="col">Ticket disponible</th>
              <th scope="col">Commande</th>
              <th scope="col">Montant</th>
              <th scope="col">Date de fin</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
              <?php
              $n = 0;
              foreach ($tickets as $ticket) {
                $ticket_cmd_count = ticket_cmd_count($ticket['id']);
                  $n++;
                  // Formatage de la date
                  if ($ticket['expire'] == NULL) {
                    $date = "";
                  } else {
                    $date = date_create($ticket['expire']);
                    $date = date_format($date, 'd/m/Y');
                  }
                  $today = date('d/m/Y');
                  
                  if($today <= $date) {
                    $etat = true;
                  } else {
                    $etat = false;
                  }
              ?>
                  <tr>
                      <th scope="row"><?= $n ?></th>
                      <td><?= $ticket['title'] ?></td>
                      <td><?= $ticket['overview'] ?></td>
                      <td><?= $ticket['lieu'] ?></td>
                      <td><?= $ticket['count'] ?></td>
                      <td>
                        <a href="index.php?action=index_commande&ticket_id=<?= $ticket['id'] ?>">
                          <?= $ticket_cmd_count ?>
                        </a>
                      </td>
                      <td><?= $ticket['montant'] ?> Fcfa</td>
                      <td><?= $date ?></td>
                      <td class="action-icon-container">
                        <a class="action-icon" href="index.php?action=show_ticket&id=<?= $ticket['id'] ?>">
                          <ion-icon name="eye" style="font-size:24px;color:gray;" title="Voir"></ion-icon>
                        </a>
                        <?php
                          if (isset($_SESSION['user']) && $_SESSION['user']['categorie'] == 'admin') {
                        ?>
                        <a class="action-icon" href="index.php?action=edit_ticket&id=<?= $ticket['id'] ?>">
                          <ion-icon name="create" style="font-size:24px;color:orange;" title="Modifier"></ion-icon>
                        </a>
                        <a class="action-icon" href="index.php?action=delete_ticket&id=<?= $ticket['id'] ?>">
                          <ion-icon name="remove-circle-outline" style="font-size:24px;color:red;" title="Supprimer"></ion-icon>
                        </a>
                        <?php } ?>
                      </td>
                  </tr>
              <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </body>
  
    <script src="https://cdn.jsdelivr.net/npm/micromodal/dist/micromodal.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <!-- BOOTSTRAP JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <script src="public/js/slider.js"></script>
    <script>
      MicroModal.init();
    </script>
</html>
