<?php

require '../../Modelo/modelo_paciente.php';
$MP=new Modelo_Paciente();
$DuenoNombre = htmlspecialchars($_POST['DuenoNombre'],ENT_QUOTES,'UTF-8');
$DuenoApellido = htmlspecialchars($_POST['DuenoApellido'],ENT_QUOTES,'UTF-8');
$DuenoDocumento = htmlspecialchars($_POST['DuenoDocumento'],ENT_QUOTES,'UTF-8');
$DuenoNroDoc = htmlspecialchars($_POST['DuenoNroDoc'],ENT_QUOTES,'UTF-8');
$DuenoCelular = htmlspecialchars($_POST['DuenoCelular'],ENT_QUOTES,'UTF-8');
$DuenoDireccion = htmlspecialchars($_POST['DuenoDireccion'],ENT_QUOTES,'UTF-8');
$DuenoCorreo = htmlspecialchars($_POST['DuenoCorreo'],ENT_QUOTES,'UTF-8');

$consulta = $MP->Registrar_Dueno($DuenoNombre,$DuenoApellido,$DuenoDocumento,$DuenoNroDoc,$DuenoCelular,
$DuenoDireccion,$DuenoCorreo);
echo $consulta;