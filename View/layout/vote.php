<div class="modal micromodal-slide" id="paiment-modal" aria-hidden="true">
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
                    value="10"
                    step="10"
                    min="10"
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
                <div class="mb-3">
                <label for="paiement_mode" class="form-label">Moyen de paiment</label>
                <select class="form-select" aria-label="Default select example" name="paiement_mode">
                    <option selected value="">-- Choisissez --</option>
                    <option value="orange_money">Orange money</option>
                    <option value="wizall">Wizall</option>
                    <option value="mobicash">MobiCash</option>
                    <option value="wave">Wave</option>
                </select>
                </div>
            </main>
            <footer class="modal__footer">
                <input type="submit" class="modal__btn modal__btn-primary" value="Payez"/>

                <div class="paiement-logo-container">
                    <img src="public/image/orange_money.png" class="paiement-logo" alt="">
                    <img src="public/image/wizall.jpg" class="paiement-logo" alt="">
                    <img src="public/image/mobicash.png" class="paiement-logo" alt="">
                    <img src="public/image/wave.png" class="paiement-logo" alt="">
                </div>
            </footer>
        </form>
    </div>
    </div>
</div>