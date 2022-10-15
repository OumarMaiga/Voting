
$(document).ready(function() {

    valider = document.getElementsByClassName('valider');
    for(var x=0; x < valider.length; x++)
    {
      id = valider[x].value;
      valider[x].addEventListener('click', function (e) {
        if( confirm('Voulez-vous valider la consommation du ticket ?') ) {
          return window.location.href = 'index.php?action=consommer_commande&id=' + id
        };
      });
    }
  
})