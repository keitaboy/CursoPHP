<?php
require '../../Modelo/modelo_usuario.php';

    $MU = new Modelo_Usuario;
    $idUsuario = htmlspecialchars($_POST['idUsuario'], ENT_QUOTES, 'UTF-8');
    $rol = htmlspecialchars($_POST['rol'], ENT_QUOTES, 'UTF-8');
    $consulta = $MU->Modificar_Datos_Usuario($idUsuario,$rol);
    echo $consulta;
?>