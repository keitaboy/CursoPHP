<?php

require '../../Modelo/modelo_procedimiento.php';
$MP=new Modelo_Procedimiento();

$consulta=$MP->listar_procedimiento();
if ($consulta) {
    echo json_encode($consulta);
}else{
    echo'{
        "sEcho":1,
        "iTotalRecords":"0",
        "iTotalDisplayRecords":"0",
        "aaData":[]
    }';
}
?>