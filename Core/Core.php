<?php
/**
 * Created by PhpStorm.
 * User: alees
 * Date: 18/08/2018
 * Time: 20:30
 */

class Core
{
    private $_action_padrao = 'index';
    public function exec(){
        $_url = explode('index.php',$_SERVER['PHP_SELF']);
        $_url = end($_url);
        $_params = array();
        if(!empty($_url)){
            $_url  = explode('/',$_url);
            array_shift($_url);
            $_controller       = $_url[0].'Controller';
            array_shift($_url);
                if(isset($_url[0])){
                    $_controller_action = $_url[0];
                    array_shift($_url);
                }else{
                    $_controller_action = $this->_action_padrao;
                }
                if(count($_url)> 0){
                    $_params = $_url;
                }
        }else{
            $_controller        = 'DispositivosController';
            $_controller_action = $this->_action_padrao;

        }
        require_once 'core/Controller.php';

        $_current_controller = new $_controller();
        call_user_func_array(array($_current_controller,$_controller_action),$_params);
    }
}