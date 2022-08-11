<?php
      require '../../model/model_tramite_area.php';
      $MU = new Modelo_TramiteArea();//Instaciamos
    //DATOS DEL REMIENTE
    $iddo = strtoupper(htmlspecialchars($_POST['iddo'],ENT_QUOTES,'UTF-8'));
    $orig = strtoupper(htmlspecialchars($_POST['orig'],ENT_QUOTES,'UTF-8'));
    $dest = strtoupper(htmlspecialchars($_POST['dest'],ENT_QUOTES,'UTF-8'));
    $desc = strtoupper(htmlspecialchars($_POST['desc'],ENT_QUOTES,'UTF-8'));
    $idusu = strtoupper(htmlspecialchars($_POST['idusu'],ENT_QUOTES,'UTF-8'));
    $tipo = strtoupper(htmlspecialchars($_POST['tipo'],ENT_QUOTES,'UTF-8'));

    $nombrearchivo = strtoupper(htmlspecialchars($_POST['nombrearchivo'],ENT_QUOTES,'UTF-8'));
    if(isset($nombrearchivo)){
        $ruta="";
    }else{
        $ruta='controller/tramite_area/documentos/'.$nombrearchivo;
    }
    
    $consulta = $MU->Registrar_Tramite($iddo,$orig,$dest,$desc,$idusu,$ruta,$tipo);
    echo $consulta;
    if($consulta==1){
        if(!isset($nombrearchivo)){
            if(move_uploaded_file($_FILES['archivoobj']['tmp_name'],"documentos/".$nombrearchivo));
        }
    }

?>