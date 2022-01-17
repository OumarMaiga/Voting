<nav class="navbar navbar-dark bg-dark">
<div class="container">
  <a class="navbar-brand" href="index.php">Event App</a>
  <div class="d-flex">
    <?php
      if(isset($_SESSION['user'])) {
    ?>
      <a
        class="nav-link text-white"
        href="index.php?action=index_event">Tableau de bord</a>
      <a
        class="btn btn-danger"
        href="index.php?action=logout">Deconnexion</a>
    <?php
        } else {
    ?>
        <a 
          class="btn btn-danger"
          data-micromodal-trigger="modal-1"
          href="javascript:void(0);">Se connecter</a>
    <?php } ?>
  </div>
</div>
</nav>