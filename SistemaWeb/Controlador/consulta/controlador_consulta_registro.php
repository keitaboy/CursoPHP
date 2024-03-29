<?php

require '../../Modelo/modelo_consulta.php';
$MC = new Modelo_Consulta();
$idcita = htmlspecialchars($_POST['idcita'],ENT_QUOTES,'UTF-8');
$idinsumo = htmlspecialchars($_POST['idinsumo'],ENT_QUOTES,'UTF-8');
$cantinsumo= htmlspecialchars($_POST['cantinsumo'],ENT_QUOTES,'UTF-8');
$idservicio = htmlspecialchars($_POST['idservicio'],ENT_QUOTES,'UTF-8');
$descripcion = htmlspecialchars($_POST['descripcion'],ENT_QUOTES,'UTF-8');
$observacion = htmlspecialchars($_POST['observacion'],ENT_QUOTES,'UTF-8');
$consulta = $MC->Registrar_Consulta($idcita,$idinsumo,$cantinsumo,$idservicio,$descripcion,$observacion);
echo $consulta;
?>