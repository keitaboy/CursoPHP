<?php

require '../../Modelo/modelo_doctor.php';
$MD=new Modelo_Doctor();
$idDoctor = htmlspecialchars($_POST['idDoctor'],ENT_QUOTES,'UTF-8');
$DoctorNombre = htmlspecialchars($_POST['DoctorNombre'],ENT_QUOTES,'UTF-8');
$DoctorApellido = htmlspecialchars($_POST['DoctorApellido'],ENT_QUOTES,'UTF-8');
$DoctorDocumento = htmlspecialchars($_POST['DoctorDocumento'],ENT_QUOTES,'UTF-8');
$DoctorNroDocActual = htmlspecialchars($_POST['DoctorNroDocActual'],ENT_QUOTES,'UTF-8');
$DoctorNroDocNuevo = htmlspecialchars($_POST['DoctorNroDocNuevo'],ENT_QUOTES,'UTF-8');
$DoctorCelular = htmlspecialchars($_POST['DoctorCelular'],ENT_QUOTES,'UTF-8');
$DoctorGrado = htmlspecialchars($_POST['DoctorGrado'],ENT_QUOTES,'UTF-8');
$DoctorFechaNac = htmlspecialchars($_POST['DoctorFechaNac'],ENT_QUOTES,'UTF-8');
$DoctorEspecialiadad = htmlspecialchars($_POST['DoctorEspecialiadad'],ENT_QUOTES,'UTF-8');
$DoctorPais = htmlspecialchars($_POST['DoctorPais'],ENT_QUOTES,'UTF-8');
$DoctorDepa = htmlspecialchars($_POST['DoctorDepa'],ENT_QUOTES,'UTF-8');
$DoctorDistrito = htmlspecialchars($_POST['DoctorDistrito'],ENT_QUOTES,'UTF-8');
$DoctorDireccion = htmlspecialchars($_POST['DoctorDireccion'],ENT_QUOTES,'UTF-8');
$DoctorCorreo = htmlspecialchars($_POST['DoctorCorreo'],ENT_QUOTES,'UTF-8');
$IdUsuario = htmlspecialchars($_POST['IdUsuario'],ENT_QUOTES,'UTF-8');
$consulta = $MD->Modificar_Doctor($idDoctor,$DoctorNombre,$DoctorApellido,$DoctorDocumento,
$DoctorNroDocActual,$DoctorNroDocNuevo,$DoctorCelular,$DoctorGrado,$DoctorFechaNac,$DoctorEspecialiadad,$DoctorPais,
$DoctorDepa,$DoctorDistrito,$DoctorDireccion,$DoctorCorreo,$IdUsuario);
echo $consulta;