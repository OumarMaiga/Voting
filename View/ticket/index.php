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
      <a href="index.php?action=create_ticket">
        <button class="btn btn-outline-primary add-btn mt-4">
          <i class="fas fa-plus"></i> &nbsp;Ajouter
        </button>
      </a>
      <table class="table table-hover mt-4">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Titre</th>
            <th scope="col">Description</th>
            <th scope="col">Lieu</th>
            <th scope="col">Nombre</th>
            <th scope="col">Montant</th>
            <th scope="col">Date de fin</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
            <?php
            $n = 0;
            foreach ($tickets as $ticket) {
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
                    <td><?= $ticket['montant'] ?> Fcfa</td>
                    <td><?= $date ?></td>
                    <td class="actions">
                      <a class="actions" href="index.php?action=create_commande&ticket_id=<?= $ticket['id'] ?>">Acheter</a>
                      <a class="actions" href="index.php?action=edit_ticket&id=<?= $ticket['id'] ?>">Modifier</a>
                      <a class="actions" href="index.php?action=delete_ticket&id=<?= $ticket['id'] ?>">Supprimer</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
      </table>
    </div>
  </body>
</html>
