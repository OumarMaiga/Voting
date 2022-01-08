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
    <title>Online Voting - Admin</title>
</head>
<body>

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
            foreach ($events as $event) {
                // Formatage de la date
                $date = date_create($event['expire']);
                $date = date_format($date, 'd/m/Y:H:i');
            ?>
                <tr>
                    <th scope="row">1</th>
                    <td><?= $event['titre'] ?></td>
                    <td><?= $event['categorie'] ?></td>
                    <td><?= $date ?></td>
                    <td class="icon">
                    <a href="index.php?action=show_event&id=<?= $event['id'] ?>">
                        <i class="far fa-eye fa-2x"></i>
                    </a>
                    </td>
                    <td><button class="btn btn-success">En cours</button></td>
                    <td class="actions">
                    <a class="actions" href="index.php?action=edit_event&id=<?= $event['id'] ?>">Modifier</a>
                    </td>
                </tr>
            <?php } ?>
          <tr>
            <th scope="row">2</th>
            <td>Nappy Afrique</td>
            <td>Concours facebook et instagram</td>
            <td>06/06/2021</td>
            <td class="icon">
              <a href="list-participants.html"
                ><i class="far fa-eye fa-2x"></i
              ></a>
            </td>
            <td><button class="btn btn-warning">Terminer</button></td>
            <td class="actions">
              <a class="actions" href="edit-event.html">Modifier</a>
            </td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td>Copywriter awards</td>
            <td>Sondage instagram</td>
            <td>19/05/2022</td>
            <td class="icon">
              <a href="list-participants.html"
                ><i class="far fa-eye fa-2x"></i
              ></a>
            </td>
            <td><button class="btn btn-success">En cours</button></td>
            <td class="actions">
              <a class="actions" href="edit-event.html">Modifier</a>
            </td>
          </tr>
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
