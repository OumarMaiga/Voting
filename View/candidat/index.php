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
  </head>
  <body onload="openSection(event, 'Event')">
    
    <?php include('View/layout/navigation.php') ?>

    <h1 class="page-title">Espace administrateur</h1>

    <!-- Tab links -->
    <div class="tab mt-2">
      <div class="">
        <button class="tablinks" onclick="openSection(event, 'Event')">
          Participants
        </button>
      </div>
    </div>

    <!-- Participants list Tab content -->
    <div id="Event" class="tabcontent">
      <h3 class="header-title">Campagne : <?= $event['titre'] ?></h3>
      <a href="index.php?action=create_candidat&event_id=<?= $event['id'] ?>">
        <button class="btn btn-outline-primary add-btn mt-4">
          <i class="fas fa-plus"></i> &nbsp;Ajouter un participant
        </button>
      </a>
      <div class="table-responsive">
        <table class="table table-hover mt-4">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Prénom</th>
              <th scope="col">Nom</th>
              <th scope="col">Genre</th>
              <th scope="col">Vote</th>
              <th scope="col">Point</th>
              <!--<th scope="col">Actions</th>-->
            </tr>
          </thead>
          <tbody>
              <?php
              $n = 0;
              foreach ($candidats as $candidat) {
                  $n++;
                  // Utilisation du helper pour recuperer le nombre de vote et point et aussi le genre (homme/femme)
                  $vote_count = vote_count($event['id'], $candidat['id']);
                  $point_count = point_count($event['id'], $candidat['id']);
              ?>
                  <tr>
                      <th scope="row"><?= $n ?></th>
                      <td><?= $candidat['prenom'] ?></td>
                      <td><?= $candidat['nom'] ?></td>
                      <td><?= genre($candidat['genre']) ?></td>
                      <td><?= $vote_count ?></td>
                      <td><?= $point_count == "" ? "0" : $point_count ?></td>
                      <!--<td class="actions">
                      <a class="actions" href="index.php?action=edit_candidat&id=<?= $candidat['id'] ?>">Modifier</a>
                      </td>-->
                  </tr>
              <?php } ?>
          </tbody>
        </table>
      </div>
    </div>

    <script
      src="https://kit.fontawesome.com/64d67fd16e.js"
      crossorigin="anonymous"
    ></script>
    <script src="https://cdn.jsdelivr.net/npm/micromodal/dist/micromodal.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <!-- BOOTSTRAP JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <script src="public/js/slider.js"></script>
    <script src="public/js/tabs.js"></script>
    <script>
      MicroModal.init();
    </script>
  </body>
</html>
