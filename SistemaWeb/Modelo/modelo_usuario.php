<?php
class Modelo_Usuario
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

        if ($consulta = $this->conexion->conexion->query($sql)) {
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
}