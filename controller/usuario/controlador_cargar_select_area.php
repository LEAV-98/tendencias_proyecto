<?php
    require '../../model/model_usuario.php';
    $MU = new Modelo_Usuario();//Instaciamos
    $consulta = $MU->Cargara_Select_Area();
    echo json_encode($consulta);

?>