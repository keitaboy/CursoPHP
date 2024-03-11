<?php
require '../../Modelo/modelo_usuario.php';

$MU = new Modelo_Usuario();
$idUsuario = htmlspecialchars($_POST['idUsuario'], ENT_QUOTES, 'UTF-8');
$contraBD = htmlspecialchars($_POST['contraBD'], ENT_QUOTES, 'UTF-8');
$contraEscrita = htmlspecialchars($_POST['contraEscrita'], ENT_QUOTES, 'UTF-8');
$contraNueva = password_hash($_POST['contraNueva'], PASSWORD_DEFAULT, ['cost'=>10]);
if(password_verify($contraEscrita, $contraBD)) {
    $consulta = $MU->Modificar_Contra_Usuario($idUsuario, $contraNueva);
    echo $consulta;
}else{
    echo 2;
}