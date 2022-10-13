<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="public/css/global.css" />
    <link rel="stylesheet" href="public/css/tabs.css" />
    <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
    crossorigin="anonymous"/>
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
          Campagnes
        </button>
      </div>
    </div>

    <!-- Events list Tab content -->
    <div id="Event" class="tabcontent">
      <a href="index.php?action=create_event">
        <button class="btn btn-outline-primary add-btn">
          <i class="fas fa-plus"></i> &nbsp;Créer nouvelle campagne
        </button>
      </a>
      <div class="table-responsive">
        <table class="table table-hover mt-4">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Titre</th>
              <th scope="col">Catégorie</th>
              <th scope="col">Expiration</th>
              <th scope="col">Participants</th>
              <th scope="col">Etat</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
              <?php 
              $n = 0;
              foreach ($events as $event) {
                $n++;
                  // Formatage de la date
                  $date = date_create($event['expire']);
                  $date = date_format($date, 'd/m/Y');
                  $today = date('d/m/Y');
                  
                  if($today <= $date) {
                    $etat = true;
                  } else {
                    $etat = false;
                  }
              ?>
                  <tr>
                      <th scope="row"><?= $n ?></th>
                      <td><?= $event['titre'] ?></td>
                      <td><?= $event['categorie'] ?></td>
                      <td><?= $date ?></td>
                      <td class="action-icon-container">
                        <a class="action-icon" href="index.php?action=index_candidat&event_id=<?= $event['id'] ?>">
                          <ion-icon name="eye" style="font-size:24px;color:gray;" title="Voir les participants"></ion-icon>
                        </a>
                      </td>
                      <?php if($etat) { ?>
                        <td><button class="btn btn-success">En cours</button></td>
                      <?php } else {?>
                        <td><button class="btn btn-warning">Terminer</button></td>
                      <?php } ?>
                      <td class="action-icon-container">
                        <a class="action-icon" href="index.php?action=edit_event&id=<?= $event['id'] ?>">
                          <ion-icon name="create" style="font-size:24px;color:orange;" title="Modifier"></ion-icon>
                        </a>
                      </td>
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
