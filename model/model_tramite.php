<?php
    require_once  'model_conexion.php';

    class Modelo_Tramite extends conexionBD{


        public function Registrar_Tramite($dni,$nom,$apt,$apm,$cel,$ema,$dir,$vpresentacion,$ruc,$raz,$arp,$ard,$tip,$ndo,$asu,$ruta,$fol,$idusu){
            $c = conexionBD::conexionPDO();
            $sql = "CALL SP_REGISTRAR_TRAMITE(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $arreglo = array();
            $query  = $c->prepare($sql);
            $query -> bindParam(1,$dni);
            $query -> bindParam(2,$nom);
            $query -> bindParam(3,$apt);
            $query -> bindParam(4,$apm);
            $query -> bindParam(5,$cel);
            $query -> bindParam(6,$ema);
            $query -> bindParam(7,$dir);
            $query -> bindParam(8,$vpresentacion);
            $query -> bindParam(9,$ruc);
            $query -> bindParam(10,$raz);
            $query -> bindParam(11,$arp);
            $query -> bindParam(12,$ard);
            $query -> bindParam(13,$tip);
            $query -> bindParam(14,$ndo);
            $query -> bindParam(15,$asu);
            $query -> bindParam(16,$ruta);
            $query -> bindParam(17,$fol);   
            $query -> bindParam(18,$idusu);            
            $query->execute();
            if($row = $query->fetchColumn()){
                    return $row;
            }
            conexionBD::cerrar_conexion();
        }

        public function Modificar_Usuario($id,$ide,$ida,$rol){
            $c = conexionBD::conexionPDO();
            $sql = "CALL SP_MODIFICAR_USUARIO(?,?,?,?)";
            $arreglo = array();
            $query  = $c->prepare($sql);
            $query -> bindParam(1,$id);
            $query -> bindParam(2,$ide);
            $query -> bindParam(3,$ida);
            $query -> bindParam(4,$rol);
            $resul = $query->execute();
            if($resul){
                return 1;
            }else{
                return 0;
            }
            conexionBD::cerrar_conexion();
        }    
        



        public function Listar_Tramite(){
            $c = conexionBD::conexionPDO();
            $sql = "CALL SP_LISTAR_TRAMITE()";
            $arreglo = array();
            $query  = $c->prepare($sql);
            $query->execute();
            $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
            foreach($resultado as $resp){
                $arreglo["data"][]=$resp;
            }
            return $arreglo;
            conexionBD::cerrar_conexion();
        }

        public function Listar_Tramite_Seguimiento($id){
            $c = conexionBD::conexionPDO();
            $sql = "CALL SP_LISTAR_TRAMITE_SEGUIMIENTO(?)";
            $arreglo = array();
            $query  = $c->prepare($sql);
            $query -> bindParam(1,$id);
            $query->execute();
            $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
            foreach($resultado as $resp){
                $arreglo["data"][]=$resp;
            }
            return $arreglo;
            conexionBD::cerrar_conexion();
        }

        public function Cargara_Select_Tipo(){
            $c = conexionBD::conexionPDO();
            $sql = "CALL SP_CARGAR_SELECT_TIPO()";
            $arreglo = array();
            $query  = $c->prepare($sql);
            $query->execute();
            $resultado = $query->fetchAll();
            foreach($resultado as $resp){
                $arreglo[]=$resp;
            }
            return $arreglo;
            conexionBD::cerrar_conexion();
        }


    }

?>