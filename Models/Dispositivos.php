<?php
/**
 * Created by PhpStorm.
 * User: Aleson França
 * Date: 18/08/2018
 * Time: 19:43
 */
class Dispositivos extends Model{
    private $_sql;
    protected $_table_name;

    public function Select(){
        $this->_table_name = $this->GetPrefixTable().__CLASS__;
        $_ret = array();
        try{
            $this->_sql = "SELECT * FROM ".$this->_table_name;
            $this->_sql = $this->_db->query($this->_sql);
            $_ret = $this->_sql->fetchAll();
            if(count($_ret) > 0 ){
                return $_ret;
            }else{
                return $_ret;
            }
        }catch (PDOException $_pdo_exception) {
            echo 'Erro ao executar query =>' . $_pdo_exception->getMessage();
        }
    }

    public function SelectById($_id){
        $this->_table_name = $this->GetPrefixTable().__CLASS__;
        if ($_id === null){
            return false;
        }
        try{
            $_ret = array();
            $this->_sql = "SELECT * FROM ".$this->_table_name." WHERE ID = {$_id}";
            $this->_sql = $this->_db->query($this->_sql);
            $_ret = $this->_sql->fetch(PDO::FETCH_ASSOC);
            if(count($_ret) > 0){
                return $_ret;
            }else{
                return $_ret;
            }
        }catch (PDOException $_pdo_exception) {
            echo 'Erro ao executar query =>' . $_pdo_exception->getMessage();
        }

    }

    public function gravarDispositivo($_dados){
            $this->_table_name = $this->GetPrefixTable().__CLASS__;
            if($_dados === false || $_dados === null){
                return false;
            }
            try{
                if($_dados['id'] !== '' ){
                    $_ret = $this->SelectById($_dados['id']);
                    if(count($_ret) > 0 ){
                        try{
                            $this->_sql = "UPDATE {$this->_table_name} SET hostname = :hostname,
                                        ip = :ip, tipo = :tipo , fabricante = :fabricante WHERE ID = :id";
                            $this->_sql = $this->_db->prepare($this->_sql);
                            $this->_sql->execute(array(':hostname' => $_dados['hostname'],':ip' => $_dados['ip'],
                                ':tipo' => $_dados['tipo'], ':fabricante' => $_dados['fabricante'],':id' => $_dados['id']));
                        }catch (PDOException $_pdo_exception){
                            echo "erro ao executar query => ". $_pdo_exception->getMessage();
                        }
                    }
                }else{
                    $_id = mt_rand(0,2000);
                    $this->_sql  = "INSERT INTO {$this->_table_name} VALUES(:id,:hostname,:ip,:tipo,:fabricante)";
                    $this->_sql  = $this->_db->prepare($this->_sql);
                    $this->_sql->execute(array(':id' => $_id , ':hostname' => $_dados['hostname'],':ip' => $_dados['ip'],
                        ':tipo' => $_dados['tipo'], ':fabricante' => $_dados['fabricante']));
                }
            }catch (PDOException $_pdo_exception) {
                echo 'Erro ao executar query =>' . $_pdo_exception->getMessage();
            }

    }

    public function delete($_id){
        $this->_table_name =  $this->GetPrefixTable().__CLASS__;
        try{
            $this->_sql = "DELETE FROM {$this->_table_name} WHERE ID = :id";
            $this->_sql = $this->_db->prepare($this->_sql);
            $this->_sql->execute(array(':id'=>$_id));
        }catch (PDOException $_pdo_exception){
            echo 'Erro ao Executar query =>'.$_pdo_exception->getMessage();
        }
    }
}