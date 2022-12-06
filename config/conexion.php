<?php
    session_start();
    date_default_timezone_set("America/Guayaquil");

    class Conectar{
        protected $dbh;

        protected function Conexion(){
            try {
                //produccion
				$conectar = $this->dbh = new PDO("mysql:local=localhost;dbname=u133367896_helpdesk","root","");
                //Produccion
               
				return $conectar;
			} catch (Exception $e) {
				print "¡Error BD!: " . $e->getMessage() . "<br/>";
				die();
			}
        }

        public function set_names(){
			return $this->dbh->query("SET NAMES 'utf8'");
        }

        public static function ruta(){
            //Local
			return "http://localhost/PERSONAL_Helpdesk/";
            //Produccion
            //return "https://online.secretarialm.com/";
		}
 public function disponibilidad()
    {
        $abierto = 8;
        $cerrado = 18;
        $dia = (DATE('N'));
        $hora = (DATE('G'));

        echo date('m-D-Y h:i:s a', time());  
        $disponible = 0;

        if ($dia < 7) {
            $horario = $hora >= $abierto && $hora < $cerrado;
            if (intval($horario) == 1) {
                $disponible = 1;
            } else {
                $disponible = 0;
            }
        }
        return $disponible;
    }

    }
?>
