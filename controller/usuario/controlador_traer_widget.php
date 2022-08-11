<?php
    require '../../model/model_usuario.php';
    $MU = new Modelo_Usuario();//Instaciamos
    $consulta = $MU->Traer_Widget();
    echo json_encode($consulta);

?>