<?php
/**
 * Created by PhpStorm.
 * User: alees
 * Date: 18/08/2018
 * Time: 20:19
 */
class DispositivosController extends Controller
{
    public function index(){
        $_dispositivos = $this->getObject('Dispositivos');
        $_dados['dispositivos'] = $_dispositivos->Select();
        $this->view_load('index',$_dados);
    }
    public function form_dispositivo($_id =null){
        $_dados = array();
        $_dispositivos = new Dispositivos();
        if(isset($_id) && $_id !== 'null'){
            $_dados['titulo']       = 'Alterar Dispositivo';
            $_dados['dispositivo']  = $_dispositivos->SelectById($_id);
            return $this->view_load('form_dispositivo',$_dados);
        }else{
            $_dados['titulo']       = 'Cadastrar Dispositivo';
            $_dados['dispositivo']  = '';
            return $this->view_load('form_dispositivo',$_dados);
        }
    }
    protected function getDispositivo($_id){
        return $_dispositivo = (new Dispositivos)->SelectById($_id);
    }
    public function salvarDispositivo(){
        $_dados = array(
                'id'         => $this->input('id'),
                'hostname'   => $this->input('hostname'),
                'ip'         => $this->input('ip'),
                'tipo'       => $this->input('tipo'),
                'fabricante' => $this->input('fabricante')

        );
        $_dispositivo = new Dispositivos();
        if($_ret = $_dispositivo->gravarDispositivo($_dados) !== false){
            if($_ret === true){
                $_dados['dispositivos'] = $_dispositivo->Select();
                $_dados['message_success'] = 'Dispositivo Cadastrado Com Sucesso';
                $this->view_load('index',$_dados);
            }
        }else{
            $_dados['dispositivos'] = $_dispositivo->Select();
            $_dados['message_error'] = 'Erro Ao Cadastrar Dispositivo';
            $this->view_load('index',$_dados);
        }

    }
    public function apagarDespositivo($_id){
        $_dados = array();
        if(!isset($_id)){
            throw new Exception("Erro ao tentar apagar registro o id não foi preenchido");
        }
        $_dispositivo = new Dispositivos();
        if($_ret = $_dispositivo->delete($_id) !== false){
            $_dados['dispositivos'] = $_dispositivo->Select();
            $_dados['message_success'] = 'Dispositivo Deletado Com Sucesso';
            $this->view_load('index',$_dados);
        }else{
            $_dados['dispositivos'] = $_dispositivo->Select();
            $_dados['message_error'] = 'Erro Ao Tentar Deletar Dispositivo';
            $this->view_load('index',$_dados);
        }
    }
}