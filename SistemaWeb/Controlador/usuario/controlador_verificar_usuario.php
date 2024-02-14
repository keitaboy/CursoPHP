<?php
require '../../Modelo/modelo_usuario.php';

$MU = new Modelo_Usuario;
if (isset($_POST['user']) && isset($_POST['pass'])) {
   $usuario = htmlspecialchars($_POST['user'], ENT_QUOTES, 'UTF-8');
   $contra = htmlspecialchars($_POST['pass'], ENT_QUOTES, 'UTF-8');
   
   // Agregar mensajes de consola este es el console log
   echo json_encode(["log_user" => $usuario, "log_pass" => $contra]);
   error_log("Valor de \$usuario: " . $usuario);
    error_log("Valor de \$contra: " . $contra);

   $consulta = $MU->VerificarUsuario($usuario, $contra);

   if ($consulta !== false && count($consulta) > 0) {
       echo json_encode($consulta);
   } else {
       $jsonError = json_last_error();
       echo json_encode(["error" => "Usuario y/o contraseña incorrecta", "json_error" => $jsonError]);
   }
} else {
   echo json_encode(["error" => "Datos de usuario y/o contraseña no proporcionados"]);
}