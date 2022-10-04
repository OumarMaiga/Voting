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

    <title>Click partenaire - Admin</title>
    <script src="public/js/tabs.js"></script>
</head>
<body onload="openSection(event, 'Partenaire')">
    
  <?php include('View/layout/navigation.php') ?>
    
    <h1 class="page-title">Espace administrateur</h1>

    <!-- Tab links -->
    <div class="tab mt-2">
      <div class="">
        <button class="tablinks" onclick="openSection(event, 'Partenaire')">
          Nos partenaires
        </button>
      </div>
    </div>

    <!-- Events list Tab content -->
    <div id="Partenaire" class="tabcontent">
      <a href="index.php?action=create_partenaire">
        <button class="btn btn-outline-primary add-btn">
          <i class="fas fa-plus"></i> &nbsp;Créer nouveau partenaire
        </button>
      </a>
      <table class="table table-hover mt-4">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Login</th>
            <th scope="col">Prenom et nom</th>
            <th scope="col">Email</th>
            <th scope="col">Telephone</th>
            <th scope="col">Genre</th>
            <th scope="col">Etat</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
            <?php 
            $n = 0;
            foreach ($partenaires as $partenaire) {
              $n++;
            ?>
                <tr>
                    <th scope="row"><?= $n ?></th>
                    <td><?= $partenaire['login'] ?></td>
                    <td><?= $partenaire['prenom'].' '.$partenaire['nom'] ?></td>
                    <td><?= $partenaire['email'] ?></td>
                    <td><?= $partenaire['phone'] ?></td>
                    <td><?= $partenaire['genre'] ?></td>
                    <?php if($partenaire['etat'] == "1") { ?>
                      <td><button class="btn btn-success">Activer</button></td>
                    <?php } else {?>
                      <td><button class="btn btn-danger">Désactiver</button></td>
                    <?php } ?>
                    <td class="action-icon-container">
                      <a class="action-icon" href="index.php?action=edit_partenaire&id=<?= $partenaire['login'] ?>">
                        <ion-icon name="create" style="font-size:24px;color:orange;" title="Modifier"></ion-icon>
                      </a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
      </table>
    </div>

    <script
      src="https://kit.fontawesome.com/64d67fd16e.js"
      crossorigin="anonymous"
    ></script>
</body>
</html>
