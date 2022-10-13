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
          Transactions
        </button>
      </div>
    </div>

    <!-- Events list Tab content -->
    <div id="Event" class="tabcontent">
      <table class="table table-hover mt-4">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">N° du votant</th>
            <th scope="col">Montant</th>
            <th scope="col">Date</th>
          </tr>
        </thead>
        <tbody>
            <?php 
            $n = 0;
            foreach ($transactions as $transaction) {
              $n++;
                // Formatage de la date
                $date = date_create($transaction['timestamp']);
                $date = date_format($date, 'd-m-Y H:i');
                $today = date('d/m/Y');
                
            ?>
                <tr>
                    <th scope="row"><?= $n ?></th>
                    <td><?= $transaction['sender'] ?></td>
                    <td><?= $transaction['amount'] ?></td>
                    <td><?= $date ?></td>
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
