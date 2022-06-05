
    <div class="modal micromodal-slide" id="commande-modal" aria-hidden="true">
      <div class="modal__overlay" tabindex="-1" data-micromodal-close>
        <div
          class="modal__container"
          role="dialog"
          aria-modal="true"
          aria-labelledby="modal-1-title"
          style="min-width: 30%;"
        >
          <header class="modal__header">
            <h2 class="modal__title" id="modal-1-title">Acheter votre ticket</h2>
            <button
              class="modal__close"
              aria-label="Close modal"
              data-micromodal-close
            ></button>
          </header>
          <form action="index.php?action=save_commande&ticket_id=<?= $ticket['id'] ?>" method="POST" id="login-form">
            <main class="modal__content" id="modal-1-content">
              <h4><?= $ticket['title'] ?></h4>
              <p>
                <?= $ticket['overview'] ?>
              </p>
              
              <div class="mb-4">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" class="form-control" name="nom" id="nom" />
              </div>
              <div class="mb-4">
                <label for="prenom" class="form-label">Prénom</label>
                <input type="text" class="form-control" name="prenom" id="prenom" />
              </div>
              <div class="mb-4">
                <label for="email" class="form-label">Email</label>
                <input
                  type="text"
                  class="form-control"
                  name="email"
                  id="email"
                />
              </div>
              <div class="mb-4">
                <label for="phone" class="form-label">Telephone</label>
                <input type="text" class="form-control" name="phone" id="phone" />
              </div>
              <div class="mb-5">
                <label for="count" class="form-label">Nombre de ticket</label>
                <input type="number" min="1" max="100" class="form-control" name="count" id="count" value="1"/>
              </div>
                <footer class="modal__footer">
                    <button class="modal__btn modal__btn-primary">
                      Achetez
                    </button>
                </footer>
            </main>
          </form>
        </div>
      </div>
    </div>