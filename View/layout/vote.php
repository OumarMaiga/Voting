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
        <form action="" method="POST" id="vote-form">
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
                    value="1"
                />
                </div>
                <div class="mb-3">
                <label for="prix" class="form-label">Prix à payer</label>
                <input
                    type="text"
                    class="form-control"
                    id="prix"
                    name="prix"
                    value="200 Fcfa"
                    readOnly=""
                />
                </div>
            </main>
            <footer class="modal__footer">
                <input type="submit" class="modal__btn modal__btn-primary" value="Valider"/>
            </footer>
        </form>
    </div>
    </div>
</div>