<?php
$servidor="localhost:3310";
$usuario="root";
$constrasenia="";

//try y catch para atrapar los errores
try{
    $conexion=new PDO("mysql:host=$servidor;dbname=album",$usuario,$constrasenia);
    $conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $sql="INSERT INTO `fotos` (`id`, `nombre`, `ruta`) VALUES (NULL, 'Ejemplo 1', 'foto.jpg');";
    $conexion->exec($sql);
    echo "Conexion Establecida";
}
catch(PDOException $error){
    echo "Conexion Errornea".$error;
}
?>