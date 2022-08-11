<?php
    require '../../model/model_tramite.php';
    $MU = new Modelo_Tramite();//Instaciamos
    $consulta = $MU->Cargara_Select_Tipo();
    echo json_encode($consulta);

?>