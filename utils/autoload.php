<?php

spl_autoload_register ( function ($class) {
    $sources = array(
        "controllers/$class.php", 
        "core/$class.php",     
        "dao/$class.php", 
        "models/$class.php"
    );

        foreach ($sources as $source) {
            if (file_exists($source)) {
                require_once $source;
            } 
        } 
    });
