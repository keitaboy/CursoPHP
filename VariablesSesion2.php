<?php
//apesar de estar en otro archivo se pueden utilizar las directamente los elementos donde se inicio la session en cualquier archivo con sesion iniciada
session_start();
if(isset($_SESSION["Usuario"])){
echo "Usuario: ".$_SESSION["Usuario"]."se encuentra: ".$_SESSION["Estado"];
}else{
    echo "No hay datos";
}
?>