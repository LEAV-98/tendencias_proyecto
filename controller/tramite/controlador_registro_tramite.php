<?php
      require '../../model/model_tramite.php';
      $MU = new Modelo_Tramite();//Instaciamos
    //DATOS DEL REMIENTE
    $dni = strtoupper(htmlspecialchars($_POST['dni'],ENT_QUOTES,'UTF-8'));
    $nom = strtoupper(htmlspecialchars($_POST['nom'],ENT_QUOTES,'UTF-8'));
    $apt = strtoupper(htmlspecialchars($_POST['apt'],ENT_QUOTES,'UTF-8'));
    $apm = strtoupper(htmlspecialchars($_POST['apm'],ENT_QUOTES,'UTF-8'));
    $cel = strtoupper(htmlspecialchars($_POST['cel'],ENT_QUOTES,'UTF-8'));
    $ema = strtoupper(htmlspecialchars($_POST['ema'],ENT_QUOTES,'UTF-8'));
    $dir = strtoupper(htmlspecialchars($_POST['dir'],ENT_QUOTES,'UTF-8'));
    $vpresentacion = strtoupper(htmlspecialchars($_POST['vpresentacion'],ENT_QUOTES,'UTF-8'));  
    $ruc = strtoupper(htmlspecialchars($_POST['ruc'],ENT_QUOTES,'UTF-8'));   
    $raz = strtoupper(htmlspecialchars($_POST['raz'],ENT_QUOTES,'UTF-8'));

    //DATOS DEL DOCUMENTO 
    $arp = strtoupper(htmlspecialchars($_POST['arp'],ENT_QUOTES,'UTF-8'));
    $ard = strtoupper(htmlspecialchars($_POST['ard'],ENT_QUOTES,'UTF-8'));
    $tip = strtoupper(htmlspecialchars($_POST['tip'],ENT_QUOTES,'UTF-8'));
    $ndo = strtoupper(htmlspecialchars($_POST['ndo'],ENT_QUOTES,'UTF-8'));
    $asu = strtoupper(htmlspecialchars($_POST['asu'],ENT_QUOTES,'UTF-8'));
    $nombrearchivo = strtoupper(htmlspecialchars($_POST['nombrearchivo'],ENT_QUOTES,'UTF-8'));
    $fol = strtoupper(htmlspecialchars($_POST['fol'],ENT_QUOTES,'UTF-8'));
    $idusu = strtoupper(htmlspecialchars($_POST['idusu'],ENT_QUOTES,'UTF-8'));

    $ruta='controller/tramite/documentos/'.$nombrearchivo;
    $consulta = $MU->Registrar_Tramite($dni,$nom,$apt,$apm,$cel,$ema,$dir,$vpresentacion,$ruc,$raz,$arp,$ard,$tip,$ndo,$asu,$ruta,$fol,$idusu);
    if($consulta){
        if($nombrearchivo !=""){
            
            move_uploaded_file($_FILES['archivoobj']['tmp_name'],"documentos/".$nombrearchivo);
        }
        echo $consulta;
    }
    

?>