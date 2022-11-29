

$(document).ready(function() {

    const SERVER_ADDRESS = 'https://click-events.net'; // PROD
    //const SERVER_ADDRESS = 'http://localhost/click-events'; // Local

    // Paiement (CinetPay)
    /*jQuery('#paiement-form').submit( (e) => {
        e.preventDefault();
        const data = Object.fromEntries(new FormData(e.target).entries());
        console.log(data);
        data.amount = 100,
        //data.amount = data.montant,
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
        });
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
                    url: "index.php?action=check_paiement_ticket" ,
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

    });*/

    
    // Paiement (CinetPay)
    jQuery('#paiement-form').submit( (e) => {
        e.preventDefault();
        const form_data = Object.fromEntries(new FormData(e.target).entries());  
        var data = JSON.stringify({
            "apikey": "112927115762d1e45cb26ef2.15035831",
            "site_id": "229906",
            "transaction_id": Math.floor(Math.random() * 100000000).toString(), //
            "amount": form_data.montant,
            "currency": "XOF",
            "alternative_currency": "",
            "description": " Paiement sur click event ",
            "customer_id": "",
            "customer_name": form_data.customer_name,
            "customer_surname": form_data.customer_surname,
            "customer_email": form_data.customer_email,
            "customer_phone_number": form_data.customer_phone_number,
            "customer_address": form_data.customer_address,
            "customer_city": form_data.customer_city,
            "customer_country": form_data.customer_country,
            "customer_state": form_data.customer_state,
            "customer_zip_code": form_data.customer_zip_code,
            "notify_url": SERVER_ADDRESS+'/notify',
            "return_url": SERVER_ADDRESS+'/index.php?action=check_paiement_ticket',
            "channels": "ALL",
            "metadata": "user1",
            "lang": "FR",
            "invoice_data": {
                "Ticket": form_data.ticket_title,
                "Code": form_data.code,
                "Nom complet": form_data.prenom + " " + form_data.nom 
            }
        });

        var config = {
            method: 'post',
            url: 'https://api-checkout.cinetpay.com/v2/payment',
            headers: {
                'Content-Type': 'application/json'
            },
            data: data
        };

        axios(config)
        .then(function (response) {
            
            console.log("response") ;
            console.log(response) ;
            var result = response.data ;

            if (result.code == 201) 
            {
                console.log("CODE == 201");
                // Ajout de donnees pour l'enregistrement des transactions
                /* data.from = 'CinetPay';
                data.operator_id = response.operator_id;
                data.payment_method = response.payment_method; */
                
                jQuery.ajax({
                    url: "index.php?action=save_commande&ticket_id="+form_data.ticket_id ,
                    method: 'POST' ,
                    data: {'commande': form_data , 'paiement': JSON.parse(data) } ,
                    success: function(response) {
                        console.log('Save paiement in database...');
                        var response = JSON.parse(response);
                        console.log(response);
                        if(response.code == 201)
                        {
                            console.log("COMMANDE_SAVED");
                            window.location.replace(result.data.payment_url);
                        }
                        else if(response.code == 404)
                        {
                            console.error(response.message);
                        }
                        else if(response.code == 405)
                        {
                            console.error(response.message);
                        }
                        else if(response.code == 500)
                        {
                            console.error(response.message);
                        }
                        else
                        {
                            console.error("UNKNOWN_ERROR");
                        }
                    }
                });
                
                //alert("Votre paiement a été effectué avec succès");
            } 
        })
        .catch(function (error) {
            console.log("error") ;
            console.log(error) ;
            var result = error.response.data ;
            if (result.code == 608) 
            {
                console.log("MINIMUM_REQUIRED_FIELDS");
                console.error("amount must be an integer");
                alert("Montant incorrect");
                //window.location.replace(SERVER_ADDRESS+"/index.php?action=paiement_ticket_page&ticket_id=" + data.ticket_id +"&msg=paiement_ticket_echec");
            } 
            else if (result.code == 609) 
            {
                console.error("AUTH_NOT_FOUND");
                alert("apikey fourni n'est pas correcte");
            } 
            else if (result.code == 613) 
            {
                console.error("ERROR_SITE_ID_NOTVALID");
                alert("site_id fourni n'est pas correcte");
            } 
            else if (result.code == 624) 
            {
                console.error("An error occurred while processing the request");
                alert("1- l'apikey saisi est incorrect. 2- La valeur de lock_phone_number est à true mais la valeur du customer_phone_number est incorrect");
            } 
            else if (result.code == 403) 
            {
                console.error("Cela se produit lorsque le content-type utilisé est différent du format json");
                alert("403");
            } 
            else if (result.code == 429) 
            {
                console.error("TOO_MANY_REQUEST");
                alert("Le système a détecté que l'activité que vous menez sur l'api est suspecte");
            } 
            else if (result.code == 1010) 
            {
                console.error("Erreur code :1010");
                alert("il y a une restriction suite à la requête émise par votre serveur.");
            } 

            /*
            if (error.message == 'ERROR_AMOUNT_TOO_LOW') {
                alert("Le montant minimum requis pour le paiemet est 100 F CFA")
                window.location.replace(SERVER_ADDRESS+"/index.php?action=paiement_ticket_page&ticket_id=" + data.ticket_id)
            } else if (error.message == 'MINIMUM_REQUIRED_FIELDS') {
                alert("Le montant doit contenir seulement des chiffres")
                window.location.replace(SERVER_ADDRESS+"/index.php?action=paiement_ticket_page&ticket_id=" + data.ticket_id)
            } */
        });


    });
});