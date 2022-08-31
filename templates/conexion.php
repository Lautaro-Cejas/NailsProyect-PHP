<?php
    class Conexion{

        private $usuario = "root";
        private $clavebd = '';
        private $host = 'localhost';
        private $bd = 'mochi';
        private $puerto = '3307';
        private $cx;

        public function __construct(){
            try {
                $this->cx = new PDO("mysql:host=".$this->host.";dbname=".$this->bd.";port=".$this->puerto,$this->usuario,$this->clavebd);
                $this->cx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);     
            } catch (PDOException $e) {
                echo "Error: ".$e->getMessage();
            }
        }
        
        public function ejecutar($sql){ //insertar/eliminar/actualizar
            $this->cx->exec($sql);
            return $this->cx->lastInsertId();
        }

        public function consultar($sql){
            $sentencia=$this->cx->prepare($sql);
            $sentencia->execute();
            return $sentencia->fetchAll();
        }

    }
