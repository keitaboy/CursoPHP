<?php

class Conexion {
    private $servidor;
    private $usuario;
    private $contrasena;
    private $basededatos;
    public $conexion;

    public function __construct() {
        $this->servidor = 'localhost';
        $this->usuario = 'root';
        $this->contrasena = '';
        $this->basededatos = 'clinicmariaaux1';
    }

    function conectar() {
        $this->conexion = new mysqli($this->servidor, $this->usuario, $this->contrasena, $this->basededatos);

        // Verificar conexión
        if ($this->conexion->connect_error) {
            die("Error de conexión: " . $this->conexion->connect_error);
        } else {
            echo "Conexión exitosa a la base de datos.";
        }

        // Establecer el conjunto de caracteres
        $this->conexion->set_charset("utf8");
    }

    function cerrar() {
        $this->conexion->close();
    }
}

// Uso de la clase
$miConexion = new Conexion();
$miConexion->conectar();
$miConexion->cerrar();