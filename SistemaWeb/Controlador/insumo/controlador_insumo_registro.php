<?php

require '../../Modelo/modelo_insumo.php';
$MI = new Modelo_Insumo();
$insumo = htmlspecialchars($_POST['in'],ENT_QUOTES,'UTF-8');
$stock = htmlspecialchars($_POST['st'],ENT_QUOTES,'UTF-8');
$estatus = htmlspecialchars($_POST['es'],ENT_QUOTES,'UTF-8');
$item = htmlspecialchars($_POST['item'], ENT_QUOTES, 'UTF-8');
$consulta = $MI->Registrar_Insumo($insumo,$stock,$estatus,$item);
echo $consulta;
?>