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
          Editer une Campagne
        </button>
      </div>
    </div>

    <!-- Campagne Tab content -->
    <div id="Event" class="tabcontent">
      <div class="container">
        <h3 class="header-title">Modifier la campagne</h3>
        <form
          action="index.php?action=update_event&id=<?= $event['id'] ?>"
          method="post"
          enctype="multipart/form-data"
          class="row g-3 mt-4"
        >
          <div class="col-md-4">
            <label for="titre" class="form-label">Titre</label>
            <input type="text" class="form-control" name="titre" id="titre" value="<?= $event['titre'] ?>"/>
          </div>
          <div class="col-md-4">
            <label for="categorie" class="form-label">Catégorie</label>
            <input type="text" class="form-control" name="categorie" id="categorie" value="<?= $event['categorie'] ?>"/>
          </div>
          <div class="col-md-4">
            <label for="expire_date" class="form-label">Fin de campagne</label>
            <input
              type="date"
              class="form-control"
              name="expire"
              id="expire_date"
              value="<?= $day ?>"
            />
          </div>
          <div class="col-md-6">
            <label for="image" class="form-label">Image de couverture</label>
            <input
              type="file"
              class="form-control"
              name="image"
              id="image"
              accept=".jpg, .jpeg, .png"
              value="<?= $event['image'] ?>"
            />
          </div>
          <div class="col-md-6">
            <label for="video" class="form-label">Video marketing (lien)</label>
            <input
              type="text"
              class="form-control"
              name="video"
              id="video"
              value="<?= $event['video'] ?>"
            />
          </div>
          <div class="col-md-12">
            <label for="description" class="form-label">Description</label>
            <textarea
              class="form-control"
              rows="4"
              name="description"
              id="description"
            ><?= $event['description'] ?></textarea>
          </div>
          <div class="col-12">
            <button type="submit" class="btn btn-primary">Valider</button>
          </div>
        </form>
      </div>
    </div>
        
    <!-- Messages -->
    <?php include('View/layout/message.php') ?>

    <script src="public/js/tabs.js"></script>
  </body>
</html>
