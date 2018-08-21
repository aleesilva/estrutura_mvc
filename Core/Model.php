<?php
/**
 * Created by PhpStorm.
 * User: Aleson França
 * Date: 18/08/2018
 * Time: 14:39
 */
class Model  {
    protected $_db;
    public function __construct()
    {
       $this->Conectar();
    }
    private function Conectar(){
            global $CONFIG;
            $_dns = $CONFIG['DBTYPE'].':'.'host='.$CONFIG['HOST'].';'.'dbname='.$CONFIG['DBNAME'];
            $_user = $CONFIG['USER'];
            $_password = $CONFIG['DBPASSWORD'];
            try{
                $this->_db = new PDO($_dns, $_user, $_password);
            }catch (PDOException $_exception) {
                throw new Exception("Error:" . $_exception->getMessage());
            }
        return $this->_db;
    }

     protected function GetPrefixTable(){
        return 'mt4_';
    }


}