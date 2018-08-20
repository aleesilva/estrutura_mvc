<?php
/**
 * Created by PhpStorm.
 * User: alees
 * Date: 19/08/2018
 * Time: 16:31
 */

class ComandosController extends DispositivosController
{
    public function form_comandos($_id){
        $_dados['dispositivo']  = $this->getDispositivo($_id);
        $_dados['titulo'] = 'Enviar Comando Ao Dispositivo : '. $_dados['dispositivo']['hostname'];
        $this->view_load('enviar_comandos_dispositivo',$_dados);
    }
    public function enviarComandosDispositivo(){
        $_dados = array(
                            'ip'        => $this->input('ip'),
                            'usuario'   => $this->input('usuario'),
                            'senha'     => $this->input('senha'),
                            'comandos'  => $this->input('comandos')
                       );
        $_ip      = $_dados['ip'];
        $_usuario = $_dados['usuario'];
        $_senha   = $_dados['senha'];
        if($_ip !== '' && $_usuario !== ''){
            if(!$_ssh = @ssh2_connect($_ip)){
                 echo "Error ao tentar se conectar com o dispositvo de {$_ip}";
            }
            if(!ssh2_auth_password($_ssh,$_usuario,$_senha)){
                echo   "Falha de Autenticação";
            }
            $_stream =  ssh2_exec($_ssh,$_dados['comandos']);
            if($_stream === false){
                $_dados['message_error'] = "Error ao executar o comando {$_dados['comandos']}";
                $this->view_load('enviar_comandos_dispositivo',$_dados);
            }else{
                $_dados['message_success'] = "O Comando {$_dados['comandos']} foi executado com sucesso";
                $this->view_load('enviar_comandos_dispositivo',$_dados);
            }
        }
    }
}