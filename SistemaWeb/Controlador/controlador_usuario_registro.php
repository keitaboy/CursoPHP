<?php
require '../../Modelo/modelo_usuario.php';

    $MU = new Modelo_Usuario;
    $usuario = htmlspecialchars($_POST['usuario'], ENT_QUOTES, 'UTF-8');
    $contra = password_hash($_POST['contrasena'],PASSWORD_DEFAULT,['cost'=>10]);
    $usuario = htmlspecialchars($_POST['rol'], ENT_QUOTES, 'UTF-8');
    $rol = $MU->Registrar_Usuario($usuario, $contra,$rol);
    echo $consulta;
?>