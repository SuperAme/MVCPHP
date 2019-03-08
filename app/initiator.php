<?php 
    require_once 'config/config.php';

    require_once 'libraries/Database.php';
    require_once 'libraries/Controller.php';
    require_once 'libraries/Core.php';

    //Autoload php
    spl_autoload_register(function($nombreClase){
        require_once 'libraries/'.$nombreClase.'.php';
    });
    
?>