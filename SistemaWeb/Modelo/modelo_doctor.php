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

    function Registrar_Doctor($Doctor, $estatus)
    {
        $sql = "call SP_REGISTRAR_Doctor('$Doctor', '$estatus')";
        if ($consulta = $this->conexion->conexion->query($sql)) {
            if ($row = mysqli_fetch_array($consulta)) {
                return $id = trim($row[0]);
            }
            $this->conexion->cerrar();
        }
    }
    

    function Modificar_Doctor($id,$Doctoractual,$Doctornuevo,$estatus)
    {
        $sql = "call SP_MODIFICAR_Doctor('$id','$Doctoractual','$Doctornuevo','$estatus')";
        if ($consulta = $this->conexion->conexion->query($sql)) {
            if ($row = mysqli_fetch_array($consulta)) {
                return $id = trim($row[0]);
            }
            $this->conexion->cerrar();
        }
    }
}