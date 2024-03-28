<?php

require '../../Modelo/modelo_doctor.php';
$MD=new Modelo_Doctor();
$DoctorNombre = htmlspecialchars($_POST['DoctorNombre'],ENT_QUOTES,'UTF-8');
$DoctorApellido = htmlspecialchars($_POST['DoctorApellido'],ENT_QUOTES,'UTF-8');
$DoctorDocumento = htmlspecialchars($_POST['DoctorDocumento'],ENT_QUOTES,'UTF-8');
$DoctorNroDoc = htmlspecialchars($_POST['DoctorNroDoc'],ENT_QUOTES,'UTF-8');
$DoctorCelular = htmlspecialchars($_POST['DoctorCelular'],ENT_QUOTES,'UTF-8');
$DoctorGrado = htmlspecialchars($_POST['DoctorGrado'],ENT_QUOTES,'UTF-8');
$DoctorFechaNac = htmlspecialchars($_POST['DoctorFechaNac'],ENT_QUOTES,'UTF-8');
$DoctorEspecialiadad = htmlspecialchars($_POST['DoctorEspecialiadad'],ENT_QUOTES,'UTF-8');
$DoctorPais = htmlspecialchars($_POST['DoctorPais'],ENT_QUOTES,'UTF-8');
$DoctorDepa = htmlspecialchars($_POST['DoctorDepa'],ENT_QUOTES,'UTF-8');
$DoctorDistrito = htmlspecialchars($_POST['DoctorDistrito'],ENT_QUOTES,'UTF-8');
$DoctorDireccion = htmlspecialchars($_POST['DoctorDireccion'],ENT_QUOTES,'UTF-8');
$DoctorCorreo = htmlspecialchars($_POST['DoctorCorreo'],ENT_QUOTES,'UTF-8');
$DoctorUsuario = htmlspecialchars($_POST['DoctorUsuario'],ENT_QUOTES,'UTF-8');
$DoctorPassword = password_hash($_POST['DoctorPassword'],PASSWORD_DEFAULT,['cost'=>10]);
$DoctorSexo = htmlspecialchars($_POST['DoctorSexo'],ENT_QUOTES,'UTF-8');
$DoctorRol = htmlspecialchars($_POST['DoctorRol'],ENT_QUOTES,'UTF-8');
$consulta = $MD->Registrar_Doctor($DoctorNombre,$DoctorApellido,$DoctorDocumento,
$DoctorNroDoc,$DoctorCelular,$DoctorGrado,$DoctorFechaNac,$DoctorEspecialiadad,$DoctorPais,
$DoctorDepa,$DoctorDistrito,$DoctorDireccion,$DoctorCorreo,$DoctorUsuario,$DoctorPassword,
$DoctorSexo,$DoctorRol);
echo $consulta;