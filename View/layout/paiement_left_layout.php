
        <h4 class="text-lighter"><?= $event['categorie'] ?></h4>
        <h4 class="text-bold"><?= $event['titre'] ?></h4>
        <?php if ($event['image'] == NULL) {  ?>
            <img src="public/image/south-african-tourism.jpg" class="card-img-top rounded" alt="" id="paiement-event-img"/>
        <?php } else { ?>
          <img src="<?= $event['image'] ?>" class="card-img-top rounded" alt="" id="paiement-event-img"/>
        <?php } ?>        
        <p id="text">
        <?= substr($event['description'], 0, 200); ?> <?= (strlen($event['description']) > 200) ? " ..." : "" ?>
        </p>
        <div class="mt-4">
          <h6 class="paiement-vote-title">Voter pour votre candidat</h6>
        </div>
        <div class="paiement-vote-candidat-container">
          <?php if ($candidat['image'] == NULL) {  ?>
            <img src="public/image/south-african-tourism.jpg" class="paiement-vote-candidat-profile" alt="" />
          <?php } else { ?>
            <img src="<?= $candidat['image'] ?>" class="paiement-vote-candidat-profile" alt="" />
          <?php } ?> 
          
          <span class="paiement-vote-candidat-name mx-2"><?= $candidat['prenom']." ".$candidat['nom'] ?></span>

          <span style="position: absolute; right: 10px">
          
            <?= ($points > 0) ? $points : "0" ?> point(s)
          </span>
        </div>