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
          Création de ticket
        </button>
      </div>
    </div>

    <!-- Ticket Tab content -->
    <div id="Event" class="tabcontent">
      <div class="container">
        <h3 class="header-title">Ajouter un ticket</h3>
        <form
          action="index.php?action=save_ticket"
          method="post"
          enctype="multipart/form-data"
          class="row g-3 mt-4"
        >
          <div class="col-md-4">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" name="title" id="title" value="" />
          </div>
          <div class="col-md-4">
            <label for="overview" class="form-label">Description</label>
            <textarea class="form-control" name="overview" id="overview"></textarea>
          </div>
          <div class="col-md-4">
            <label for="lieu" class="form-label">Lieu</label>
            <input type="text" class="form-control" name="lieu" id="lieu" />
          </div>
          <div class="col-md-4">
            <label for="count" class="form-label">Nombre de ticket</label>
            <input type="number" class="form-control" name="count" id="count" value=""
            />
          </div>
          <div class="col-md-4">
            <label for="montant" class="form-label">Montant</label>
            <input type="text" class="form-control" name="montant" id="montant" value=""
            />
          </div>
          <div class="col-md-4">
            <label for="expire" class="form-label">Date du concert</label>
            <input
              type="date"
              class="form-control"
              name="expire"
              id="expire"
            />
          </div>
          <div class="col-md-4">
            <label for="image" class="form-label">Photo du ticket</label>
            <input
              type="file"
              class="form-control"
              name="image"
              id="image"
              accept=".jpg, .jpeg, .png"
            />
          </div>
          <div class="col-md-4">
            <label for="partenaire" class="form-label">Partenaires</label>
            <select name="partenaire[]" id="partenaire" class="form-control" multiple size="4">
              <?php
                foreach($partenaires as $partenaire) {
              ?>
              <option value="<?= $partenaire['id'] ?>"><?= $partenaire['login'] ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="col-12 mt-4">
            <button type="submit" class="btn btn-primary">
              Valider
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
