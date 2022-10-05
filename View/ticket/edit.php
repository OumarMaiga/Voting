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

    <!-- Ticket Tab content -->
    <div id="Event" class="tabcontent">
      <div class="container">
        <h3 class="header-title">Ajouter un ticket</h3>
        <form
          action="index.php?action=update_ticket&id=<?= $ticket['id'] ?>"
          method="post"
          enctype="multipart/form-data"
          class="row g-3 mt-4"
        >
          <div class="col-md-4">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" name="title" id="title" value="<?= $ticket['title'] ?>" />
          </div>
          <div class="col-md-4">
            <label for="overview" class="form-label">Description</label>
            <textarea class="form-control" name="overview" id="overview"><?= $ticket['overview'] ?></textarea>
          </div>
          <div class="col-md-4">
            <label for="lieu" class="form-label">Lieu</label>
            <input type="text" class="form-control" name="lieu" id="lieu" value="<?= $ticket['lieu'] ?>"/>
          </div>
          <div class="col-md-4">
            <label for="count" class="form-label">Nombre de ticket</label>
            <input type="number" class="form-control" name="count" id="count" value="<?= $ticket['count'] ?>"
            />
          </div>
          <div class="col-md-4">
            <label for="montant" class="form-label">Montant</label>
            <input type="text" class="form-control" name="montant" id="montant" value="<?= $ticket['montant'] ?>"
            />
          </div>
          <div class="col-md-4">
            <label for="expire" class="form-label">Date du concert</label>
            <input
              type="date"
              class="form-control"
              name="expire"
              id="expire"
              value="<?= $day ?>"
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