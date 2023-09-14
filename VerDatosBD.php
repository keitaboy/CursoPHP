<?php
$servidor="localhost:3310";
$usuario="root";
$constrasenia="";

//try y catch para atrapar los errores
try{
    $conexion=new PDO("mysql:host=$servidor;dbname=album",$usuario,$constrasenia);
    $conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $sql="SELECT * FROM `fotos`";
    $sentencia=$conexion->prepare($sql);
    $sentencia->execute();
    $resultado=$sentencia->fetchAll();
    //print_r($resultado);

    foreach($resultado as $foto){
        echo $foto['nombre']."<br/>";
    }

    echo "Conexion Establecida";
}
catch(PDOException $error){
    echo "Conexion Errornea".$error;
}
?>