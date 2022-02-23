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
    <link rel="stylesheet" href="public/css/modal.css" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <title>Online Voting</title>
  </head>
  <body>
    <?php include('View/layout/navigation.php') ?>
    <div class="container content">
      <h2><?= $event['titre'] ?></h2>
      <div class="row mt-4">
        <div class="col-6">
          <div class="card">
            <img
              src="public/image/south-african-tourism.jpg"
              class="card-img-top rounded"
              alt=""
            />
          </div>
        </div>
        <div class="col-6">
          <div class="row">
            <div class="col-6">
              <p><b>Catégorie</b></p>
              <button class="btn btn-outline-primary"><?= $event['categorie'] ?></button>
            </div>
            <div class="col-6">
              <p><b>Date limite</b></p>
              <p class="text-danger">Fini le <?= $date ?></p>
            </div>
            <div class="col-12 description">
              <h4>Description</h4>
              <p>
                <?= $event['description'] ?>
              </p>
            </div>
          </div>
          <div class="row description"></div>
        </div>
      </div>
      <div class="container mt-4">
        <h4>Voter pour votre candidat favori</h4>
        <div class="row row-cols-1 row-cols-md-5 g-4 mt-2">
          <?php 
            foreach ($candidats as $candidat) {
              $points = point_count($event['id'], $candidat['id']);
          ?>
            <div class="col">
              <div class="card">
                <img src="public/image/avatar.jpg" class="card-img-top" alt="" />
                <div class="card-body">
                  <h5 class="card-title"><?= $candidat['prenom']." ".$candidat['nom'] ?></h5>
                  <p class="small-text"><?= $points ?> point(s)</p>
                  <a
                    id="<?= $candidat['id'] ?>"
                    class="btn btn-outline-danger btn-vote"
                    data-micromodal-trigger="modal-2"
                    href="javascript:void(0);"
                    >Voter</a
                  >
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>

      <!-- Messages -->
      <?php
          if($msg = $_GET['msg']) {
            if ($msg === "vote_created") {
              $msgText = "Bravo ! &nbsp; Votre vote à bien été enregistré";
              $bgColor = " bg-success";
            }else if ($msg === "vote_not_created") {
              $msgText = "Erreur ! &nbsp; Enregistrement de vote incorrect";
              $bgColor = " bg-danger";
            }else if ($msg === "paiement_not_valid") {
              $msgText = "Erreur ! &nbsp; Paiement invalid";
              $bgColor = " bg-danger";
            } else {
              $msgText = "";
              $bgColor = " bg-secondary";
            }
      ?>
        <div class="toast align-items-center text-white <?= $bgColor ?> border-0" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="false" id=myToastEl>
          <div class="d-flex">
            <div class="toast-body">
              <?= $msgText ?>
            </div>
            <button type="button" id="toastBtn" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
          </div>
        </div>
      <?php } ?>
    </div>

    <!-- Login Modal -->
    <?php include('View/layout/login.php') ?>

    <!-- Vote Modal -->
    <?php include('View/layout/vote.php') ?>

    <script src="https://cdn.jsdelivr.net/npm/micromodal/dist/micromodal.min.js"></script>

    <script>
      document.getElementById('toastBtn').addEventListener('click', function() {
        document.getElementById('myToastEl').style.opacity = 0;
      })
      /* document
        .getElementById("login-form")
        .addEventListener("submit", function submitHandle(e) {
          e.preventDefault();
        }); */
        var candidat_id = 0;
        var btnVote = document.getElementsByClassName('btn-vote');
        for(let i = 0; i < btnVote.length; i++) {
          btnVote[i].addEventListener("click", function(e) {
            console.log("Clicked index: " + i);
            candidat_id = e.target.id;
            console.log("candidat: "+candidat_id);
            document.getElementById('vote-form').action = "index.php?action=save_vote&event_id=<?= $event['id'] ?>&candidat_id="+candidat_id;
            var action = document.getElementById('vote-form').getAttribute('action');
            console.log("action: "+action);
          })
        }
       
      // Changement de prix en fonction du point
      var point_dom = document.getElementById('point');
      var prix_dom = document.getElementById('prix');
      point_dom.addEventListener('input', (e) => {
        var prix = e.target.value * 200;
        prix_dom.value = prix+" Fcfa";
      });

    </script>
  </body>
</html>
