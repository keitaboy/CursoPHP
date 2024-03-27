<?php
class Modelo_Paciente
{
    private $conexion;
    function __construct()
    {
        require_once 'modelo_conexion.php';
        $this->conexion = new conexion();
        $this->conexion->conectar();
    }

    function listar_Paciente()
    {
        $sql = "call SP_LISTAR_PACIENTE()";
        $arreglo = array();

        if ($consulta = $this->conexion->conexion->query($sql)) {
            while ($consulta_VU = mysqli_fetch_assoc($consulta)) {

                $arreglo["data"][] = $consulta_VU;
            }
            $this->conexion->cerrar();
            return $arreglo;
        }
    }

    function listar_Dueno()
    {
        $sql = "call SP_LISTAR_DUENO()";
        $arreglo = array();

        if ($consulta = $this->conexion->conexion->query($sql)) {
            while ($consulta_VU = mysqli_fetch_assoc($consulta)) {

                $arreglo["data"][] = $consulta_VU;
            }
            $this->conexion->cerrar();
            return $arreglo;
        }
    }

    function Registrar_Dueno($DuenoNombre,$DuenoApellido,$DuenoDocumento,$DuenoNroDoc,$DuenoCelular,
    $DuenoDireccion,$DuenoCorreo)
    {
        $sql = "call SP_REGISTRAR_DUENO('$DuenoNombre','$DuenoApellido','$DuenoDocumento','$DuenoNroDoc','$DuenoCelular',
        '$DuenoDireccion','$DuenoCorreo')";
        if ($consulta = $this->conexion->conexion->query($sql)) {
            if ($row = mysqli_fetch_array($consulta)) {
                return $id = trim($row[0]);
            }
            $this->conexion->cerrar();
        }
    }

    function Registrar_Paciente($PacienteNombre,$PacienteTipoMasc,$PacienteRaza,$PacienteColor,$PacientePeso,
    $PacienteAltura,$PacienteEdad,$PacienteFechaNac,$PacienteSexo,$PacienteEsterilizar)
    {
        $sql = "call SP_REGISTRAR_PACIENTE('$PacienteNombre','$PacienteTipoMasc','$PacienteRaza','$PacienteColor','$PacientePeso',
        '$PacienteAltura','$PacienteEdad','$PacienteFechaNac','$PacienteSexo','$PacienteEsterilizar')";
        if ($consulta = $this->conexion->conexion->query($sql)) {
            if ($row = mysqli_fetch_array($consulta)) {
                return $id = trim($row[0]);
            }
            $this->conexion->cerrar();
        }
    }
    

     function Modificar_Paciente($idPaciente,$PacienteNombre,$PacienteApellido,$PacienteDocumento,
     $PacienteNroDocActual,$PacienteNroDocNuevo,$PacienteCelular,$PacienteGrado,$PacienteFechaNac,$PacienteEspecialiadad,$PacientePais,
     $PacienteDepa,$PacienteDistrito,$PacienteDireccion,$PacienteCorreo,$IdUsuario)
     {
         $sql = "call SP_MODIFICAR_Paciente('$idPaciente','$PacienteNombre','$PacienteApellido','$PacienteDocumento',
         '$PacienteNroDocActual','$PacienteNroDocNuevo','$PacienteCelular','$PacienteGrado','$PacienteFechaNac','$PacienteEspecialiadad','$PacientePais',
         '$PacienteDepa','$PacienteDistrito','$PacienteDireccion','$PacienteCorreo','$IdUsuario')";
         if ($consulta = $this->conexion->conexion->query($sql)) {
             if ($row = mysqli_fetch_array($consulta)) {
                 return $id = trim($row[0]);
             }
             $this->conexion->cerrar();
         }
     }

    function listar_combo_tipo_paciente(){
        $sql = "call SP_LISTAR_COMBO_TIPO_MASCOTA()";
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