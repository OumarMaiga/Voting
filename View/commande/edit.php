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
          Editer infos participant
        </button>
      </div>
    </div>

    <!-- Candidat Tab content -->
    <div id="Event" class="tabcontent">
      <div class="container">
        <h2 class="header-title"><?= $ticket['titre'] ?></h2>
        <h4 class="header-title">Ajouter un commande</h4>
        <form
          action="index.php?action=update_commande&id=<?= $commande['id'] ?>&ticket_id=<?= $ticket['id'] ?>"
          method="post"
          enctype="multipart/form-data"
          class="row g-3 mt-4"
        >
          <div class="col-md-4">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control" name="nom" id="nom" value="<?= $commande['nom'] ?>" />
          </div>
          <div class="col-md-4">
            <label for="prenom" class="form-label">Prénom</label>
            <input type="text" class="form-control" name="prenom" id="prenom" value="<?= $commande['prenom'] ?>" />
          </div>
          <div class="col-md-4">
            <label for="email" class="form-label">Email</label>
            <input
              type="date"
              class="form-control"
              name="date_naissance"
              id="email"
              value="<?= $commande['prenom'] ?>"
            />
          </div>
          <div class="col-md-4">
            <label for="phone" class="form-label">Telephone</label>
            <input type="text" class="form-control" name="phone" id="phone" value="<?= $commande['prenom'] ?>" />
          </div>
          <div class="col-md-4">
            <label for="count" class="form-label">Nombre de ticket</label>
            <input type="text" class="form-control" name="count" id="count" value="<?= $commande['prenom'] ?>" />
          </div>
          <div class="col-12 mt-4">
            <button type="submit" class="btn btn-primary">
              Modifer
            </button>
          </div>
        </form>
      </div>
    </div>
        
    <!-- Messages -->
    <?php include('View/layout/message.php') ?>

    <script src="public/js/tabs.js"></script>
  </body>
  </html>