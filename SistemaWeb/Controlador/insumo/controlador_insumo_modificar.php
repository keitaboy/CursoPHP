<?php

require '../../Modelo/modelo_insumo.php';
$MI = new Modelo_Insumo();
$id = htmlspecialchars($_POST['id'],ENT_QUOTES,'UTF-8');
$insumoactual = htmlspecialchars($_POST['inActual'],ENT_QUOTES,'UTF-8');
$insumonuevo = htmlspecialchars($_POST['inNuevo'],ENT_QUOTES,'UTF-8');
$stock = htmlspecialchars($_POST['st'],ENT_QUOTES,'UTF-8');
$estatus = htmlspecialchars($_POST['es'],ENT_QUOTES,'UTF-8');
$item = htmlspecialchars($_POST['item'], ENT_QUOTES, 'UTF-8');
$consulta = $MI->Modificar_Insumo($id,$insumoactual,$insumonuevo,$stock,$estatus,$item);
echo $consulta;
?>