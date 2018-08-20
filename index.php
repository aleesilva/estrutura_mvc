<?php

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);
require 'Con_Config.php';
spl_autoload_register(function ($_class){
   if(strpos($_class,'Controller') > -1){
       if(file_exists('Controllers/'.$_class.'.php')){
           require_once 'Controllers/'.$_class.'.php';
       }
   }elseif (file_exists('Models/'.$_class.'.php')){
            require_once 'Models/'.$_class.'.php';
   }else {
            require_once 'Core/'.$_class.'.php';
   }
});

$_core = new Core();
$_core->exec();