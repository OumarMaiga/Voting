<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="public/css/global.css" />
    <link rel="stylesheet" href="public/css/modal.css" />
    <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
    crossorigin="anonymous"/>
    <title>Online Voting</title>
</head>
<body>
    <h2>Accueil</h2>
    <p>
        <?php
            if(isset($_SESSION['user'])) {
        ?>
            <a href="index.php?action=logout">Deconnexion</a>
        <?php
            } else {
        ?>
            <a href="index.php?action=login">Login</a>
        <?php } ?>
    </p>
    <ul>
        <li>
            <a href="index.php?action=index_event">Event</a>
        </li>
        <li>
            <a href="index.php?action=index_candidat">Candidat</a>
        </li>
    </ul>
    <div class="container mt-4">
      <a data-micromodal-trigger="modal-1" href="javascript:void(0);">
        <h2>Open Login Modal</h2>
      </a>
    </div>

    <!-- Login Modal -->
    <div class="modal micromodal-slide" id="modal-1" aria-hidden="true">
      <div class="modal__overlay" tabindex="-1" data-micromodal-close>
        <div
          class="modal__container"
          role="dialog"
          aria-modal="true"
          aria-labelledby="modal-1-title"
        >
          <header class="modal__header">
            <h2 class="modal__title" id="modal-1-title">Connexion</h2>
            <button
              class="modal__close"
              aria-label="Close modal"
              data-micromodal-close
            ></button>
          </header>
          <form action="index.php?action=sign_in" method="POST" id="login-form">
            <main class="modal__content" id="modal-1-content">
              <p>
                Accéder à l'espace administrateur et gérer les différentes
                campagne et les candidats.
              </p>

              <div class="mb-3">
                <label for="login" class="form-label">Nom d'utilisateur</label>
                <input
                  type="text"
                  class="form-control"
                  id="login"
                  name="login"
                  autocomplete="off"
                />
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Mot de passe</label>
                <input
                  type="password"
                  class="form-control"
                  id="password"
                  name="password"
                />
              </div>
          <footer class="modal__footer">
              <button class="modal__btn modal__btn-primary">
                Se connecter
              </button>
          </footer>
            </main>
          </form>
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
