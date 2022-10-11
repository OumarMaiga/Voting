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
    <title>Click partenaire - Admin</title>
    <script src="public/js/tabs.js"></script>
</head>
<body onload="openSection(event, 'Event')">
    <?php include('View/layout/navigation.php') ?>
        
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
        <h3 class="header-title">Ouvrir un compte partenaire</h3>
        <form
          action="index.php?action=save_partenaire"
          method="post"
          class="row g-3 mt-4"
        >
          <div class="col-md-4">
            <label for="prenom" class="form-label">Prenom</label>
            <input type="text" class="form-control" name="prenom" id="prenom" />
          </div>
          <div class="col-md-4">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control" name="nom" id="nom" />
          </div>
          <div class="col-md-4">
            <label for="genre" class="form-label">Genre</label>
            <select type="text" class="form-control" name="genre">
              <option value="">-- SELECTIONNEZ LE GENRE --</option>
              <option value="homme">HOMME</option>
              <option value="femme">FEMME</option>
            </select>
          </div>
          <div class="col-md-4">
            <label for="phone" class="form-label">Telephone</label>
            <input type="text" class="form-control" name="phone" id="phone" />
          </div>
          <div class="col-md-4">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="email" />
          </div>
          <div class="col-md-4">
            <label for="login" class="form-label">Login</label>
            <input type="text" class="form-control" name="login" id="login" />
          </div>
          <div class="col-md-4">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" name="password" id="password" />
          </div>
          <div class="col-12">
            <button type="submit" class="btn btn-primary">
              Créer le partenaire
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
    <script>
      MicroModal.init();
    </script>
</body>
</html>