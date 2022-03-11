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
    <title>Online Voting</title>
  </head>
  <body>
    <?php include('View/layout/navigation.php') ?>
    <div class="container content mt-4">
      <h2><?= $event['titre'] ?></h2>
      <div class="row mt-4">
        <div class="col-6">
          <div class="card">
            <?php if($event['video'] != NULL) { ?>
            <iframe height="260" src="<?= $event['video'] ?>" 
              title="YouTube video player" frameborder="0" 
              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
              allowfullscreen></iframe>
            <?php } else if($event['image'] != NULL) { ?>
              <img src="<?= $event['image'] ?>" class="card-img-top rounded" alt="" id="show-event-img"/>
            <?php } else { ?>
              <img src="public/image/south-african-tourism.jpg" class="card-img-top rounded" alt="" id="show-event-img"/>
            <?php } ?>
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
        <div class="row row-cols-1 row-cols-md-5 g-4 mt-2 mb-4">
          <?php 
            foreach ($candidats as $candidat) {
              $points = point_count($event['id'], $candidat['id']);
          ?>
            <div class="col">
              <div class="card">
                <?php if($candidat['image'] == NULL) { ?>
                  <img src="public/image/avatar.jpg" class="card-img-top" alt="" id="show-candidat-img"/>
                <?php } else { ?>
                  <img src="<?= $candidat['image'] ?>" class="card-img-top rounded" alt="" id="show-candidat-img"/>
                <?php } ?>
                <div class="card-body">
                  <h5 class="card-title"><?= $candidat['prenom']." ".$candidat['nom'] ?></h5>
                  <p class="small-text"><?= ($points > 0) ? $points : "0" ?> point(s)</p>
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
    </div>
    <!-- Messages -->
    <?php include('View/layout/message.php') ?>

    <!-- Login Modal -->
    <?php include('View/layout/login.php') ?>

    <!-- Vote Modal -->
    <?php include('View/layout/vote.php') ?>

    <script src="https://cdn.jsdelivr.net/npm/micromodal/dist/micromodal.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <script>
      MicroModal.init();

      /* document
        .getElementById("login-form")
        .addEventListener("submit", function submitHandle(e) {
          e.preventDefault();
        }); */
        var candidat_id = 0;
        var btnVote = document.getElementsByClassName('btn-vote');
        for(let i = 0; i < btnVote.length; i++) {
          btnVote[i].addEventListener("click", function(e) {
            candidat_id = e.target.id;
            document.getElementById('vote-form').action = "index.php?action=save_vote&event_id=<?= $event['id'] ?>&candidat_id="+candidat_id;
            var action = document.getElementById('vote-form').getAttribute('action');
          })
        }
       
      // Changement de prix en fonction du point
      var point_dom = document.getElementById('point');
      var prix_dom = document.getElementById('prix');
      point_dom.addEventListener('input', (e) => {
        var prix = e.target.value * 20;
        prix_dom.value = prix+" Fcfa";
      });

        if (toastBtn = document.getElementById('toastBtn')) {
          toastBtn.addEventListener('click', function() {
            document.getElementById('myToastEl').style.opacity = 0;
          })
        }
      
    </script>
  </body>
</html>
