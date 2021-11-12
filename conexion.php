<?php
    class Conexion extends PDO{
        private $hostBD = "localhost";
        private $nombre = "DoctorReserva";
        private $usuario = "root";
        private $pssw = "";

        public function __construct()
        {
            try {
                parent::__construct('mysql:host=' .$this->hostBD. ';dbname=' .$this->nombre. ';charset=utf8' ,$this->usuario, $this->pssw, array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
            } catch (Exception $e) {
                echo 'Error: ' .$e->getMessage();
                exit;
            }
        }
    }
?>