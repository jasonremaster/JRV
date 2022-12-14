<?php
    class Jrv extends Conectar{

        /* TODO: Funcion de login y generacion de session */

        public function login(){
            $conectar=parent::conexion();
            parent::set_names();
            if(isset($_POST["enviar"])){
                $correo = $_POST["usu_correo"];
                $pass = $_POST["usu_pass"];
                $rol = $_POST["rol_id"];
                if(empty($correo) and empty($pass)){
                    header("Location:".conectar::ruta()."index.php?m=2");
					exit();
                }else{
                    $sql = "SELECT * FROM tm_usuario WHERE usu_correo=? and usu_pass=MD5(?) and rol_id=? and est=1";
                    $stmt=$conectar->prepare($sql);
                    $stmt->bindValue(1, $correo);
                    $stmt->bindValue(2, $pass);
                    $stmt->bindValue(3, $rol);
                    $stmt->execute();
                    $resultado = $stmt->fetch();
                    if (is_array($resultado) and count($resultado)>0){
                        $_SESSION["usu_id"]=$resultado["usu_id"];
                        $_SESSION["usu_nom"]=$resultado["usu_nom"];
                        $_SESSION["usu_ape"]=$resultado["usu_ape"];
                        $_SESSION["rol_id"]=$resultado["rol_id"];
                        if($_SESSION["rol_id"]==3){
                            header("Location:".conectar::ruta()."view/AdminPanel/index.php");
                            exit(); 
                        }
                        else{
                        header("Location:".Conectar::ruta()."view/Home/");
                        exit(); 
                        }
                    }else{
                        header("Location:".Conectar::ruta()."index.php?m=1");
                        exit();
                    }
                }
            }
        }
        //Verifica si cedula ya existe en la base de datos
        public function checkusuario(){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="SELECT FROM tm_usuario WHERE usu_telf=?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$_POST["usu_telf"]);
            $sql->execute();
            if ($resultado=$sql->fetch>1){
                return true;
            }
            

        }

        public function check_correo(){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="SELECT FROM tm_usuario WHERE usu_correo=?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$_POST["usu_correo"]);
            $sql->execute();
            if ($resultado=$sql->fetch>1){
                return true;
            }
            
        }
        /* TODO:Insert */
        public function insert_usuario($usu_nom,$usu_ape,$usu_correo,$usu_pass,$rol_id,$usu_telf){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="INSERT INTO tm_usuario (usu_id, usu_nom, usu_ape, usu_correo, usu_pass, rol_id, usu_telf, fech_crea, fech_modi, fech_elim, est) VALUES (NULL,?,?,?,MD5(?),?,?,now(), NULL, NULL, '1');";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $usu_nom);
            $sql->bindValue(2, $usu_ape);
            $sql->bindValue(3, $usu_correo);
            $sql->bindValue(4, $usu_pass);
            $sql->bindValue(5, $rol_id);
            $sql->bindValue(6, $usu_telf);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }
        //***************************************    */

        //FUNCIONES JRV
        //FUNCIONES JRV 

        public function insert_jrv($jrv_nom,$jrv_cant,$jrv_usu){
            $conectar= parent::Conexion();
            parent::set_names();
            $sql="INSERT INTO jrv (jrv_id,jrv_nom, jrv_cant, jrv_usu) VALUES (null, ?,?,?);";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $jrv_nom);
            $sql->bindValue(2, $jrv_cant);
            $sql->bindValue(3, $jrv_usu);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function update_jrv($jrv_nom, $jrv_cant,$jrv_usu,$jrv_sexo,$jrv_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE jrv set
                jrv_nom = ?,
                jrv_cant = ?,
                jrv_usu = ?,
                jrv_sexo= ?,
                WHERE
                jrv_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $jrv_nom);
            $sql->bindValue(2, $jrv_cant);
            $sql->bindValue(3, $jrv_usu);
            $sql->bindValue(4, $jrv_sexo);
            $sql->bindValue(5, $jrv_id);

            $sql->execute();
            return $resultado=$sql->fetchAll();
        }
        //para comprobar si existe por nombre
        public function get_jrv_nombre($jrv_nom){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM jrv WHERE jrv_nom=?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$_POST["jrv_nom"]);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }
        //listar jntas
        public function get_juntas(){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM jrv";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

         /* TODO:Registro x id */
         public function get_junta_x_id($jrv_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="call sp_get_jrv_id(?)";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $jrv_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }
//FUNCIONES JRV
        //***************************************    */



        /* TODO:Update */
        public function update_usuario($usu_id,$usu_nom,$usu_ape,$usu_correo,$usu_pass,$rol_id,$usu_telf){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE tm_usuario set
                usu_nom = ?,
                usu_ape = ?,
                usu_correo = ?,
                usu_pass = ?,
                rol_id = ?,
                usu_telf = ?
                WHERE
                usu_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $usu_nom);
            $sql->bindValue(2, $usu_ape);
            $sql->bindValue(3, $usu_correo);
            $sql->bindValue(4, $usu_pass);
            $sql->bindValue(5, $rol_id);
            $sql->bindValue(6, $usu_telf);
            $sql->bindValue(7, $usu_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        /* TODO:Delete */
        public function delete_usuario($usu_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="call sp_del_usuario(?)";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $usu_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }
        public function get_usu_data($usu_telf){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM tm_usuario WHERE usu_telf=?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $usu_telf);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        /* TODO:Todos los registros */
        public function get_usuario(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="call sp_l_usuario_01()";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        /* TODO: Obtener registros de usuarios segun rol 2 */
        public function get_usuario_x_rol(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM tm_usuario where est=1 and rol_id=2";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function get_usuario_telf($usu_telf){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM tm_usuario where usu_telf=?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$usu_telf);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function get_usuario_correo($usu_correo){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM tm_usuario where usu_correo=?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$usu_correo);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }
        

        /* TODO:Registro x id */
        public function get_usuario_x_id($usu_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="call sp_l_usuario_02(?)";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $usu_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        /* TODO: Total de registros segun usu_id */
        public function get_usuario_total_x_id($usu_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT COUNT(*) as TOTAL FROM tm_ticket where usu_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $usu_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        /* TODO: Total de Tickets Abiertos por usu_id */
        public function get_usuario_totalabierto_x_id($usu_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT COUNT(*) as TOTAL FROM tm_ticket where usu_id = ? and tick_estado='Abierto'";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $usu_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        /* TODO: Total de Tickets Cerrado por usu_id */
        public function get_usuario_totalcerrado_x_id($usu_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT COUNT(*) as TOTAL FROM tm_ticket where usu_id = ? and tick_estado='Cerrado'";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $usu_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        /* TODO: Total de Tickets por categoria segun usuario */
        public function get_usuario_grafico($usu_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT tm_categoria.cat_nom as nom,COUNT(*) AS total
                FROM   tm_ticket  JOIN  
                    tm_categoria ON tm_ticket.cat_id = tm_categoria.cat_id  
                WHERE    
                tm_ticket.est = 1
                and tm_ticket.usu_id = ?
                GROUP BY 
                tm_categoria.cat_nom 
                ORDER BY total DESC";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $usu_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        /* TODO: Actualizar contrase??a del usuario */
        public function update_usuario_pass($usu_id,$usu_pass){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE tm_usuario
                SET
                    usu_pass = MD5(?)
                WHERE
                    usu_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $usu_pass);
            $sql->bindValue(2, $usu_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

    }
