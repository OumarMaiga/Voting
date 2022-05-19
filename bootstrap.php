<?php

    spl_autoload_register(function ($class) {
        $path = str_replace("\\", "/", __DIR__."/".$class . '.php');
        require $path;
    }); 
