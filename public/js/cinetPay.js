
$(document).ready(function() {

    const SERVER_ADDRESS = 'https://click-events.net'; // PROD
    //const SERVER_ADDRESS = 'http://localhost/click-events'; // Local

    // Paiement (CinetPay)
    jQuery('#paiement-form').submit( (e) => {
        e.preventDefault();
        const data = Object.fromEntries(new FormData(e.target).entries());
        console.log(data);
        data.amount = data.montant,
        data.currency = 'XOF',
        data.channels = 'ALL',
        data.description = 'Paiement sur click event',
        data.transaction_id =  Math.floor(Math.random() * 100000000).toString(),

        CinetPay.setConfig({
            apikey: '112927115762d1e45cb26ef2.15035831', // YOUR APIKEY
            site_id: '229906', // YOUR_SITE_ID
            notify_url: SERVER_ADDRESS+'/notify/',
            mode: 'PRODUCTION',
            return_url: SERVER_ADDRESS+'/index.php?action=buy_ticket&id=' + data.ticket_id + "&msg=paiement_ticket_success&commande_code=" + data.code
        });4
        CinetPay.getCheckout({
            amount: data.montant,
            currency: data.currency,
            channels: data.channels,
            description: data.description,
            transaction_id: data.transaction_id,
                
            //Fournir ces variables pour le paiements par carte bancaire
            customer_name: data.customer_name,
            customer_surname: data.customer_surname,
            customer_email:  data.customer_email,
            customer_phone_number:  data.customer_phone_number,
            customer_address:  data.customer_address,
            customer_city:  data.customer_city,
            customer_country:  data.customer_country,
            customer_state:  data.customer_state,
            customer_zip_code:  data.customer_zip_code,
        });
        CinetPay.waitResponse(function(response) {
            console.log(response);
            if (response.status == "REFUSED") {
                console.log("REFUSED");
                alert("Votre paiement a échoué");
                window.location.replace(SERVER_ADDRESS+"/index.php?action=paiement_ticket_page&ticket_id=" + data.ticket_id +"&msg=paiement_ticket_echec");
            } else if (response.status == "ACCEPTED") {
                console.log("ACCEPTED");
                // Ajout de donnees pour l'enregistrement des transactions
                data.from = 'CinetPay';
                data.operator_id = response.operator_id;
                data.payment_method = response.payment_method;
                
                jQuery.ajax({
                    url: "index.php?action=paiement_ticket" ,
                    method: 'POST',
                    data: data,
                    success: function(response) {
                        console.log('Save paiement in database...');
                        console.log(response);
                        window.location.replace(SERVER_ADDRESS+"/index.php?action=paiement_ticket_page&ticket_id=" + data.ticket_id +"&msg=paiement_ticket_success&commande_code=" + data.code);
                    }
                });
                
                alert("Votre paiement a été effectué avec succès");
            }
        });
        CinetPay.onError(function(error) {
            console.log(error);
            if (error.message == 'ERROR_AMOUNT_TOO_LOW') {
                alert("Le montant minimum requis pour le paiemet est 100 F CFA")
                window.location.replace(SERVER_ADDRESS+"/index.php?action=paiement_ticket_page&ticket_id=" + data.ticket_id);
            } else if (error.message == 'MINIMUM_REQUIRED_FIELDS') {
                alert("Le montant doit contenir seulement des chiffres");
                window.location.replace(SERVER_ADDRESS+"/index.php?action=paiement_ticket_page&ticket_id=" + data.ticket_id);
            } 
        });

    });
});