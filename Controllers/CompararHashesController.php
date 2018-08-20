<?php
/**
 * Created by PhpStorm.
 * User: alees
 * Date: 20/08/2018
 * Time: 10:20
 */

class CompararHashesController extends Controller
{
    private $_dados;
    public function index(){
        $this->_dados['titulo'] = 'Gerar Hash';
        $this->_dados['hidden'] = 'hidden';
        $this->_dados['btn_text'] = 'Gerar Hash';
        $this->_dados['url']    = 'http://localhost/teste_mt4/index.php/CompararHashes/gerar_hash';
        $this->view_load('comparacao_hashes',$this->_dados);
    }

    public function gerar_hash(){
        $_hash = $this->input('hash1');
        $this->_dados['url']    = 'http://localhost/teste_mt4/index.php/CompararHashes/comparar_hashs';
        $this->_dados['titulo'] =  'Comparar Hash';
        $this->_dados['btn_text'] = 'Comparar Hash';
        $this->_dados['hash'] = $this->hash_generate($_hash);
        $this->view_load('comparacao_hashes',$this->_dados);
    }

    public function comparar_hashs(){
        $_hash1 = trim($this->input('hash1'));
        $_hash2 = trim($this->input('hash2'));
        if(isset($_hash1) && $_hash1 !== '' && isset($_hash2) && $_hash2 !== ''){
            $_ret = hash_equals($_hash1,$_hash2);
            if($_ret !== false){
                $this->_dados['titulo'] = 'Gerar Hash';
                $this->_dados['btn_text'] = 'Gerar Hash';
                $this->_dados['hidden'] = 'hidden';
                $this->_dados['message_success'] = 'As hash Comparadas são iguais';
                $this->_dados['url']    = 'http://localhost/teste_mt4/index.php/CompararHashes/gerar_hash';
                $this->view_load('comparacao_hashes',$this->_dados);
            }else{
                $this->_dados['hash1'] = $_hash1;
                $this->_dados['hash2'] = $_hash2;
                $this->_dados['titulo'] = 'Comparar Hash';
                $this->_dados['btn_text'] = 'Comparar Hash';
                $this->_dados['message_danger'] = 'As hash Comparas não são identicas, verifique se não a espaços';
                $this->view_load('comparacao_hashes',$this->_dados);
            }
        }

    }

}