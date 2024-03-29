<?php

class conexion{
    private $servidor;
    private $usuario;
    private $contrasena;
    private $basededatos;
    public $conexion;

    //conexion al local
    // public function __construct() {
    //     $this->servidor = 'localhost';
    //     $this->usuario = 'root';
    //     $this->contrasena = '';
    //     $this->basededatos = 'clinicmariaaux1';
    // }

    //conexion a AWS esta lineas van a Master
     public function __construct() {
         $this->servidor = 'clinicmariaaux.cvkwoo8mw8nz.us-east-1.rds.amazonaws.com';
         $this->usuario = 'bd001';
         $this->contrasena = 'bdmariaaux001';
         $this->basededatos = 'clinicmariaaux1';
     }

    function conectar(){
        $this->conexion = new mysqli($this->servidor, $this->usuario, $this->contrasena, $this->basededatos);

        $this->conexion->set_charset("utf8");
    }
    function cerrar() {
        $this->conexion->close();
    }
}