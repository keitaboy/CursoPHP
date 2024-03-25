<?php
class Modelo_Doctor
{
    private $conexion;
    function __construct()
    {
        require_once 'modelo_conexion.php';
        $this->conexion = new conexion();
        $this->conexion->conectar();
    }

    function listar_Doctor()
    {
        $sql = "call SP_LISTAR_DOCTOR()";
        $arreglo = array();

        if ($consulta = $this->conexion->conexion->query($sql)) {
            while ($consulta_VU = mysqli_fetch_assoc($consulta)) {

                $arreglo["data"][] = $consulta_VU;
            }
            $this->conexion->cerrar();
            return $arreglo;
        }
    }

    function Registrar_Doctor($DoctorNombre,$DoctorApellido,$DoctorDocumento,
    $DoctorNroDoc,$DoctorCelular,$DoctorGrado,$DoctorFechaNac,$DoctorEspecialiadad,$DoctorPais,
    $DoctorDepa,$DoctorDistrito,$DoctorDireccion,$DoctorCorreo,$DoctorUsuario,$DoctorPassword,
    $DoctorSexo,$DoctorRol)
    {
        $sql = "call SP_REGISTRAR_DOCTOR('$DoctorNombre','$DoctorApellido','$DoctorDocumento',
        '$DoctorNroDoc','$DoctorCelular','$DoctorGrado','$DoctorFechaNac','$DoctorEspecialiadad','$DoctorPais',
        '$DoctorDepa','$DoctorDistrito','$DoctorDireccion','$DoctorCorreo','$DoctorUsuario','$DoctorPassword',
        '$DoctorSexo','$DoctorRol')";
        if ($consulta = $this->conexion->conexion->query($sql)) {
            if ($row = mysqli_fetch_array($consulta)) {
                return $id = trim($row[0]);
            }
            $this->conexion->cerrar();
        }
    }
    

     function Modificar_Doctor($idDoctor,$DoctorNombre,$DoctorApellido,$DoctorDocumento,
     $DoctorNroDocActual,$DoctorNroDocNuevo,$DoctorCelular,$DoctorGrado,$DoctorFechaNac,$DoctorEspecialiadad,$DoctorPais,
     $DoctorDepa,$DoctorDistrito,$DoctorDireccion,$DoctorCorreo,$IdUsuario)
     {
         $sql = "call SP_MODIFICAR_DOCTOR('$idDoctor','$DoctorNombre','$DoctorApellido','$DoctorDocumento',
         '$DoctorNroDocActual','$DoctorNroDocNuevo','$DoctorCelular','$DoctorGrado','$DoctorFechaNac','$DoctorEspecialiadad','$DoctorPais',
         '$DoctorDepa','$DoctorDistrito','$DoctorDireccion','$DoctorCorreo','$IdUsuario')";
         if ($consulta = $this->conexion->conexion->query($sql)) {
             if ($row = mysqli_fetch_array($consulta)) {
                 return $id = trim($row[0]);
             }
             $this->conexion->cerrar();
         }
     }

    function listar_combo_documento()
    {
        $sql = "call SP_LISTAR_COMBO_DOCUMENTO()";
        $arreglo = array();

        if ($consulta = $this->conexion->conexion->query($sql)) {
            while ($consulta_VU = mysqli_fetch_array($consulta)) {
                $arreglo[] = $consulta_VU;
            }
            return $arreglo;
            //  $this->conexion->cerrar();
        }
    }
    function listar_combo_especialidad(){
        $sql = "call SP_LISTAR_COMBO_ESPECIALIDAD()";
        $arreglo = array();

        if ($consulta = $this->conexion->conexion->query($sql)) {
            while ($consulta_VU = mysqli_fetch_array($consulta)) {
                $arreglo[] = $consulta_VU;
            }
            return $arreglo;
            //  $this->conexion->cerrar();
        }
    }
}