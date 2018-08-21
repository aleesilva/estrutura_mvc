<?php
/**
 * Created by PhpStorm.
 * User: alees
 * Date: 18/08/2018
 * Time: 20:16
 */

class Controller
{
    protected $_objeto;

    public function view_load($_name, $_dados = array())
    {
        extract($_dados);
        include 'Views/' . $_name . '.php';
    }

    protected function input($_nome, $_filter = null)
    {
        if (isset($_filter) && $_filter !== null) {
            return filter_input(INPUT_POST, $_nome, FILTER_DEFAULT, $_filter);
        } else {
            return filter_input(INPUT_POST, $_nome, FILTER_DEFAULT);
        }

    }

    private function converter($_texto)
    {
        $_texto1 = strtr(utf8_decode($_texto), utf8_decode('???????¥µÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýÿ+'), 'SOZsozYYuAAAAAAACEEEEIIIIDNOOOOOOUUUUYsaaaaaaaceeeeiiiionoooooouuuuyy-');
        return strtolower($_texto1);
    }

    protected function criptografar($_t, $_d)
    { // Função para criptografia
        // Define lista de caracteres do alfabeto

        $_a = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', ' ');
        $_converted = $this->converter($_t);
        $_b = str_split($_converted);
        $_num = strlen($_converted);
        $_max = count($_a) - 1;
        for ($_i = 0; $_i < $_num; ++$_i) {
            if ($_b[$_i] == in_array($_b[$_i], $_a)) {
                foreach ($_a as $_key => $_val) {
                    if ($_b[$_i] == $_val) {
                        $_c[$_val] = $_key;
                    }
                }
            }
        }
        $_last = '';
        for ($_i = 0; $_i < $_num; $_i++) {
            $_number = $_c[$_b[$_i]];
            if ($_number == '26') {
                $_last .= ' ';
            } else {
                if ($_d < 0) {
                    $_final = $_number + $_d;
                } else {
                    $_final = $_number + $_d;
                }
                if ($_final < 0) {
                    $_last .= $_a[$_final + $_max];
                } elseif ($_final > $_max - 1) {
                    $_last .= $_a[$_final - $_max];
                } else {
                    $_last .= $_a[$_final];
                }
            }

        }
        return $_last;
    }

    protected function descriptografar($_t, $_d)
    {
        // Define lista de caracteres do alfabeto
        $_a = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', ' ');
        $_converted = $this->converter($_t);
        $_b = str_split($_converted);
        $_num = strlen($_converted);
        $_max = count($_a) - 1;
        for ($_i = 0; $_i < $_num; ++$_i) {
            if ($_b[$_i] == in_array($_b[$_i], $_a)) {
                foreach ($_a as $_chave => $_valor) {
                    if ($_b[$_i] == $_valor) {
                        $_c[$_valor] = $_chave;
                    }
                }
            }
        }
        $_last = '';
        for ($_i = 0; $_i < $_num; $_i++) {
            $_number = $_c[$_b[$_i]];
            if ($_number == '26') {
                $_last .= ' ';
            } else {
                if ($_d < 0) {
                    $_final = $_number - $_d;
                } else {
                    $_final = $_number - $_d;
                }
                if ($_final < 0) {
                    $_last .= $_a[$_final + $_max];
                } elseif ($_final > $_max - 1) {
                    $_last .= $_a[$_final - $_max];
                } else {
                    $_last .= $_a[$_final];
                }
            }

        }
        return $_last; // Exibe o resultado final (letra por letra)
    }

    protected function getObject($_name)
    {
        if (isset($_name)) {
            $this->_objeto = new $_name;
        }
        return $this->_objeto;
    }

    protected function hash_generate($_hash){
        $_secret_key     = 'mt4';
        $_secret_iv      = 'mt4';
        $_encrypt_method = "AES-256-CBC";
        $_key            = hash( 'sha512', $_secret_key );
        $_iv             = substr(hash('sha512', $_secret_iv ),0, 16);
        $_ret = base64_encode(openssl_encrypt( $_hash, $_encrypt_method, $_key, 0, $_iv ) );

        if($_ret !== null){
            return $_ret;
        }else{
            throw new Exception("Não Foi possivel criptografar os dados");
        }

    }
}