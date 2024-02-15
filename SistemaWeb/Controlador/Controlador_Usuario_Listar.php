<?php

require '../../Modelo/Modelo_Usuario.php';
$MU=new Modelo_Usuario();

$Consulta=$MU->Listar_Usuario();
if ($Consulta) {
    echo json_encode($Consulta);
}else{
    echo'{
        "sEcho":1,
        "iTotalRecords":"0",
        "iTotalDisplayRecords":"0",
        "aaData":[]
    }';
}
?>