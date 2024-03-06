<?php
class modelo_usuario
{
    private $conexion;
    function __construct()
    {
        require_once 'modelo_conexion.php';
        $this->conexion = new conexion();
        $this->conexion->conectar();
    }

    function VerificarUsuario($usuario, $contra)
    {
        $sql = "call SP_VERIFICAR('$usuario')";
        $arreglo = array();

        if ($consulta = $this->conexion ->conexion->query($sql)) {
            while ($consulta_VU = mysqli_fetch_array($consulta)) {
                if (password_verify($contra, $consulta_VU['UsuPassword'])) {
                    $arreglo[] = $consulta_VU;
                }
            }
            $this->conexion->cerrar();
        } else {
            // Manejo de errores
            $jsonError = json_last_error();
            return ["error" => "Error en la consulta", "json_error" => $jsonError];
        }

        return $arreglo;
    }

    function TraerDatos($usuario)
    {
        $sql = "call SP_VERIFICAR('$usuario')";
        $arreglo = array();

        if ($consulta = $this->conexion->conexion->query($sql)) {
            while ($consulta_VU = mysqli_fetch_array($consulta)) {
                $arreglo[] = $consulta_VU;
            }
            $this->conexion->cerrar();
        } 
        return $arreglo;
        //$this->conexion->cerrar(); original
    }

    function Listar_Usuario()
    {
        $sql = "call SP_LISTAR_USUARIOS()";
        $arreglo = array();

        if ($consulta = $this->conexion->conexion->query($sql)) {
            while ($consulta_VU = mysqli_fetch_assoc($consulta)) {
                $arreglo["data"][] = $consulta_VU;
            }            
            return $arreglo;
            $this->conexion->cerrar();
        }
    }

    function listar_combo_rol()
    {
        $sql = "call SP_LISTAR_COMBO_ROL()";
        $arreglo = array();

        if ($consulta = $this->conexion ->conexion->query($sql)) {
            while ($consulta_VU = mysqli_fetch_array($consulta)) {
                $arreglo[]=$consulta_VU;
            }   
        return $arreglo;
        $this->conexion->cerrar();
    }
    }

    function Modificar_Estatus_Usuario($idUsuario, $Status)
    {
        $sql = "call SP_MODIFICAR_ESTATUS_USUARIO('$idUsuario','$Status')";
        $arreglo = array();

        if ($consulta = $this->conexion ->conexion->query($sql)) {
            // $id_retornado=mysqli_insert_ind($this->conexion->conexion);
            return 1;
    }else {
            return 0;
    }
}

    function Registrar_Usuario($usuario,$contra,$rol)
    {
        $sql = "call SP_REGISTRAR_USUARIO('$usuario','$contra','$rol')";
        $arreglo = array();

        if ($consulta = $this->conexion ->conexion->query($sql)) {
            if ($row = mysqli_fetch_array($consulta)) {
               return $id=trim($row[0]);
            }   
        $this->conexion->cerrar();
    }
}
}
?>
