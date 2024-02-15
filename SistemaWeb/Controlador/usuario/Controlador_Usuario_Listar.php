<?php

require '../../Modelo/modelo_usuario.php';
$MU=new modelo_usuario();

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