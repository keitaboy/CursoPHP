<?php
require '../../Modelo/modelo_usuario.php';

$MU = new Modelo_Usuario;
$usuario = htmlspecialchars($_POST['usuario'], ENT_QUOTES, 'UTF-8');
$contraBD = htmlspecialchars($_POST['contraBD'], ENT_QUOTES, 'UTF-8');
$contraEscrita = htmlspecialchars($_POST['contraEscrita'], ENT_QUOTES, 'UTF-8');
$contraNueva = password_hash($_POST['contraNueva'], PASSWORD_DEFAULT, ['cost'=>10]);
if(password_verify($contraEscrita, $contraBD)) {
    $consulta = $MU->Modificar_Contra_Usuario($usuario, $contraNueva);
    echo $consulta;
}else{
    echo 2;
}
