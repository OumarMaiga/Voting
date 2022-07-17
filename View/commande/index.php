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
    <div id="Event" class="tabcontent">
      <h3 class="header-title"><?= $ticket['title'] ?></h3>
      <table class="table table-hover mt-4">
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
            <!--<th scope="col">Actions</th>-->
          </tr>
        </thead>
        <tbody>
            <?php
            $n = 0;
            foreach ($commandes as $commande) {
                $n++;
            ?>
                <tr>
                    <th scope="row"><?= $n ?></th>
                    <td><?= $commande['prenom'] ?></td>
                    <td><?= $commande['nom'] ?></td>
                    <td>as01IU</td>
                    <td><?= $commande['email'] ?></td>
                    <td><?= $commande['phone'] ?></td>
                    <td><?= $commande['count'] ?></td>
                    <td><?= $commande['etat'] ?></td>
                    <!--<td class="actions">
                    <a class="actions" href="index.php?action=edit_commande&id=<?= $commande['id'] ?>">Modifier</a>
                    </td>-->
                </tr>
            <?php } ?>
        </tbody>
      </table>
    </div>

    <script
      src="https://kit.fontawesome.com/64d67fd16e.js"
      crossorigin="anonymous"
    ></script>
    <script src="public/js/tabs.js"></script>
  </body>
</html>
