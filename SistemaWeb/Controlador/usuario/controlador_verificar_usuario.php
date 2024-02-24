<?php
require '../../Modelo/modelo_usuario.php';

$MU = new Modelo_Usuario;
//-------------------Validacion de usuarios-------------------//
if (isset($_POST['user']) && isset($_POST['pass'])) {
    $usuario = htmlspecialchars($_POST['user'], ENT_QUOTES, 'UTF-8');
    $contra = htmlspecialchars($_POST['pass'], ENT_QUOTES, 'UTF-8');
    $consulta = $MU->VerificarUsuario($usuario, $contra);
    $data = json_encode($consulta);
//-------------------Si recibe datos de la base de datos-------------------//
    if ($consulta !== false && count($consulta) > 0) {
        //echo json_encode($consulta);
        echo $data;
    } 
//-------------------Si no recibe datos de la base de datos-------------------//
    else {
        $jsonError = json_last_error();
        echo json_encode(["error" => "Usuario y/o contraseña incorrecta", "json_error" => $jsonError]);
    }
} 
//-------------------Si no valida el usuario-------------------//
else {
    echo json_encode(["error" => "Datos de usuario y/o contraseña no proporcionados"]);
}