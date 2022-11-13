document.addEventListener("DOMContentLoaded", () => {

    document.getElementById("count").addEventListener('input', function (e) {

        var montant = document.getElementById("montant_unite").value ;
        var count = document.getElementById("count").value ;
        var total = montant * count ;

        document.getElementById("button-paiement").innerText = "Acheter " + total + " FCFA";
        document.getElementById("montant").value = total ;
    });

});