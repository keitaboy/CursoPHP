<?php
class Modelo_Consulta
{
    private $conexion;
    function __construct()
    {
        require_once 'modelo_conexion.php';
        $this->conexion = new conexion();
        $this->conexion->conectar();
    }

    function listar_consulta($fechainicio,$fechafin)
    {
        $sql = "call SP_LISTAR_CONSULTA('$fechainicio','$fechafin')";
        $arreglo = array();

        if ($consulta = $this->conexion->conexion->query($sql)) {
            while ($consulta_VU = mysqli_fetch_assoc($consulta)) {

                $arreglo["data"][] = $consulta_VU;
            }
            $this->conexion->cerrar();
            return $arreglo;
        }
    }

    function listar_paciente_combo()
    {
        $sql = "call SP_LISTAR_PACIENTE_CITA()";
        $arreglo = array();

        if ($consulta = $this->conexion->conexion->query($sql)) {
            while ($consulta_VU = mysqli_fetch_array($consulta)) {

                $arreglo[] = $consulta_VU;
            }
            return $arreglo;
            $this->conexion->cerrar();
        }
    }

    function listar_insumo_combo()
    {
        $sql = "call SP_LISTAR_INSUMO_COMBO()";
        $arreglo = array();

        if ($consulta = $this->conexion->conexion->query($sql)) {
            while ($consulta_VU = mysqli_fetch_array($consulta)) {

                $arreglo[] = $consulta_VU;
            }
            return $arreglo;
            $this->conexion->cerrar();
        }
    }

    function listar_servicio_combo()
    {
        $sql = "call SP_LISTAR_SERVICIO_COMBO()";
        $arreglo = array();

        if ($consulta = $this->conexion->conexion->query($sql)) {
            while ($consulta_VU = mysqli_fetch_array($consulta)) {

                $arreglo[] = $consulta_VU;
            }
            return $arreglo;
            $this->conexion->cerrar();
        }
    }

    function listar_doctor_combo()
    {
        $sql = "call SP_LISTAR_DOCTOR_COMBO()";
        $arreglo = array();

        if ($consulta = $this->conexion->conexion->query($sql)) {
            while ($consulta_VU = mysqli_fetch_array($consulta)) {

                $arreglo[] = $consulta_VU;
            }
            return $arreglo;
            $this->conexion->cerrar();
        }
    }

    function Registrar_Consulta($idcita,$idinsumo,$cantinsumo,$idservicio,$descripcion,$observacion)
    {
        $sql = "call SP_REGISTRAR_CONSULTA('$idcita', '$idinsumo', '$cantinsumo','$idservicio','$descripcion','$observacion')";
        if ($consulta = $this->conexion->conexion->query($sql)) {
            return 1;
        }else{
            return 0;
        }
        $this->conexion->cerrar();
    }

    function Editar_Cita($idcita,$idpaciente,$iddoctor,$descripcion,$estatus)
    {
        $sql = "call SP_MODIFICAR_CITA('$idcita','$idpaciente','$iddoctor','$descripcion','$estatus')";
        if ($consulta = $this->conexion->conexion->query($sql)) {
                return 1;
        }else{
                return 0;
        }
        $this->conexion->cerrar();
    }

}