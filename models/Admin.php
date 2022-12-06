<?php
    class Admin extends Conectar{
        
        public function get_categoria(){
            $conectar= parent::conexion();
            parent::set_names();
            $backup_file ="bd" . date("Y-m-d-H-i-s") . '.gz';
            $sql="mysqldump --opt". "test_db | gzip > $backup_file";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }
    }