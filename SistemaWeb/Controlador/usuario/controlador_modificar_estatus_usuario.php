<?php
require '../../Modelo/modelo_usuario.php';

    $MU = new Modelo_Usuario;
    $idUsuario = htmlspecialchars($_POST['idUsuario'], ENT_QUOTES, 'UTF-8');
    $Status = htmlspecialchars($_POST['State'], ENT_QUOTES, 'UTF-8');
    $consulta = $MU->Modificar_Estatus_Usuario($idUsuario, $Status);
    echo $consulta;    