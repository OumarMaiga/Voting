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
          ?>
            <div class="col">
              <div class="card">
                <img src="public/image/avatar.jpg" class="card-img-top" alt="" />
                <div class="card-body">
                  <h5 class="card-title"><?= $candidat['prenom']." ".$candidat['nom'] ?></h5>
                  <p class="small-text">1147 votes</p>
                  <a
                    class="btn btn-outline-danger"
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

    <!-- Login Modal -->
    <?php include('View/layout/login.php') ?>

    <!-- Vote Modal -->
    <div class="modal micromodal-slide" id="modal-2" aria-hidden="true">
      <div class="modal__overlay" tabindex="-1" data-micromodal-close>
        <div
          class="modal__container"
          role="dialog"
          aria-modal="true"
          aria-labelledby="modal-1-title"
        >
          <header class="modal__header">
            <h2 class="modal__title" id="modal-1-title">Vote ton candidat</h2>
            <button
              class="modal__close"
              aria-label="Close modal"
              data-micromodal-close
            ></button>
          </header>
          <form action="" method="" id="login-form">
            <main class="modal__content" id="modal-1-content">
              <p>
                Vote ton candidat en lui attribuant des points et participe à sa
                victoire.
              </p>

              <div class="mb-3">
                <label for="point" class="form-label"
                  >Donner des points au candidat</label
                >
                <input
                  type="number"
                  class="form-control"
                  id="point"
                  name="point"
                  autocomplete="off"
                />
              </div>
              <div class="mb-3">
                <label for="prix" class="form-label">Prix à payer</label>
                <input
                  type="text"
                  class="form-control"
                  id="prix"
                  name="prix"
                  placeholder="200 Fcfa"
                  disabled
                />
              </div>
            </main>
          </form>
          <footer class="modal__footer">
            <a href="pages/admin-panel.html">
              <button class="modal__btn modal__btn-primary">Valider</button>
            </a>
          </footer>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/micromodal/dist/micromodal.min.js"></script>
    <script>
      MicroModal.init();
      /* document
        .getElementById("login-form")
        .addEventListener("submit", function submitHandle(e) {
          e.preventDefault();
        }); */
    </script>
  </body>
</html>
