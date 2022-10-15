
$(document).ready(function() {
    
  jQuery('#query').on('input', function(e) {
    let ticket_id = $("#ticket_id").val();
    let query = $("#query").val();
    
    $.ajax({
      url: "index.php?action=search&ticket_id="+ticket_id+"&query="+query,
      type: "GET",
      success: function(data) {
        data = JSON.parse(data); 
        if (data.code == "1") {
          let commandes = data.commandes;
          let tbody = $('#search-tbody');
          tbody.empty();
          for (var i = 0; i < commandes.length; i++) {

            n = i + 1;
            commande = commandes[i];
            
            if (commande.code == null) {
              commande.code = "";
            }

            if (commande.etat == "precommande") {
              commande.etat = "Pré-commande";
              etat_color = "green";
            } else if (commande.etat == "commande") {
              commande.etat = "Commande";
              etat_color = "green";
            } else if (commande.etat == "used") {
              commande.etat = "Utilisé";
              etat_color = "red";
            } else {
              commande.etat = "";
              etat_color = "";
            }

            if (commande.paid == 1) {
              commande.paid = "Oui";
              paid_color = "green";
            } else {
              commande.paid = "Non";
              paid_color = "red";
            }

            if(commande.used != 1) {
              commande.used = '<button type="submit" class="btn btn-success valider" value=' + commande['id'] + '>Valider</button>';
            } else {
              commande.used = "<button type='submit' class='btn btn-secondary' disabled>Comsommer</button>";
            }
            
            tbody.append (
                '<tr>'+
                    '<th scope="row">' + n + '</th>'+
                    '<td>' + commande.prenom + '</td>'+
                    '<td>' + commande.nom + '</td>'+
                    '<td>' + commande.code + '</td>'+
                    '<td>' + commande.email + '</td>'+
                    '<td>' + commande.phone + '</td>'+
                    '<td>' + commande.count + '</td>'+
                    '<td> <b style=color:'+etat_color+'>'+commande.etat + '</b> </td>'+
                    '<td> <b style=color:'+paid_color+'>'+commande.paid+'</b> </td>'+
                    '<td>'+commande.used+'</td>'+
                    
                '</tr>'
            );

          }
          /** Valider-ticket File */
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
        }
      }
    });

  })

})