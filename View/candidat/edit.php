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
          Editer infos participant
        </button>
      </div>
    </div>

    <!-- Candidat Tab content -->
    <div id="Event" class="tabcontent">
      <div class="container">
        <h2 class="header-title"><?= $event['titre'] ?></h2>
        <h4 class="header-title">Ajouter un candidat</h4>
        <form
          action="index.php?action=update_candidat&id=<?= $candidat['id'] ?>&event_id=<?= $event['id'] ?>"
          method="post"
          enctype="multipart/form-data"
          class="row g-3 mt-4"
        >
          <div class="col-md-4">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control" name="nom" id="nom" value="<?= $candidat['nom'] ?>" />
          </div>
          <div class="col-md-4">
            <label for="prenom" class="form-label">Prénom</label>
            <input type="text" class="form-control" name="prenom" id="prenom" value="<?= $candidat['prenom'] ?>" />
          </div>
          <div class="col-md-4"></div>
          <div class="col-md-4">
            <label class="form-label">Genre</label>
            <div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="genre" id="homme" value="h" <?= $candidat['genre'] == "h" ? "checked=" : "" ?> />
                <label class="form-check-label" for="homme">Homme</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="genre" id="femme" value="f" <?= $candidat['genre'] == "f" ? "checked=" : "" ?>>
                <label class="form-check-label" for="femme">Femme</label>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <label for="birthdate" class="form-label">Date de naissance</label>
            <input
              type="date"
              class="form-control"
              name="date_naissance"
              id="birthdate"
              value="<?= $date ?>"
            />
          </div>
          <div class="col-md-4"></div>
          <div class="col-md-4">
            <label for="image" class="form-label">Photo du candidat</label>
            <input
              type="file"
              class="form-control"
              name="image"
              id="image"
              accept=".jpg, .jpeg, .png"
            />
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