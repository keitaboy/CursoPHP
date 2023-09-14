<?php
session_start();
$_SESSION["Usuario"]="Daniel";
$_SESSION["Estado"]="Logueado";
echo "Sesion Iniciada".":<br/>";
echo "Usuario: ".$_SESSION["Usuario"]." se encuentra: ".$_SESSION["Estado"];
?>