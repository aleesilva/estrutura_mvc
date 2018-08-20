<?php
/**
 * Created by PhpStorm.
 * User: alees
 * Date: 19/08/2018
 * Time: 17:19
 */

class CriptografiaController extends Controller
{
    protected $_dados = array();

    public function index(){
        $this->_dados['titulo'] = 'Criptografar Textos';
        $this->view_load('criptografar_textos',$this->_dados);
    }
    public function criptografarTexto(){
        $_tipo  =  $this->input('tipo',FILTER_FORCE_ARRAY);
        $_texto = $this->input('texto');
        $_deslocamento = $this->input('deslocamento');
        $this->_dados['titulo'] = 'Criptografar Textos';
        $this->_dados['deslocamento'] = $_deslocamento;
        if($_tipo[0] == 0 ){
            $this->_dados['crypt'] = $this->criptografar($_texto,$_deslocamento);
            $this->view_load('criptografar_textos',$this->_dados);
        }else{
            $this->_dados['decrypt'] = $this->descriptografar($_texto,$_deslocamento);
            $this->view_load('criptografar_textos',$this->_dados);
        }

    }
}