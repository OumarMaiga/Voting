<nav class="navbar navbar-expand-md navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="index.php">CLICK EVENT</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse nav-item-list" id="navbarSupportedContent">
      <?php
        if(isset($_SESSION['user'])) {
      ?>
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a
            class="nav-link text-white"
            href="index.php?action=index_event">Tableau de bord</a>
        </li>
        <li class="nav-item">
          <a
            class="nav-link text-white"
            href="index.php?action=index_ticket">Dsahboard-Ticket</a>
        </li>
        <li class="nav-item">
          <a
            class="nav-link text-white"
            href="index.php?action=get_wizall_token_page">Get Wizall Token</a>
        </li>
        <li class="nav-item">
          <a
            class="nav-link text-white"
            href="index.php?action=transactions">Transaction</a>
        </li>
        <li class="nav-item">
          <a
            class="btn btn-danger"
            href="index.php?action=logout">Deconnexion</a>
        </li>
      <?php
          } else {
      ?>
      <a
        class="nav-link text-white"
        href="#campagne">Campagne</a>
        <a
          class="nav-link text-white"
          href="#ticket">Ticket</a>
        <a
          class="nav-link text-white"
          href="#">Contact</a>
          <a 
            class="btn btn-danger"
            data-micromodal-trigger="login-modal"
            href="javascript:void(0);">Se connecter</a>
      <?php } ?>
    </div>
  </div>
</nav>
