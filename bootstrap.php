<?php

    //require('./autoload.php');

    spl_autoload_register(function ($class) {
        require $class . '.php';
    }); 

    /*use Database\DatabaseConnector;
    
    $dbConnection = (new DatabaseConnector())->getConnection();*/