<?php

class Conexion {
    private $servidor;
    private $usuario;
    private $contrasena;
    private $basededatos;
    public $conexion;

    public function __construct() {
        $this->servidor = 'clinicmariaaux.cvkwoo8mw8nz.us-east-1.rds.amazonaws.com';
        $this->usuario = 'bd001';
        $this->contrasena = 'bdmariaaux001';
        $this->basededatos = 'clinicmariaaux1';
    }

    function conectar() {
        $this->conexion = new mysqli($this->servidor, $this->usuario, $this->contrasena, $this->basededatos);

        // Verificar conexión
        if ($this->conexion->connect_error) {
            die("Error de conexión: " . $this->conexion->connect_error);
        } else {
            echo "Conexión exitosa a la base de datos a AWS bitches.";
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