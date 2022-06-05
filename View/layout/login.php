
    <div class="modal micromodal-slide" id="login-modal" aria-hidden="true">
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