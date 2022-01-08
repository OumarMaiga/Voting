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
      crossorigin="anonymous"
    />
    <title>Online Voting - Admin</title>
</head>
<body>
        
    <h1 class="page-title">Espace administrateur</h1>

    <!-- Tab links -->
    <div class="tab mt-2">
      <div class="">
        <button class="tablinks" onclick="openSection(event, 'Event')">
          Nouvelle Campagne
        </button>
      </div>
    </div>

    <!-- Campagne Tab content -->
    <div id="Event" class="tabcontent">
      <div class="container">
        <h3 class="header-title">Créer une campagne</h3>
        <form
          action="index.php?action=create_event"
          method="post"
          enctype="multipart/form-data"
          class="row g-3 mt-4"
        >
          <div class="col-md-4">
            <label for="titre" class="form-label">Titre</label>
            <input type="text" class="form-control" name="titre" id="titre" />
          </div>
          <div class="col-md-4">
            <label for="categorie" class="form-label">Catégorie</label>
            <select id="categorie" name="categorie" class="form-select">
              <option selected>Choisir...</option>
              <option value="">Concours Facebook</option>
              <option value="">Campagne Instagram</option>
            </select>
          </div>
          <div class="col-md-4">
            <label for="expire_date" class="form-label">Fin de campagne</label>
            <input
              type="date"
              class="form-control"
              name="expire"
              id="expire_date"
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
            />
          </div>
          <div class="col-md-6">
            <label for="video" class="form-label">Video marketing</label>
            <input
              type="file"
              class="form-control"
              name="video"
              id="video"
              accept=".mp4, .flv, .mpeg"
            />
          </div>
          <div class="col-md-12">
            <label for="description" class="form-label">Description</label>
            <textarea
              class="form-control"
              rows="4"
              name="description"
              id="description"
            ></textarea>
          </div>
          <div class="col-12">
            <button type="submit" class="btn btn-primary">
              Créer ma campagne
            </button>
          </div>
        </form>
      </div>
    </div>

    <!-- Candidat Tab content -->
    <div id="Candidat" class="tabcontent">
      <div class="container">
        <h3 class="header-title">Créer un candidat</h3>
        <form
          action=""
          method="post"
          enctype="multipart/form-data"
          class="row g-3 mt-4"
        >
          <div class="col-md-4">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control" name="nom" id="nom" />
          </div>
          <div class="col-md-4">
            <label for="prenom" class="form-label">Prénom</label>
            <input type="text" class="form-control" name="prenom" id="prenom" />
          </div>
          <div class="col-md-4"></div>
          <div class="col-md-4">
            <label class="form-label">Genre</label>
            <div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="genre" id="homme" value="option1">
                <label class="form-check-label" for="homme">Homme</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="genre" id="femme" value="option2">
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
              Créer le candidat
            </button>
          </div>
        </form>
      </div>
    </div>

    <script src="public/js/tabs.js"></script>
</body>
</html>