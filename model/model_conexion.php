<?php
class conexionBD
{

    private $pdo;
    public function conexionPDO(){
        $host       = "localhost";
        $usuario    = "root";
        $contrasena = "";
        $bdName     = "sistema_tramite";
        try {
            $pdo = new PDO("mysql:host=$host;dbname=$bdName",$usuario,$contrasena);
            $pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo ->exec("set names utf8");
            return $pdo;

        } catch (PDOException $e) {
            echo 'Falló la conexión: ' . $e->getMessage();
        }
    }

    function cerrar_conexion(){
        $this->$pdo=null;
    }
}

?>