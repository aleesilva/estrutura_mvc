<?php require 'env.php';
global $CONFIG;
$CONFIG = array();
if (ENVIRONMENT === 'DEV'){
    $CONFIG['DBTYPE'] = 'mysql';
    $CONFIG['DBNAME'] = 'teste_mt4';
    $CONFIG['HOST']   = 'localhost';
    $CONFIG['USER']   = 'root';
    $CONFIG['DBPASSWORD'] = '';
}else{
    $CONFIG['DBNAME'] = '';
    $CONFIG['HOST']   = '';
    $CONFIG['USER']   = '';
    $CONFIG['DBPASS'] = '';
}
