<?php
    class Semestre extends Conectar{

        /* TODO: Obtener todos los registros */
        public function get_semestre(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM tm_semestre WHERE est='1';";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function get_semestre_activo(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT sem_id FROM tm_semestre WHERE est='1' AND activo='1';";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchColumn();
        }
        public function get_nombre_semestre(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT sem_nom FROM tm_semestre WHERE est='1' AND activo='1';";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchColumn();
        }
        public function get_activo($sem_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT activo FROM tm_semestre WHERE sem_id=?;";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $sem_id);
            $sql->execute();
            return $resultado=$sql->fetchColumn();
        }
        /* TODO:Insert Registro*/
        public function insert_semestre($sem_nom,$activo){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="INSERT INTO tm_semestre (sem_id, sem_nom, est, activo) VALUES (NULL,?,'1',?);";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $sem_nom);
            $sql->bindValue(2, $activo);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }
        public function set_semestre_act($sem_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="call act_semestre(?);";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $sem_id);
            //$sql->bindValue(2, $sem_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();

        }
        public function set_semestre_inact($sem_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE tm_semestre SET activo = '0' WHERE sem_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $sem_id);
            //$sql->bindValue(2, $sem_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();

        }
        public function set_semestre_all(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="CALL desact_all_sem();";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }
        /* TODO:Update Registro*/
        public function update_semestre($sem_id,$sem_nom){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE tm_semestre set
                sem_nom = ?
                WHERE
                sem_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $sem_nom);
            $sql->bindValue(2, $sem_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        /* TODO:Delete Registro*/
        public function delete_semestre($sem_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE tm_semestre SET
                est = 0
                WHERE 
                sem_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $sem_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        /* TODO:Registro x id */
        public function get_semestre_x_id($sem_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM tm_semestre WHERE sem_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $sem_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

    }
?>