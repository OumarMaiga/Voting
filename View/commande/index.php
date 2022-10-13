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
    <link rel="icon" href="public/image/logo-black.png" type="image/icon type">
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
    <div id="Event" class="tabcontent" >
      <h3 class="header-title" style="padding:0 2rem;">
        <?= $ticket['title'] ?>
        <span style="float:right">
          <input type="text" name="query" placeholder="Recherche" id="query" />
          <input type="hidden" name="ticket_id" id="ticket_id" value="<?= $_GET['ticket_id'] ?>" />
        </span>
      </h3>
      <br/>
      <br/>
      <div class="table-responsive">
        <table class="table table-hover mt-4" style="padding:0 2rem;">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Prénom</th>
              <th scope="col">Nom</th>
              <th scope="col">Code</th>
              <th scope="col">Email</th>
              <th scope="col">Telephone</th>
              <th scope="col">Nombre</th>
              <th scope="col">Etat</th>
              <th scope="col">Payer</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody id="search-tbody">
              <?php
              $n = 0;
              foreach ($commandes as $commande) {
                  $n++;
              ?>
                  <tr>
                      <th scope="row"><?= $n ?></th>
                      <td><?= $commande['prenom'] ?></td>
                      <td><?= $commande['nom'] ?></td>
                      <td><?= $commande['code'] ?></td>
                      <td><?= $commande['email'] ?></td>
                      <td><?= $commande['phone'] ?></td>
                      <td><?= $commande['count'] ?></td>
                      <td>
                        <?php
                            if($commande['etat'] == "precommande") {
                                echo "<b style=color:green>Pré-commande</b>";
                            } elseif($commande['etat'] == "commande") {
                                echo "<b style=color:green>commande</b>";
                            } elseif($commande['etat'] == "used") {
                                echo "<b style=color:red>Utilisé</b>";
                            }
                        ?>  
                      </td>
                      <td>
                        <?php
                            if($commande['paid'] == 1) {
                                echo "<b style=color:green>Oui</b>";
                            } else {
                                echo "<b style=color:red>Non</b>";
                            }
                        ?>  
                        </td>
                      <td>
                        <?php
                            if($commande['used'] != 1) {
                          ?>
                            <a href='index.php?action=consommer_commande&id=<?= $commande['id'] ?>' onclick="return confirm('Voulez-vous valider la consommation du ticket ?')"><button type='submit' class='btn btn-success'>Valider</button></a>
                          <?php } else { ?>
                              <a href='#'><button type='submit' class='btn btn-secondary' disabled>Comsommer</button></a>
                          <?php } ?>
                        </td>
                  </tr>
              <?php } ?>
          </tbody>
        </table>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/micromodal/dist/micromodal.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <!-- BOOTSTRAP JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <script src="public/js/slider.js"></script>
    <script src="public/js/tabs.js"></script>
    <script src="public/js/search.js"></script>
    <script>
      MicroModal.init();
    </script>
  </body>
</html>
