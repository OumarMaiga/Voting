<?php
    
    //require('../Database/DatabaseConnector.php');

    //spl_autoload_register();

    require('./autoload.php');

    use Database\DatabaseConnector;
    
    $dbConnection = (new DatabaseConnector())->getConnection();